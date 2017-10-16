/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {

    export class StoreVipCmtScreenModel {
        userInfo: KnockoutObservable<UserInfo>;
        totalID: KnockoutObservable<number>;
        fbURL: KnockoutObservable<string>;
        fbId: KnockoutObservable<string>;
        fbName: KnockoutObservable<string>;
        cmtPackage: KnockoutObservable<number>;
        cmtSpeed: KnockoutObservable<number>;
        dayPackage: KnockoutObservable<number>;
        price: KnockoutObservable<number>;
        lsCmtPackage: KnockoutObservableArray<PackageObject>;
        lsDayPackage: KnockoutObservableArray<PackageObject>;
        lsCmtSpeed: KnockoutObservableArray<PackageObject>;
        isEnable: KnockoutObservable<boolean>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.totalID = ko.observable<number>(0);
            self.fbURL = ko.observable<string>('');
            self.fbId = ko.observable<string>('');
            self.fbName = ko.observable<string>('');
            self.cmtPackage = ko.observable<number>(1);
            self.cmtSpeed = ko.observable<number>(1);
            self.dayPackage = ko.observable<number>(1);
            self.price = ko.observable<number>(0);
            self.lsCmtPackage = ko.observableArray<PackageObject>([]);
            self.lsDayPackage = ko.observableArray<PackageObject>([]);
            self.lsCmtSpeed = ko.observableArray<PackageObject>([]);
            self.isEnable = ko.observable<boolean>(true);

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

            self.cmtPackage.subscribe(function() {
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
                dfd.resolve();
            }).fail(function (result) {
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

        calculate(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            var price = 0;
            $.blockUI();
            self.isEnable(false);
            let data = {
                cmtPackage: self.cmtPackage(),
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

        buyVipCmt() {
            var self = this;
        }
    }

    $(document).ready(function() {
        var screenModel = new StoreVipCmtScreenModel();
        $.blockUI({ baseZ: 2000 });

        screenModel.startPage().done(function() {
            Utils.loadLayoutScreenModel(screenModel.userInfo()).done(function() {
                ko.applyBindings(screenModel);
                $.unblockUI();
            });
        });
    });
}