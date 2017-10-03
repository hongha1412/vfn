/// <reference path="../../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../../common/utils/index.ts" />
/// <reference path="../../../common/models/index.ts" />
'use strict';
var com;
(function (com) {
    var sabrac;
    (function (sabrac) {
        var vipfbnow;
        (function (vipfbnow) {
            var ControlSidebarScreenModel = (function () {
                function ControlSidebarScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                }
                ControlSidebarScreenModel.prototype.startPage = function (userInfo) {
                    var self = this;
                    var dfd = $.Deferred();
                    self.userInfo(userInfo);
                    dfd.resolve(self.userInfo());
                    return dfd.promise();
                };
                return ControlSidebarScreenModel;
            }());
            vipfbnow.ControlSidebarScreenModel = ControlSidebarScreenModel;
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
