/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../home/_header/index.ts" />
/// <reference path="../home/_sidebar/index.ts" />
/// <reference path="../home/_control_sidebar/index.ts" />
/// <reference path="../home/_modal_login/index.ts" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {
    export class RechargeScreenModel {
        userInfo: KnockoutObservable<UserInfo>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(userInfo) {
                self.userInfo(userInfo);
            });
            dfd.resolve(self.userInfo());
            return dfd.promise();
        }
    }

    $(document).ready(function() {
        $.blockUI({ baseZ: 2000 });
        var rechargeScreenModel = new RechargeScreenModel();
        var headerScreenModel = new HeaderScreenModel();
        var modalLoginScreenModel = new ModalLoginScreenModel();
        var sidebarScreenModel = new SidebarScreenModel();
        var controlSidebarScreenModel = new ControlSidebarScreenModel();
        var dfdArray = [];
        var counter = 0;

        dfdArray[counter++] = rechargeScreenModel.startPage();
        dfdArray[counter++] = headerScreenModel.startPage(rechargeScreenModel.userInfo());
        dfdArray[counter++] = sidebarScreenModel.startPage(rechargeScreenModel.userInfo());
        dfdArray[counter++] = controlSidebarScreenModel.startPage(rechargeScreenModel.userInfo());
        dfdArray[counter++] = modalLoginScreenModel.startPage();

        $.when.apply($, dfdArray).done(function() {
            ko.applyBindings(headerScreenModel, $("#header-content")[0]);
            ko.applyBindings(sidebarScreenModel, $("#sidebar-content")[0]);
            ko.applyBindings(controlSidebarScreenModel, $("#control-sidebar-content")[0]);
            ko.applyBindings(modalLoginScreenModel, $("#modal-login-content")[0]);
            ko.applyBindings(rechargeScreenModel);
            $.unblockUI();
        });
    });
}