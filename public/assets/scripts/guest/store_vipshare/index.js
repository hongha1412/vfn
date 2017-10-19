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
            var StoreVipShareScreenModel = (function () {
                function StoreVipShareScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                    self.totalID = ko.observable(0);
                    self.fbURL = ko.observable('');
                    self.fbId = ko.observable('');
                    self.fbName = ko.observable('');
                    self.sharePackage = ko.observable(1);
                    self.shareSpeed = ko.observable(1);
                    self.dayPackage = ko.observable(1);
                    self.price = ko.observable(0);
                    self.note = ko.observable('');
                    self.lsSharePackage = ko.observableArray([]);
                    self.lsDayPackage = ko.observableArray([]);
                    self.lsShareSpeed = ko.observableArray([]);
                    self.isEnable = ko.observable(true);
                    self.lsVipShare = ko.observableArray([]);
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
                    self.sharePackage.subscribe(function () {
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
                StoreVipShareScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                        self.getListVipID().always(function () {
                            self.getPackageInfo().always(function () {
                                self.getShareSpeedInfo().always(function () {
                                    self.calculate().done(function (result) {
                                        self.price(result);
                                    }).always(function () {
                                        dfd.resolve();
                                    });
                                });
                            });
                        });
                    }).fail(function (result) {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                StoreVipShareScreenModel.prototype.reset = function () {
                    var self = this;
                    self.fbURL('');
                    self.fbId('');
                    self.fbName('');
                    self.sharePackage(15);
                    self.shareSpeed(15);
                    self.dayPackage(1);
                    self.note('');
                    self.isEnable(true);
                };
                StoreVipShareScreenModel.prototype.getFbUserInfo = function () {
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
                StoreVipShareScreenModel.prototype.getShareSpeedInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var data = {
                        type: 2 /* SHARE */
                    };
                    vipfbnow.Utils.postData($('#speedURL').val(), data).done(function (result) {
                        if (result.success) {
                            for (var _i = 0, _a = result.message[0]; _i < _a.length; _i++) {
                                var shareSpeedObject = _a[_i];
                                self.lsShareSpeed.push(new vipfbnow.PackageObject(shareSpeedObject.id, shareSpeedObject.value));
                            }
                        }
                        else {
                            vipfbnow.Utils.notify(result);
                        }
                    }).fail(function (result) {
                        vipfbnow.Utils.unexpectedError();
                    }).always(function () {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                StoreVipShareScreenModel.prototype.getPackageInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var data = {
                        packageType: 2 /* SHARE */
                    };
                    vipfbnow.Utils.postData($('#packageURL').val(), data).done(function (result) {
                        if (result.success) {
                            if (result.message[0].hasOwnProperty('sharePackage')) {
                                for (var _i = 0, _a = result.message[0].sharePackage; _i < _a.length; _i++) {
                                    var sharePackage = _a[_i];
                                    self.lsSharePackage.push(new vipfbnow.PackageObject(sharePackage.id, sharePackage.total));
                                }
                            }
                            for (var _b = 0, _c = result.message[0].dayPackage; _b < _c.length; _b++) {
                                var dayPackage = _c[_b];
                                self.lsDayPackage.push(new vipfbnow.PackageObject(dayPackage.id, dayPackage.daytotal));
                            }
                        }
                        else {
                            vipfbnow.Utils.notify(result);
                        }
                    }).fail(function (result) {
                        vipfbnow.Utils.unexpectedError();
                    }).always(function (result) {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                StoreVipShareScreenModel.prototype.calculate = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var price = 0;
                    $.blockUI();
                    self.isEnable(false);
                    var data = {
                        sharePackage: self.sharePackage(),
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
                StoreVipShareScreenModel.prototype.buyVipShare = function () {
                    var self = this;
                    $.blockUI();
                    self.isEnable(false);
                    var data = new vipfbnow.StoreVip();
                    data.fbId = self.fbId();
                    data.fbName = self.fbName();
                    data.package = self.sharePackage();
                    data.speed = self.shareSpeed();
                    data.dayPackage = self.dayPackage();
                    data.note = self.note();
                    vipfbnow.Utils.postData($('#buyVipShareURL').val(), data).done(function (result) {
                        vipfbnow.Utils.notify(result).done(function () {
                            vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                                self.userInfo(result);
                                self.reset();
                                self.getListVipID().always(function () {
                                    vipfbnow.Utils.reloadLayoutData(self.userInfo());
                                });
                            });
                        });
                    }).fail(function (result) {
                        vipfbnow.Utils.unexpectedError();
                    }).always(function () {
                        self.isEnable(true);
                        $.unblockUI();
                    });
                };
                StoreVipShareScreenModel.prototype.getListVipID = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    self.lsVipShare([]);
                    var data = {
                        packageType: 2 /* SHARE */
                    };
                    vipfbnow.Utils.postData($('#listVIPURL').val(), data).done(function (result) {
                        if (result.success) {
                            self.totalID(result.message[0].lsVipShare.length);
                            for (var _i = 0, _a = result.message[0].lsVipShare; _i < _a.length; _i++) {
                                var vipShare = _a[_i];
                                var storeVipShare = new vipfbnow.StoreVip();
                                storeVipShare.package = vipShare.package.total;
                                storeVipShare.fbName = vipShare.fbname;
                                storeVipShare.note = vipShare.note;
                                storeVipShare.expireDate = vipShare.expiretime;
                                self.lsVipShare.push(storeVipShare);
                            }
                        }
                        else {
                            vipfbnow.Utils.notify(result);
                        }
                    }).fail(function (result) {
                        vipfbnow.Utils.unexpectedError();
                    }).always(function () {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                return StoreVipShareScreenModel;
            }());
            vipfbnow.StoreVipShareScreenModel = StoreVipShareScreenModel;
            $(document).ready(function () {
                var screenModel = new StoreVipShareScreenModel();
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
