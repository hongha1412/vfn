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
            var StoreVipCmtScreenModel = (function () {
                function StoreVipCmtScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                    self.totalID = ko.observable(0);
                    self.fbURL = ko.observable('');
                    self.fbId = ko.observable('');
                    self.fbName = ko.observable('');
                    self.cmtPackage = ko.observable(1);
                    self.cmtSpeed = ko.observable(1);
                    self.dayPackage = ko.observable(1);
                    self.price = ko.observable(0);
                    self.lsCmtPackage = ko.observableArray([]);
                    self.lsDayPackage = ko.observableArray([]);
                    self.lsCmtSpeed = ko.observableArray([]);
                    self.isEnable = ko.observable(true);
                    self.fbURL.subscribe(function () {
                        $.blockUI();
                        self.isEnable(false);
                        if (!self.fbURL()) {
                            self.isEnable(true);
                            $.unblockUI();
                            return;
                        }
                        self.getFbUserInfo().always(function () {
                            self.isEnable(true);
                            $.unblockUI();
                        });
                    });
                    self.cmtPackage.subscribe(function () {
                        self.calculate().done(function (result) {
                            self.price(result);
                        });
                    });
                    self.dayPackage.subscribe(function () {
                        self.calculate().done(function (result) {
                            self.price(result);
                        });
                    });
                }
                StoreVipCmtScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                        dfd.resolve();
                    }).fail(function (result) {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                StoreVipCmtScreenModel.prototype.getFbUserInfo = function () {
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
                StoreVipCmtScreenModel.prototype.calculate = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var price = 0;
                    $.blockUI();
                    self.isEnable(false);
                    var data = {
                        cmtPackage: self.cmtPackage(),
                        dayPackage: self.dayPackage()
                    };
                    vipfbnow.Utils.postData($('#calculateURL').val(), data).done(function (result) {
                        if (result.success) {
                            price = vipfbnow.Utils.number_format(result.message[0].vnd);
                        }
                        else {
                            vipfbnow.Utils.notify(result);
                        }
                    }).fail(function (result) {
                        vipfbnow.Utils.unexpectedError();
                    }).always(function () {
                        self.isEnable(true);
                        $.unblockUI();
                        dfd.resolve(price);
                    });
                    return dfd.promise();
                };
                StoreVipCmtScreenModel.prototype.buyVipCmt = function () {
                    var self = this;
                };
                return StoreVipCmtScreenModel;
            }());
            vipfbnow.StoreVipCmtScreenModel = StoreVipCmtScreenModel;
            $(document).ready(function () {
                var screenModel = new StoreVipCmtScreenModel();
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
