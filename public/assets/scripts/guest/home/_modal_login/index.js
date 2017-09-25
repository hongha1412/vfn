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
            var ModalLoginScreenModel = (function () {
                function ModalLoginScreenModel() {
                    var self = this;
                    self.username = ko.observable("");
                    self.password = ko.observable("");
                    self.loginResult = ko.observable("");
                    self.isEnable = ko.observable(true);
                }
                ModalLoginScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    dfd.resolve();
                    return dfd.promise();
                };
                ModalLoginScreenModel.prototype.login = function () {
                    var self = this;
                    var data = new UserInfo(self.username(), self.password());
                    self.isEnable(false);
                    $('#postdata2').html('<i class="fa fa-spinner fa-spin"></i> Vui Lòng Đợi..');
                    vipfbnow.Utils.postData($("#loginURL").val(), data).done(function (result) {
                        vipfbnow.Utils.notify(result).done(function () {
                            location.reload();
                        });
                    }).fail(function (result) {
                        vipfbnow.Utils.notify(result);
                    }).always(function () {
                        $('#postdata2').html('<i class="fa fa-sign-in"></i> Đăng Nhập');
                        self.isEnable(true);
                    });
                };
                return ModalLoginScreenModel;
            }());
            vipfbnow.ModalLoginScreenModel = ModalLoginScreenModel;
            var UserInfo = (function () {
                function UserInfo(username, password) {
                    var self = this;
                    self.username = username;
                    self.password = password;
                }
                return UserInfo;
            }());
            // $(document).ready(function() {
            //     var screenModel = new ModalLoginScreenModel();
            //     $.blockUI();
            //     screenModel.startPage().done(function() {
            //         ko.applyBindings(screenModel, $("#modal-login-content")[0]);
            //         $.unblockUI();
            //     });
            // });
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
