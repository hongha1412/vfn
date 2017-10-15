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
                    self.likeSpeed = ko.observable(1);
                    self.dayPackage = ko.observable(1);
                    self.note = ko.observable('');
                    self.totalID = ko.observable(0);
                    self.price = ko.observable(0);
                    self.lsLikePackage = ko.observableArray([]);
                    self.lsDayPackage = ko.observableArray([]);
                    self.lsLikeSpeed = ko.observableArray([]);
                    self.isEnable = ko.observable(true);
                    self.lsVipLike = ko.observableArray([]);
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
                    self.likePackage.subscribe(function () {
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
                StoreVipLikeScreenModel.prototype.reset = function () {
                    var self = this;
                    self.fbURL('');
                    self.fbId('');
                    self.fbName('');
                    self.likePackage(1);
                    self.likeSpeed(1);
                    self.dayPackage(1);
                    self.note('');
                    self.isEnable(true);
                };
                StoreVipLikeScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                        self.getListVipID().always(function () {
                            self.getPackageInfo().always(function () {
                                self.getLikeSpeedInfo().always(function () {
                                    self.calculate().done(function (result) {
                                        self.price(result);
                                    }).always(function () {
                                        dfd.resolve();
                                    });
                                });
                            });
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
                StoreVipLikeScreenModel.prototype.getPackageInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.postData($('#packageURL').val(), 0 /* LIKE */).done(function (result) {
                        if (result.success) {
                            for (var _i = 0, _a = result.message[0].likePackage; _i < _a.length; _i++) {
                                var likePackage = _a[_i];
                                self.lsLikePackage.push(new PackageObject(likePackage.id, likePackage.liketotal));
                            }
                            for (var _b = 0, _c = result.message[0].dayPackage; _b < _c.length; _b++) {
                                var dayPackage = _c[_b];
                                self.lsDayPackage.push(new PackageObject(dayPackage.id, dayPackage.daytotal));
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
                StoreVipLikeScreenModel.prototype.getLikeSpeedInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.postData($('#likeSpeedURL').val(), null).done(function (result) {
                        if (result.success) {
                            for (var _i = 0, _a = result.message[0]; _i < _a.length; _i++) {
                                var likeSpeedObject = _a[_i];
                                self.lsLikeSpeed.push(new PackageObject(likeSpeedObject.id, likeSpeedObject.value));
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
                StoreVipLikeScreenModel.prototype.calculate = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var price = 0;
                    $.blockUI();
                    self.isEnable(false);
                    var data = {
                        likePackage: self.likePackage(),
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
                StoreVipLikeScreenModel.prototype.buyVipLike = function () {
                    var self = this;
                    $.blockUI();
                    self.isEnable(false);
                    var data = new StoreVip();
                    data.fbId = self.fbId();
                    data.fbName = self.fbName();
                    data.package = self.likePackage();
                    data.speed = self.likeSpeed();
                    data.dayPackage = self.dayPackage();
                    data.note = self.note();
                    vipfbnow.Utils.postData($('#buyVipLikeURL').val(), data).done(function (result) {
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
                StoreVipLikeScreenModel.prototype.getListVipID = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    self.lsVipLike([]);
                    vipfbnow.Utils.postData($('#listVIPLikeURL').val(), null).done(function (result) {
                        if (result.success) {
                            self.totalID(result.message[0].lsVipLike.length);
                            for (var _i = 0, _a = result.message[0].lsVipLike; _i < _a.length; _i++) {
                                var vipLike = _a[_i];
                                var storeVipLike = new StoreVip();
                                storeVipLike.package = vipLike.like_package.liketotal;
                                storeVipLike.fbName = vipLike.fbname;
                                storeVipLike.note = vipLike.note;
                                storeVipLike.expireDate = vipLike.expiretime;
                                self.lsVipLike.push(storeVipLike);
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
                return StoreVipLikeScreenModel;
            }());
            vipfbnow.StoreVipLikeScreenModel = StoreVipLikeScreenModel;
            var StoreVip = (function () {
                function StoreVip() {
                    var self = this;
                    self.fbId = '';
                    self.fbName = '';
                    self.package = 1;
                    self.speed = 1;
                    self.dayPackage = 1;
                    self.note = '';
                    self.expireDate = '';
                }
                return StoreVip;
            }());
            var PackageObject = (function () {
                function PackageObject(id, value) {
                    var self = this;
                    self.id = id;
                    self.value = value;
                }
                return PackageObject;
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
