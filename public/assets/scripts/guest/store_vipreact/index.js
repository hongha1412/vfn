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
            var StoreVipReactScreenModel = (function () {
                function StoreVipReactScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                    self.totalID = ko.observable(0);
                    self.fbURL = ko.observable('');
                    self.fbId = ko.observable('');
                    self.fbName = ko.observable('');
                    self.reactPackage = ko.observable(1);
                    self.reactSpeed = ko.observable(1);
                    self.reactType = ko.observable("LIKE" /* LIKE */);
                    self.dayPackage = ko.observable(1);
                    self.price = ko.observable(0);
                    self.note = ko.observable('');
                    self.lsReactPackage = ko.observableArray([]);
                    self.lsDayPackage = ko.observableArray([]);
                    self.lsReactSpeed = ko.observableArray([]);
                    self.isEnable = ko.observable(true);
                    self.lsVipReact = ko.observableArray([]);
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
                    self.reactPackage.subscribe(function () {
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
                StoreVipReactScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                        self.getListVipID().always(function () {
                            self.getPackageInfo().always(function () {
                                self.getReactSpeedInfo().always(function () {
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
                StoreVipReactScreenModel.prototype.reset = function () {
                    var self = this;
                    self.fbURL('');
                    self.fbId('');
                    self.fbName('');
                    self.reactPackage(22);
                    self.reactSpeed(22);
                    self.reactType("LIKE" /* LIKE */);
                    self.dayPackage(1);
                    self.note('');
                    self.isEnable(true);
                };
                StoreVipReactScreenModel.prototype.getFbUserInfo = function () {
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
                StoreVipReactScreenModel.prototype.getReactSpeedInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var data = {
                        type: 3 /* REACT */
                    };
                    vipfbnow.Utils.postData($('#speedURL').val(), data).done(function (result) {
                        if (result.success) {
                            for (var _i = 0, _a = result.message[0]; _i < _a.length; _i++) {
                                var reactSpeedObject = _a[_i];
                                self.lsReactSpeed.push(new vipfbnow.PackageObject(reactSpeedObject.id, reactSpeedObject.value));
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
                StoreVipReactScreenModel.prototype.getPackageInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var data = {
                        packageType: 3 /* REACT */
                    };
                    vipfbnow.Utils.postData($('#packageURL').val(), data).done(function (result) {
                        if (result.success) {
                            if (result.message[0].hasOwnProperty('reactPackage')) {
                                for (var _i = 0, _a = result.message[0].reactPackage; _i < _a.length; _i++) {
                                    var reactPackage = _a[_i];
                                    self.lsReactPackage.push(new vipfbnow.PackageObject(reactPackage.id, reactPackage.total));
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
                StoreVipReactScreenModel.prototype.calculate = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var price = 0;
                    $.blockUI();
                    self.isEnable(false);
                    var data = {
                        reactPackage: self.reactPackage(),
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
                StoreVipReactScreenModel.prototype.buyVipReact = function () {
                    var self = this;
                    $.blockUI();
                    self.isEnable(false);
                    var data = new vipfbnow.StoreVip();
                    data.fbId = self.fbId();
                    data.fbName = self.fbName();
                    data.package = self.reactPackage();
                    data.speed = self.reactSpeed();
                    data.dayPackage = self.dayPackage();
                    data.note = self.note();
                    data.reactType = self.reactType();
                    vipfbnow.Utils.postData($('#buyVipReactURL').val(), data).done(function (result) {
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
                StoreVipReactScreenModel.prototype.getListVipID = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    self.lsVipReact([]);
                    var data = {
                        packageType: 3 /* REACT */
                    };
                    vipfbnow.Utils.postData($('#listVIPURL').val(), data).done(function (result) {
                        if (result.success) {
                            self.totalID(result.message[0].lsVipReact.length);
                            for (var _i = 0, _a = result.message[0].lsVipReact; _i < _a.length; _i++) {
                                var vipReact = _a[_i];
                                var storeVipReact = new vipfbnow.StoreVip();
                                storeVipReact.package = vipReact.package.total;
                                storeVipReact.fbName = vipReact.fbname;
                                storeVipReact.note = vipReact.note;
                                storeVipReact.expireDate = vipReact.expiretime;
                                storeVipReact.reactType = vipReact.reacttype;
                                self.lsVipReact.push(storeVipReact);
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
                return StoreVipReactScreenModel;
            }());
            vipfbnow.StoreVipReactScreenModel = StoreVipReactScreenModel;
            $(document).ready(function () {
                var screenModel = new StoreVipReactScreenModel();
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
