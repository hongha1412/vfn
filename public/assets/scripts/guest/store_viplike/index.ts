/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {

    export class StoreVipLikeScreenModel {
        userInfo: KnockoutObservable<UserInfo>;
        fbURL: KnockoutObservable<string>;
        fbId: KnockoutObservable<string>;
        fbName: KnockoutObservable<string>;
        likePackage: KnockoutObservable<number>;
        likeSpeed: KnockoutObservable<number>;
        dayPackage: KnockoutObservable<number>;
        note: KnockoutObservable<string>;
        totalID: KnockoutObservable<number>;
        price: KnockoutObservable<number>;
        lsLikePackage: KnockoutObservableArray<PackageObject>;
        lsDayPackage: KnockoutObservableArray<PackageObject>;
        lsLikeSpeed: KnockoutObservableArray<PackageObject>;
        isEnable: KnockoutObservable<boolean>;
        lsVipLike: KnockoutObservableArray<StoreVip>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.fbURL = ko.observable<string>('');
            self.fbId = ko.observable<string>('');
            self.fbName = ko.observable<string>('');
            self.likePackage = ko.observable<number>(1);
            self.likeSpeed = ko.observable<number>(1);
            self.dayPackage = ko.observable<number>(1);
            self.note = ko.observable<string>('');
            self.totalID = ko.observable<number>(0);
            self.price = ko.observable<number>(0);
            self.lsLikePackage = ko.observableArray<PackageObject>([]);
            self.lsDayPackage = ko.observableArray<PackageObject>([]);
            self.lsLikeSpeed = ko.observableArray<PackageObject>([]);
            self.isEnable = ko.observable<boolean>(true);
            self.lsVipLike = ko.observableArray<StoreVip>([]);

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

            self.likePackage.subscribe(function() {
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

        reset() {
            var self = this;
            self.fbURL('');
            self.fbId('');
            self.fbName('');
            self.likePackage(1);
            self.likeSpeed(1);
            self.dayPackage(1);
            self.note('');
            self.isEnable(true);
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(result) {
                self.userInfo(result);
                self.getListVipID().always(function () {
                    self.getPackageInfo().always(function() {
                        self.getLikeSpeedInfo().always(function () {
                            self.calculate().done(function(result) {
                                self.price(result);
                            }).always(function() {
                                dfd.resolve();
                            });
                        });
                    });
                });
            }).fail(function () {
                dfd.resolve();
            });
            return dfd.promise();
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

        getPackageInfo(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            let data = {
                packageType: PackageType.LIKE
            };
            Utils.postData($('#packageURL').val(), data).done(function(result) {
                if (result.success) {
                    if (result.message[0].hasOwnProperty('likePackage')) {
                        for (let likePackage of result.message[0].likePackage) {
                            self.lsLikePackage.push(new PackageObject(likePackage.id, likePackage.total));
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

        getLikeSpeedInfo(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            let data = {
                type: PackageType.LIKE
            };
            Utils.postData($('#speedURL').val(), data).done(function(result) {
                if (result.success) {
                    for (let likeSpeedObject of result.message[0]) {
                        self.lsLikeSpeed.push(new PackageObject(likeSpeedObject.id, likeSpeedObject.value));
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

        calculate(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            var price = 0;
            $.blockUI();
            self.isEnable(false);
            let data = {
                likePackage: self.likePackage(),
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

        buyVipLike() {
            var self = this;
            $.blockUI();
            self.isEnable(false);
            let data = new StoreVip();
            data.fbId = self.fbId();
            data.fbName = self.fbName();
            data.package = self.likePackage();
            data.speed = self.likeSpeed();
            data.dayPackage = self.dayPackage();
            data.note = self.note();

            Utils.postData($('#buyVipLikeURL').val(), data).done(function (result) {
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
            self.lsVipLike([]);
            let data = {
                packageType: PackageType.LIKE
            };

            Utils.postData($('#listVIPURL').val(), data).done(function(result) {
                if (result.success) {
                    self.totalID(result.message[0].lsVipLike.length);
                    for (let vipLike of result.message[0].lsVipLike) {
                        let storeVipLike = new StoreVip();
                        storeVipLike.package = vipLike.package.total;
                        storeVipLike.fbName = vipLike.fbname;
                        storeVipLike.note = vipLike.note;
                        storeVipLike.expireDate = vipLike.expiretime;

                        self.lsVipLike.push(storeVipLike);
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
        var screenModel = new StoreVipLikeScreenModel();
        $.blockUI({ baseZ: 2000 });

        screenModel.startPage().done(function() {
            Utils.loadLayoutScreenModel(screenModel.userInfo()).done(function() {
                ko.applyBindings(screenModel);
                $.unblockUI();
            });
        });
    });
}