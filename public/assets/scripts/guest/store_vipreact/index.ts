/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {

    export class StoreVipReactScreenModel {
        userInfo: KnockoutObservable<UserInfo>;
        totalID: KnockoutObservable<number>;
        fbURL: KnockoutObservable<string>;
        fbId: KnockoutObservable<string>;
        fbName: KnockoutObservable<string>;
        reactPackage: KnockoutObservable<number>;
        reactSpeed: KnockoutObservable<number>;
        reactType: KnockoutObservable<string>;
        dayPackage: KnockoutObservable<number>;
        price: KnockoutObservable<number>;
        note: KnockoutObservable<string>;
        lsReactPackage: KnockoutObservableArray<PackageObject>;
        lsDayPackage: KnockoutObservableArray<PackageObject>;
        lsReactSpeed: KnockoutObservableArray<PackageObject>;
        lsVipReact: KnockoutObservableArray<StoreVip>;
        isEnable: KnockoutObservable<boolean>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.totalID = ko.observable<number>(0);
            self.fbURL = ko.observable<string>('');
            self.fbId = ko.observable<string>('');
            self.fbName = ko.observable<string>('');
            self.reactPackage = ko.observable<number>(1);
            self.reactSpeed = ko.observable<number>(1);
            self.reactType = ko.observable<string>(ReactType.LIKE);
            self.dayPackage = ko.observable<number>(1);
            self.price = ko.observable<number>(0);
            self.note = ko.observable<string>('');
            self.lsReactPackage = ko.observableArray<PackageObject>([]);
            self.lsDayPackage = ko.observableArray<PackageObject>([]);
            self.lsReactSpeed = ko.observableArray<PackageObject>([]);
            self.isEnable = ko.observable<boolean>(true);
            self.lsVipReact = ko.observableArray<StoreVip>([]);

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

            self.reactPackage.subscribe(function() {
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
                        self.getReactSpeedInfo().always(function () {
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
            self.reactPackage(22);
            self.reactSpeed(22);
            self.reactType(ReactType.LIKE);
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

        getReactSpeedInfo(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            let data = {
                type: PackageType.REACT
            };
            Utils.postData($('#speedURL').val(), data).done(function(result) {
                if (result.success) {
                    for (let reactSpeedObject of result.message[0]) {
                        self.lsReactSpeed.push(new PackageObject(reactSpeedObject.id, reactSpeedObject.value));
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
                packageType: PackageType.REACT
            };
            Utils.postData($('#packageURL').val(), data).done(function(result) {
                if (result.success) {
                    if (result.message[0].hasOwnProperty('reactPackage')) {
                        for (let reactPackage of result.message[0].reactPackage) {
                            self.lsReactPackage.push(new PackageObject(reactPackage.id, reactPackage.total));
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
                reactPackage: self.reactPackage(),
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

        buyVipReact() {
            var self = this;
            $.blockUI();
            self.isEnable(false);
            let data = new StoreVip();
            data.fbId = self.fbId();
            data.fbName = self.fbName();
            data.package = self.reactPackage();
            data.speed = self.reactSpeed();
            data.dayPackage = self.dayPackage();
            data.note = self.note();
            data.reactType = self.reactType();

            Utils.postData($('#buyVipReactURL').val(), data).done(function (result) {
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
            self.lsVipReact([]);
            let data = {
                packageType: PackageType.REACT
            };

            Utils.postData($('#listVIPURL').val(), data).done(function(result) {
                if (result.success) {
                    self.totalID(result.message[0].lsVipReact.length);
                    for (let vipReact of result.message[0].lsVipReact) {
                        let storeVipReact = new StoreVip();
                        storeVipReact.package = vipReact.package.total;
                        storeVipReact.fbName = vipReact.fbname;
                        storeVipReact.note = vipReact.note;
                        storeVipReact.expireDate = vipReact.expiretime;
                        storeVipReact.reactType = vipReact.reacttype;

                        self.lsVipReact.push(storeVipReact);
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
        var screenModel = new StoreVipReactScreenModel();
        $.blockUI({ baseZ: 2000 });

        screenModel.startPage().done(function() {
            Utils.loadLayoutScreenModel(screenModel.userInfo()).done(function() {
                ko.applyBindings(screenModel);
                $.unblockUI();
            });
        });
    });
}