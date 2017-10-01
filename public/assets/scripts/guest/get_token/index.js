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
                    self.isEnable = ko.observable(true);
                }
                GetTokenScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    dfd.resolve();
                    return dfd.promise();
                };
                GetTokenScreenModel.prototype.getToken = function () {
                    var self = this;
                    var fbUser = new FbUser(self.user(), self.pass());
                    self.isEnable(false);
                    vipfbnow.Utils.postData($('#getTokenProcessURL').val(), fbUser).done(function (result) {
                        vipfbnow.Utils.notify(result);
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
                $.blockUI();
                screenModel.startPage().done(function () {
                    ko.applyBindings(screenModel);
                    $.unblockUI();
                });
            });
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
