/// <reference path="../../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../index.ts" />
/// <reference path="../../../common/utils/index.ts" />
/// <reference path="../../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {
    export class SidebarScreenModel {
        userInfo: KnockoutObservable<UserInfo>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
        }

        startPage(userInfo: UserInfo): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            self.userInfo(userInfo);
            dfd.resolve(self.userInfo());
            return dfd.promise();
        }
    }
}