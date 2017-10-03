/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="_header/index.ts" />
/// <reference path="_sidebar/index.ts" />
/// <reference path="_control_sidebar/index.ts" />
/// <reference path="_modal_login/index.ts" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {
    export class HomeScreenModel {
        userInfo: KnockoutObservable<UserInfo>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            self.getLoggedInUserInfo().done(function() {
                dfd.resolve(self.userInfo());
            });
            return dfd.promise();
        }

        getLoggedInUserInfo(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            // Get logged in user info
            Utils.postData($("#get-logged-in-user-info-URL").val(), '').done(function(result) {
                if (result.success && result.message.length > 0) {
                    result = JSON.parse(result.message[0])
                    self.userInfo().load(result.avt, result.fullname, result.username, result.vnd, result.toida, result.mail, result.sdt);
                }
                dfd.resolve(self.userInfo());
            }).fail(function(result) {
                dfd.resolve();
            });
            return dfd.promise();
        }
    }

    $(document).ready(function() {
        $.blockUI({ baseZ: 2000 });
        var homeScreenModel = new HomeScreenModel();
        var headerScreenModel = new HeaderScreenModel();
        var modalLoginScreenModel = new ModalLoginScreenModel();
        var sidebarScreenModel = new SidebarScreenModel();
        var controlSidebarScreenModel = new ControlSidebarScreenModel();
        var dfdArray = [];
        var counter = 0;

        dfdArray[counter++] = homeScreenModel.startPage();
        dfdArray[counter++] = headerScreenModel.startPage(homeScreenModel.userInfo());
        dfdArray[counter++] = sidebarScreenModel.startPage(homeScreenModel.userInfo());
        dfdArray[counter++] = controlSidebarScreenModel.startPage(homeScreenModel.userInfo());
        dfdArray[counter++] = modalLoginScreenModel.startPage();

        $.when.apply($, dfdArray).done(function() {
            ko.applyBindings(headerScreenModel, $("#header-content")[0]);
            ko.applyBindings(sidebarScreenModel, $("#sidebar-content")[0]);
            ko.applyBindings(controlSidebarScreenModel, $("#control-sidebar-content")[0]);
            ko.applyBindings(modalLoginScreenModel, $("#modal-login-content")[0]);
            ko.applyBindings(homeScreenModel);
            $.unblockUI();
        });
    });
}