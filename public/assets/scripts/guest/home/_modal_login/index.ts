/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {
    export class HomeScreenModel {
        username: KnockoutObservable<string>;
        password: KnockoutObservable<string>;
        loginResult: KnockoutObservable<string>;
        isEnable: KnockoutObservable<boolean>;

        constructor() {
            var self = this;
            self.username = ko.observable<string>("");
            self.password = ko.observable<string>("");
            self.loginResult = ko.observable<string>("");
            self.isEnable = ko.observable<boolean>(true);
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            dfd.resolve();
            return dfd.promise();
        }

        login(): void {
            var self = this;
            var data = new UserInfo(self.username(), self.password());
            var titleNoti: string, typeNoti: string;
            self.isEnable(false);
            $('#postdata2').html('<i class="fa fa-spinner fa-spin"></i> Vui Lòng Đợi..');

            Utils.postData($("#loginURL").val(), data).done(function(result) {
                Utils.notify(result).done(function() {
                    location.reload();
                });
            }).fail(function(result) {
                Utils.notify(result);
            }).then(function() {
                $('#postdata2').html('<i class="fa fa-sign-in"></i> Đăng Nhập');
                self.isEnable(true);
            });
        }
    }

    export class UserInfo {
        username: string;
        password: string;

        constructor(username: string, password: string) {
            var self = this;
            self.username = username;
            self.password = password;
        }
    }

    $(document).ready(function() {
        var screenModel = new HomeScreenModel();
        $.blockUI();
        screenModel.startPage().done(function() {
            ko.applyBindings(screenModel);
            $.unblockUI();
        });
    });
}