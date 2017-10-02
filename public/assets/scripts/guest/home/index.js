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
var com;
(function (com) {
    var sabrac;
    (function (sabrac) {
        var vipfbnow;
        (function (vipfbnow) {
            var HomeScreenModel = (function () {
                function HomeScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                }
                HomeScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (userInfo) {
                        self.userInfo(userInfo);
                    });
                    dfd.resolve(self.userInfo());
                    return dfd.promise();
                };
                return HomeScreenModel;
            }());
            vipfbnow.HomeScreenModel = HomeScreenModel;
            // export class UserInfo {
            //     avt: string;
            //     fullname: string;
            //     username: string;
            //     vnd: number;
            //     toida: number;
            //     mail: string;
            //     sdt: string;
            //
            //     constructor() {
            //         var self = this;
            //         self.avt = "Chưa cập nhật";
            //         self.fullname = "Chưa cập nhật";
            //         self.username = "Chưa cập nhật";
            //         self.vnd = 0;
            //         self.toida = 0;
            //         self.mail = "Chưa cập nhật";
            //         self.sdt = "Chưa cập nhật";
            //     }
            //
            //     load(avt: string, fullname: string, username: string, vnd: number, toida: number, mail: string, sdt: string) {
            //         var self = this;
            //         self.avt = avt;
            //         if (fullname) {
            //             self.fullname = fullname;
            //         }
            //         if (username) {
            //             self.username = username;
            //         }
            //         self.vnd = Utils.number_format(vnd, 0, ',', ',');
            //         self.toida = toida;
            //         if (mail) {
            //             self.mail = mail;
            //         }
            //         if (sdt) {
            //             self.sdt = sdt;
            //         }
            //     }
            // }
            $(document).ready(function () {
                $.blockUI({ baseZ: 2000 });
                var homeScreenModel = new HomeScreenModel();
                var headerScreenModel = new vipfbnow.HeaderScreenModel();
                var modalLoginScreenModel = new vipfbnow.ModalLoginScreenModel();
                var sidebarScreenModel = new vipfbnow.SidebarScreenModel();
                var controlSidebarScreenModel = new vipfbnow.ControlSidebarScreenModel();
                var dfdArray = [];
                var counter = 0;
                dfdArray[counter++] = homeScreenModel.startPage();
                dfdArray[counter++] = headerScreenModel.startPage(homeScreenModel.userInfo());
                dfdArray[counter++] = sidebarScreenModel.startPage(homeScreenModel.userInfo());
                dfdArray[counter++] = controlSidebarScreenModel.startPage(homeScreenModel.userInfo());
                dfdArray[counter++] = modalLoginScreenModel.startPage();
                $.when.apply($, dfdArray).done(function () {
                    ko.applyBindings(headerScreenModel, $("#header-content")[0]);
                    ko.applyBindings(sidebarScreenModel, $("#sidebar-content")[0]);
                    ko.applyBindings(controlSidebarScreenModel, $("#control-sidebar-content")[0]);
                    ko.applyBindings(modalLoginScreenModel, $("#modal-login-content")[0]);
                    ko.applyBindings(homeScreenModel);
                    $.unblockUI();
                });
            });
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
