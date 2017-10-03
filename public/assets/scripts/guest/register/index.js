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
            var RegisterScreenModel = (function () {
                function RegisterScreenModel() {
                    var self = this;
                    self.fullname = ko.observable("");
                    self.email = ko.observable("");
                    self.username = ko.observable("");
                    self.password = ko.observable("");
                    self.password_confirmation = ko.observable("");
                    self.registerResult = ko.observable("");
                    self.isEnable = ko.observable(true);
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                }
                RegisterScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                    }).always(function () {
                        dfd.resolve(self.userInfo());
                    });
                    return dfd.promise();
                };
                RegisterScreenModel.prototype.register = function () {
                    var self = this;
                    var data = new RegisterUserInfo(self.fullname(), self.email(), self.username(), self.password(), self.password_confirmation());
                    self.isEnable(false);
                    $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Vui Lòng Đợi..');
                    vipfbnow.Utils.postData($("#registerURL").val(), data).done(function (result) {
                        vipfbnow.Utils.notify(result).done(function () {
                            window.location.href = "/";
                        });
                    }).fail(function (result) {
                        vipfbnow.Utils.notify(result);
                    }).always(function () {
                        $('#postdata').html('Đăng Ký');
                        self.isEnable(true);
                    });
                };
                return RegisterScreenModel;
            }());
            vipfbnow.RegisterScreenModel = RegisterScreenModel;
            var RegisterUserInfo = (function () {
                function RegisterUserInfo(fullname, email, username, password, password_confirmation) {
                    var self = this;
                    self.email = email;
                    self.fullname = fullname;
                    self.username = username;
                    self.password = password;
                    self.password_confirmation = password_confirmation;
                }
                return RegisterUserInfo;
            }());
            $(document).ready(function () {
                var screenModel = new RegisterScreenModel();
                $.blockUI({ baseZ: 2000 });
                screenModel.startPage().done(function () {
                    vipfbnow.Utils.loadLayoutScreenModel(screenModel.userInfo()).done(function () {
                        ko.applyBindings(screenModel);
                        $.unblockUI();
                    });
                });
            });
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
