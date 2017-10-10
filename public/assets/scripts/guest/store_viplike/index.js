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
                    self.fbURL = ko.observable('');
                    self.fbId = ko.observable('');
                    self.fbName = ko.observable('');
                    self.likePackage = ko.observable(1);
                    self.likeSpeed = ko.observable(5);
                    self.dayPackage = ko.observable(30);
                    self.note = ko.observable('');
                    self.totalID = ko.observable(0);
                    self.price = ko.observable(0);
                    self.isEnable = ko.observable(true);
                    self.fbURL.subscribe(function () {
                        $.blockUI();
                        self.isEnable(false);
                        self.getFbUserInfo().always(function () {
                            self.isEnable(true);
                            $.unblockUI();
                        });
                    });
                }
                StoreVipLikeScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                        self.calculate().always(function () {
                            dfd.resolve();
                        });
                    }).fail(function () {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                StoreVipLikeScreenModel.prototype.getFbUserInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getFacebookInfo(self.fbURL()).done(function (result) {
                        if (result.success) {
                            self.fbId(result.message[0].fbid);
                            self.fbName(result.message[0].fbname);
                        }
                        else {
                            vipfbnow.Utils.notify(result);
                        }
                    }).always(function () {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                StoreVipLikeScreenModel.prototype.calculate = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    $.blockUI();
                    self.isEnable(false);
                    var data = {
                        likePackage: self.likePackage(),
                        dayPackage: self.dayPackage()
                    };
                    vipfbnow.Utils.postData($('#calculateURL').val(), data).done(function (result) {
                        if (result.success) {
                            self.price(result.vnd);
                        }
                        else {
                            vipfbnow.Utils.notify(result);
                        }
                    }).fail(function (result) {
                        swal('ERROR', 'Lỗi không xác định, vui lòng liên hệ quản trị viên', "error" /* ERROR */);
                    }).always(function () {
                        self.isEnable(true);
                        $.unblockUI();
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                return StoreVipLikeScreenModel;
            }());
            vipfbnow.StoreVipLikeScreenModel = StoreVipLikeScreenModel;
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
