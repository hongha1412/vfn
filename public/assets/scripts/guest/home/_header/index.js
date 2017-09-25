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
            var HeaderScreenModel = (function () {
                function HeaderScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new UserInfo());
                }
                HeaderScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    self.getLoggedInUserInfo().done(function () {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                HeaderScreenModel.prototype.getLoggedInUserInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    // Get logged in user info
                    vipfbnow.Utils.postData($("#get-logged-in-user-info-URL").val(), '').done(function (result) {
                        if (result.message.length > 0) {
                            result = JSON.parse(result.message[0]);
                            self.userInfo().load(result.avt, result.fullname, result.username);
                        }
                        else {
                            swal("Lỗi", "Cannot found user data info", "error" /* ERROR */);
                        }
                        dfd.resolve(self.userInfo());
                    }).fail(function (result) {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                return HeaderScreenModel;
            }());
            vipfbnow.HeaderScreenModel = HeaderScreenModel;
            var UserInfo = (function () {
                function UserInfo() {
                    var self = this;
                    self.avt = "";
                    self.fullname = "";
                    self.username = "";
                }
                UserInfo.prototype.load = function (avt, fullname, username) {
                    var self = this;
                    self.avt = avt;
                    self.fullname = fullname;
                    self.username = username;
                };
                return UserInfo;
            }());
            // $(document).ready(function() {
            //     var screenModel = new HeaderScreenModel();
            //     $.blockUI();
            //     screenModel.startPage().done(function() {
            //         ko.applyBindings(screenModel, $("#header-content")[0]);
            //         $.unblockUI();
            //     });
            // });
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
