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
            var GetTokenScreenModel = (function () {
                function GetTokenScreenModel() {
                    var self = this;
                    self.user = ko.observable('');
                    self.pass = ko.observable('');
                    self.accessCode = ko.observable('');
                    self.isEnable = ko.observable(true);
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                }
                GetTokenScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                    }).always(function () {
                        dfd.resolve(self.userInfo());
                    });
                    return dfd.promise();
                };
                GetTokenScreenModel.prototype.getToken = function () {
                    var self = this;
                    var fbUser = new FbUser(self.user(), self.pass());
                    self.isEnable(false);
                    vipfbnow.Utils.postData($('#getTokenProcessURL').val(), fbUser).done(function (result) {
                        if (result.success) {
                            self.accessCode(result.message[0]);
                        }
                        else {
                            vipfbnow.Utils.notify(result);
                        }
                    }).fail(function (result) {
                        vipfbnow.Utils.notify(result);
                    }).always(function () {
                        self.isEnable(true);
                    });
                };
                return GetTokenScreenModel;
            }());
            vipfbnow.GetTokenScreenModel = GetTokenScreenModel;
            var FbUser = (function () {
                function FbUser(user, pass) {
                    var self = this;
                    self.user = user;
                    self.pass = pass;
                }
                return FbUser;
            }());
            $(document).ready(function () {
                var screenModel = new GetTokenScreenModel();
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
