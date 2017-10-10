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
        isEnable: KnockoutObservable<boolean>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.fbURL = ko.observable<string>('');
            self.fbId = ko.observable<string>('');
            self.fbName = ko.observable<string>('');
            self.likePackage = ko.observable<number>(1);
            self.likeSpeed = ko.observable<number>(5);
            self.dayPackage = ko.observable<number>(30);
            self.note = ko.observable<string>('');
            self.totalID = ko.observable<number>(0);
            self.price = ko.observable<number>(0);
            self.isEnable = ko.observable<boolean>(true);

            self.fbURL.subscribe(function() {
                $.blockUI();
                self.isEnable(false);

                self.getFbUserInfo().always(function() {
                    self.isEnable(true);
                    $.unblockUI();
                });
            });
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(result) {
                self.userInfo(result);
                self.calculate().always(function() {
                    dfd.resolve();
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

        calculate(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            $.blockUI();
            self.isEnable(false);
            let data = {
                likePackage: self.likePackage(),
                dayPackage: self.dayPackage()
            };

            Utils.postData($('#calculateURL').val(), data).done(function(result) {
                if (result.success) {
                    self.price(result.vnd);
                } else {
                    Utils.notify(result);
                }
            }).fail(function(result) {
                swal('ERROR', 'Lỗi không xác định, vui lòng liên hệ quản trị viên', SweetAlertType.ERROR);
            }).always(function() {
                self.isEnable(true);
                $.unblockUI();
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