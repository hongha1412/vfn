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

    export class UserInfo {
        avt: string;
        fullname: string;
        username: string;
        vnd: number;
        toida: number;
        mail: string;
        sdt: string;

        constructor() {
            var self = this;
            self.avt = "Chưa cập nhật";
            self.fullname = "Chưa cập nhật";
            self.username = "Chưa cập nhật";
            self.vnd = 0;
            self.toida = 0;
            self.mail = "Chưa cập nhật";
            self.sdt = "Chưa cập nhật";
        }

        load(avt: string, fullname: string, username: string, vnd: number, toida: number, mail: string, sdt: string) {
            var self = this;
            self.avt = avt;
            if (fullname) {
                self.fullname = fullname;
            }
            if (username) {
                self.username = username;
            }
            self.vnd = Utils.number_format(vnd, 0, ',', ',');
            self.toida = toida;
            if (mail) {
                self.mail = mail;
            }
            if (sdt) {
                self.sdt = sdt;
            }
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