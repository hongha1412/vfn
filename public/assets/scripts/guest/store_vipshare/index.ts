/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {

    export class StoreVipShareScreenModel {
        userInfo: KnockoutObservable<UserInfo>;
        totalID: KnockoutObservable<number>;
        fbURL: KnockoutObservable<string>;
        fbId: KnockoutObservable<string>;
        fbName: KnockoutObservable<string>;
        sharePackage: KnockoutObservable<number>;
        shareSpeed: KnockoutObservable<number>;
        dayPackage: KnockoutObservable<number>;
        price: KnockoutObservable<number>;
        note: KnockoutObservable<string>;
        lsSharePackage: KnockoutObservableArray<PackageObject>;
        lsDayPackage: KnockoutObservableArray<PackageObject>;
        lsShareSpeed: KnockoutObservableArray<PackageObject>;
        lsVipShare: KnockoutObservableArray<StoreVip>;
        isEnable: KnockoutObservable<boolean>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.totalID = ko.observable<number>(0);
            self.fbURL = ko.observable<string>('');
            self.fbId = ko.observable<string>('');
            self.fbName = ko.observable<string>('');
            self.sharePackage = ko.observable<number>(1);
            self.shareSpeed = ko.observable<number>(1);
            self.dayPackage = ko.observable<number>(1);
            self.price = ko.observable<number>(0);
            self.note = ko.observable<string>('');
            self.lsSharePackage = ko.observableArray<PackageObject>([]);
            self.lsDayPackage = ko.observableArray<PackageObject>([]);
            self.lsShareSpeed = ko.observableArray<PackageObject>([]);
            self.isEnable = ko.observable<boolean>(true);
            self.lsVipShare = ko.observableArray<StoreVip>([]);

            self.fbURL.subscribe(function() {
                $.blockUI();
                self.isEnable(false);

                if (!self.fbURL()) {
                    self.isEnable(true);
                    $.unblockUI();
                    return;
                }
                self.getFbUserInfo().always(function() {
                    self.isEnable(true);
                    $.unblockUI();
                });
            });

            self.sharePackage.subscribe(function() {
                self.calculate().done(function(result) {
                    self.price(result);
                });
            });
            self.dayPackage.subscribe(function() {
                self.calculate().done(function(result) {
                    self.price(result);
                });
            });
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(result) {
                self.userInfo(result);
                self.getListVipID().always(function () {
                    self.getPackageInfo().always(function () {
                        self.getShareSpeedInfo().always(function () {
                            self.calculate().done(function (result) {
                                self.price(result);
                            }).always(function () {
                                dfd.resolve();
                            });
                        });
                    });
                });
            }).fail(function (result) {
                dfd.resolve();
            });
            return dfd.promise();
        }

        reset() {
            var self = this;
            self.fbURL('');
            self.fbId('');
            self.fbName('');
            self.sharePackage(15);
            self.shareSpeed(15);
            self.dayPackage(1);
            self.note('');
            self.isEnable(true);
        }

        getFbUserInfo(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();

            Utils.getFacebookInfo(self.fbURL()).done(function(result) {
                if (result.success) {
                    self.fbId(result.message[0].fbid);
                    self.fbName(result.message[0].fbname);
                } else {
                    Utils.notify(result);
                }
            }).always(function() {
                dfd.resolve();
            });

            return dfd.promise();
        }

        getShareSpeedInfo(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            let data = {
                type: PackageType.SHARE
            };
            Utils.postData($('#speedURL').val(), data).done(function(result) {
                if (result.success) {
                    for (let shareSpeedObject of result.message[0]) {
                        self.lsShareSpeed.push(new PackageObject(shareSpeedObject.id, shareSpeedObject.value));
                    }
                } else {
                    Utils.notify(result);
                }
            }).fail(function (result) {
                Utils.unexpectedError();
            }).always(function () {
                dfd.resolve();
            });
            return dfd.promise();
        }

        getPackageInfo(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            let data = {
                packageType: PackageType.SHARE
            };
            Utils.postData($('#packageURL').val(), data).done(function(result) {
                if (result.success) {
                    if (result.message[0].hasOwnProperty('sharePackage')) {
                        for (let sharePackage of result.message[0].sharePackage) {
                            self.lsSharePackage.push(new PackageObject(sharePackage.id, sharePackage.total));
                        }
                    }
                    for (let dayPackage of result.message[0].dayPackage) {
                        self.lsDayPackage.push(new PackageObject(dayPackage.id, dayPackage.daytotal));
                    }
                } else {
                    Utils.notify(result);
                }
            }).fail(function(result) {
                Utils.unexpectedError();
            }).always(function (result) {
                dfd.resolve();
            });
            return dfd.promise();
        }

        calculate(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            var price = 0;
            $.blockUI();
            self.isEnable(false);
            let data = {
                sharePackage: self.sharePackage(),
                dayPackage: self.dayPackage()
            };

            Utils.postData($('#calculateURL').val(), data).done(function(result) {
                if (result.success) {
                    price = Utils.number_format(result.message[0].vnd);
                } else {
                    Utils.notify(result);
                }
            }).fail(function(result) {
                Utils.unexpectedError();
            }).always(function() {
                self.isEnable(true);
                $.unblockUI();
                dfd.resolve(price);
            });

            return dfd.promise();
        }

        buyVipShare() {
            var self = this;
            $.blockUI();
            self.isEnable(false);
            let data = new StoreVip();
            data.fbId = self.fbId();
            data.fbName = self.fbName();
            data.package = self.sharePackage();
            data.speed = self.shareSpeed();
            data.dayPackage = self.dayPackage();
            data.note = self.note();

            Utils.postData($('#buyVipShareURL').val(), data).done(function (result) {
                Utils.notify(result).done(function () {
                    Utils.getLoggedInUserInfo().done(function(result) {
                        self.userInfo(result);
                        self.reset();
                        self.getListVipID().always(function () {
                            Utils.reloadLayoutData(self.userInfo());
                        });
                    });
                });
            }).fail(function (result) {
                Utils.unexpectedError();
            }).always(function () {
                self.isEnable(true);
                $.unblockUI();
            });
        }

        getListVipID(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            self.lsVipShare([]);
            let data = {
                packageType: PackageType.SHARE
            };

            Utils.postData($('#listVIPURL').val(), data).done(function(result) {
                if (result.success) {
                    self.totalID(result.message[0].lsVipShare.length);
                    for (let vipShare of result.message[0].lsVipShare) {
                        let storeVipShare = new StoreVip();
                        storeVipShare.package = vipShare.package.total;
                        storeVipShare.fbName = vipShare.fbname;
                        storeVipShare.note = vipShare.note;
                        storeVipShare.expireDate = vipShare.expiretime;

                        self.lsVipShare.push(storeVipShare);
                    }
                } else {
                    Utils.notify(result);
                }
            }).fail(function (result) {
                Utils.unexpectedError();
            }).always(function () {
                dfd.resolve();
            });
            return dfd.promise();
        }
    }



    $(document).ready(function() {
        var screenModel = new StoreVipShareScreenModel();
        $.blockUI({ baseZ: 2000 });

        screenModel.startPage().done(function() {
            Utils.loadLayoutScreenModel(screenModel.userInfo()).done(function() {
                ko.applyBindings(screenModel);
                $.unblockUI();
            });
        });
    });
}