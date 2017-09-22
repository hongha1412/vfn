/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {
    export class HomeScreenModel {
        username: KnockoutObservable<string>;
        password: KnockoutObservable<string>;
        loginResult: KnockoutObservable<string>;

        constructor() {
            var self = this;
            self.username = ko.observable<string>("");
            self.password = ko.observable<string>("");
            self.loginResult = ko.observable<string>("");
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

            Utils.postData("/login", data).done(function(result) {
                self.loginResult(result.message);
            }).fail(function(result) {
                self.loginResult(result.message);
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