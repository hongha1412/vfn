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
        package: KnockoutObservable<number>;
        likeSpeed: KnockoutObservable<number>;
        expireTime: KnockoutObservable<number>;
        note: KnockoutObservable<string>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.fbURL = ko.observable<string>('');
            self.fbId = ko.observable<string>('');
            self.fbName = ko.observable<string>('');
            self.package = ko.observable<number>(-1);
            self.likeSpeed = ko.observable<number>(-1);
            self.expireTime = ko.observable<number>(-1);
            self.note = ko.observable<string>('');
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(result) {
                self.userInfo(result);
            }).always(function () {
                dfd.resolve();
            });
            return dfd.promise();
        }
    }

    class StoreVipLike {
        countID: number;

        constructor() {
            var self = this;
            self.countID = 0;
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