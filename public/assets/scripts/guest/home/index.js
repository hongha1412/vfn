/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
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
                    self.username = ko.observable("");
                    self.password = ko.observable("");
                    self.loginResult = ko.observable("");
                }
                HomeScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    dfd.resolve();
                    return dfd.promise();
                };
                HomeScreenModel.prototype.login = function () {
                    var self = this;
                    var data = new UserInfo(self.username(), self.password());
                    vipfbnow.Utils.postData($("#loginURL").val(), data).done(function (result) {
                        swal({
                            title: "Thành Công",
                            text: result.message,
                            type: "success" /* SUCCESS */
                        }, function () {
                            location.reload();
                        });
                    }).fail(function (result) {
                        swal({
                            title: "Lỗi",
                            text: result.message,
                            type: "error" /* ERROR */
                        });
                    });
                };
                return HomeScreenModel;
            }());
            vipfbnow.HomeScreenModel = HomeScreenModel;
            var UserInfo = (function () {
                function UserInfo(username, password) {
                    var self = this;
                    self.username = username;
                    self.password = password;
                }
                return UserInfo;
            }());
            vipfbnow.UserInfo = UserInfo;
            $(document).ready(function () {
                var screenModel = new HomeScreenModel();
                $.blockUI();
                screenModel.startPage().done(function () {
                    ko.applyBindings(screenModel);
                    $.unblockUI();
                });
            });
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
