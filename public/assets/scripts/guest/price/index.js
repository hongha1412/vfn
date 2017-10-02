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
var com;
(function (com) {
    var sabrac;
    (function (sabrac) {
        var vipfbnow;
        (function (vipfbnow) {
            var PriceScreenModel = (function () {
                function PriceScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                }
                PriceScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (userInfo) {
                        self.userInfo(userInfo);
                    });
                    dfd.resolve(self.userInfo());
                    return dfd.promise();
                };
                return PriceScreenModel;
            }());
            vipfbnow.PriceScreenModel = PriceScreenModel;
            $(document).ready(function () {
                $.blockUI({ baseZ: 2000 });
                var priceScreenModel = new PriceScreenModel();
                var headerScreenModel = new vipfbnow.HeaderScreenModel();
                var modalLoginScreenModel = new vipfbnow.ModalLoginScreenModel();
                var sidebarScreenModel = new vipfbnow.SidebarScreenModel();
                var controlSidebarScreenModel = new vipfbnow.ControlSidebarScreenModel();
                var dfdArray = [];
                var counter = 0;
                dfdArray[counter++] = priceScreenModel.startPage();
                dfdArray[counter++] = headerScreenModel.startPage(priceScreenModel.userInfo());
                dfdArray[counter++] = sidebarScreenModel.startPage(priceScreenModel.userInfo());
                dfdArray[counter++] = controlSidebarScreenModel.startPage(priceScreenModel.userInfo());
                dfdArray[counter++] = modalLoginScreenModel.startPage();
                $.when.apply($, dfdArray).done(function () {
                    ko.applyBindings(headerScreenModel, $("#header-content")[0]);
                    ko.applyBindings(sidebarScreenModel, $("#sidebar-content")[0]);
                    ko.applyBindings(controlSidebarScreenModel, $("#control-sidebar-content")[0]);
                    ko.applyBindings(modalLoginScreenModel, $("#modal-login-content")[0]);
                    ko.applyBindings(priceScreenModel);
                    $.unblockUI();
                });
            });
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
