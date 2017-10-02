/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {

    export class GetTokenScreenModel {
        user: KnockoutObservable<string>;
        pass: KnockoutObservable<string>;
        isEnable: KnockoutObservable<boolean>;
        accessCode: KnockoutObservable<string>;

        constructor() {
            var self = this;
            self.user = ko.observable<string>('');
            self.pass = ko.observable<string>('');
            self.accessCode = ko.observable<string>('');
            self.isEnable = ko.observable<boolean>(true);
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            dfd.resolve();
            return dfd.promise();
        }

        getToken(): void {
            var self = this;
            let fbUser = new FbUser(self.user(), self.pass());
            self.isEnable(false);
            Utils.postData($('#getTokenProcessURL').val(), fbUser).done(function(result) {
                if (result.success) {
                    self.accessCode(result.message[0]);
                } else {
                    Utils.notify(result);
                }
            }).fail(function(result) {
                Utils.notify(result);
            }).always(function() {
                self.isEnable(true);
            });
        }
    }

    class FbUser {
        user: string;
        pass: string;

        constructor(user: string, pass: string) {
            var self = this;
            self.user = user;
            self.pass = pass;
        }
    }

    $(document).ready(function() {
        var screenModel = new GetTokenScreenModel();
        $.blockUI();
        screenModel.startPage().done(function() {
            ko.applyBindings(screenModel);
            $.unblockUI();
        });
    });
}