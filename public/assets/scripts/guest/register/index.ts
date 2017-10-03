/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {

    export class RegisterScreenModel {
        fullname: KnockoutObservable<string>;
        email: KnockoutObservable<string>;
        username: KnockoutObservable<string>;
        password: KnockoutObservable<string>;
        password_confirmation: KnockoutObservable<string>;
        registerResult: KnockoutObservable<string>;
        isEnable: KnockoutObservable<boolean>;
        userInfo: KnockoutObservable<UserInfo>;

        constructor() {
            var self = this;
            self.fullname = ko.observable<string>("");
            self.email = ko.observable<string>("");
            self.username = ko.observable<string>("");
            self.password = ko.observable<string>("");
            self.password_confirmation = ko.observable<string>("");
            self.registerResult = ko.observable<string>("");
            self.isEnable = ko.observable<boolean>(true);
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(result) {
                self.userInfo(result);
            }).always(function() {
                dfd.resolve(self.userInfo());
            });
            return dfd.promise();
        }

        register(): void {
            var self = this;
            var data = new RegisterUserInfo(self.fullname(), self.email(), self.username(), self.password(), self.password_confirmation());
            self.isEnable(false);
            $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Vui Lòng Đợi..');

            Utils.postData($("#registerURL").val(), data).done(function(result) {
                Utils.notify(result).done(function() {
                    window.location.href = "/";
                });
            }).fail(function(result) {
                Utils.notify(result);
            }).always(function() {
                $('#postdata').html('Đăng Ký');
                self.isEnable(true);
            });
        }
    }

    class RegisterUserInfo {
        fullname: string;
        email: string;
        username: string;
        password: string;
        password_confirmation: string;

        constructor(fullname: string, email: string, username: string, password: string, password_confirmation: string) {
            var self = this;
            self.email = email;
            self.fullname = fullname;
            self.username = username;
            self.password = password;
            self.password_confirmation = password_confirmation;
        }
    }

    $(document).ready(function() {
        var screenModel = new RegisterScreenModel();
        $.blockUI({ baseZ: 2000 });

        screenModel.startPage().done(function() {
            Utils.loadLayoutScreenModel(screenModel.userInfo()).done(function() {
                ko.applyBindings(screenModel);
                $.unblockUI();
            });
        });
    });
}