/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="_header/index.ts" />
/// <reference path="_sidebar/index.ts" />
/// <reference path="_modal_login/index.ts" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/utils/index.ts" />
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
                    self.userInfo = ko.observable(new UserInfo());
                }
                HomeScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    self.getLoggedInUserInfo().done(function () {
                        dfd.resolve(self.userInfo());
                    });
                    return dfd.promise();
                };
                HomeScreenModel.prototype.getLoggedInUserInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    // Get logged in user info
                    vipfbnow.Utils.postData($("#get-logged-in-user-info-URL").val(), '').done(function (result) {
                        if (result.success && result.message.length > 0) {
                            result = JSON.parse(result.message[0]);
                            self.userInfo().load(result.avt, result.fullname, result.username, result.vnd);
                        }
                        dfd.resolve(self.userInfo());
                    }).fail(function (result) {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                return HomeScreenModel;
            }());
            vipfbnow.HomeScreenModel = HomeScreenModel;
            var UserInfo = (function () {
                function UserInfo() {
                    var self = this;
                    self.avt = "";
                    self.fullname = "";
                    self.username = "";
                    self.vnd = 0;
                }
                UserInfo.prototype.load = function (avt, fullname, username, vnd) {
                    var self = this;
                    self.avt = avt;
                    self.fullname = fullname;
                    self.username = username;
                    self.vnd = vipfbnow.Utils.number_format(vnd, 0, ',', ',');
                };
                return UserInfo;
            }());
            vipfbnow.UserInfo = UserInfo;
            $(document).ready(function () {
                $.blockUI({ baseZ: 2000 });
                var homeScreenModel = new HomeScreenModel();
                var headerScreenModel = new vipfbnow.HeaderScreenModel();
                var modalLoginScreenModel = new vipfbnow.ModalLoginScreenModel();
                var sidebarScreenModel = new vipfbnow.SidebarScreenModel();
                var dfdArray = [];
                var counter = 0;
                dfdArray[counter++] = homeScreenModel.startPage();
                dfdArray[counter++] = headerScreenModel.startPage(homeScreenModel.userInfo());
                dfdArray[counter++] = sidebarScreenModel.startPage(homeScreenModel.userInfo());
                dfdArray[counter++] = modalLoginScreenModel.startPage();
                $.when.apply($, dfdArray).done(function () {
                    ko.applyBindings(headerScreenModel, $("#header-content")[0]);
                    ko.applyBindings(modalLoginScreenModel, $("#modal-login-content")[0]);
                    ko.applyBindings(sidebarScreenModel, $("#sidebar-content")[0]);
                    ko.applyBindings(homeScreenModel);
                    $.unblockUI();
                });
            });
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
