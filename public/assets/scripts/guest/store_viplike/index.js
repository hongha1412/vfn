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
            var StoreVipLikeScreenModel = (function () {
                function StoreVipLikeScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                }
                StoreVipLikeScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                    }).always(function () {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                return StoreVipLikeScreenModel;
            }());
            vipfbnow.StoreVipLikeScreenModel = StoreVipLikeScreenModel;
            var StoreVipLike = (function () {
                function StoreVipLike() {
                    var self = this;
                    self.countID = 0;
                }
                return StoreVipLike;
            }());
            $(document).ready(function () {
                var screenModel = new StoreVipLikeScreenModel();
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
