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
                    self.commentContent = ko.observable('');
                    self.lsCmtPackage = ko.observableArray([]);
                    self.lsDayPackage = ko.observableArray([]);
                    self.lsCmtSpeed = ko.observableArray([]);
                    self.isEnable = ko.observable(true);
                    self.lsVipComment = ko.observableArray([]);
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
                        self.getListVipID().always(function () {
                            self.getPackageInfo().always(function () {
                                self.getCommentSpeedInfo().always(function () {
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
                StoreVipCmtScreenModel.prototype.getCommentSpeedInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var data = {
                        type: 1 /* COMMENT */
                    };
                    vipfbnow.Utils.postData($('#speedURL').val(), data).done(function (result) {
                        if (result.success) {
                            for (var _i = 0, _a = result.message[0]; _i < _a.length; _i++) {
                                var cmtSpeedObject = _a[_i];
                                self.lsCmtSpeed.push(new vipfbnow.PackageObject(cmtSpeedObject.id, cmtSpeedObject.value));
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
                StoreVipCmtScreenModel.prototype.getPackageInfo = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    var data = {
                        packageType: 1 /* COMMENT */
                    };
                    vipfbnow.Utils.postData($('#packageURL').val(), data).done(function (result) {
                        if (result.success) {
                            if (result.message[0].hasOwnProperty('commentPackage')) {
                                for (var _i = 0, _a = result.message[0].commentPackage; _i < _a.length; _i++) {
                                    var cmtPackage = _a[_i];
                                    self.lsCmtPackage.push(new vipfbnow.PackageObject(cmtPackage.id, cmtPackage.total));
                                }
                            }
                            for (var _b = 0, _c = result.message[0].dayPackage; _b < _c.length; _b++) {
                                var dayPackage = _c[_b];
                                if (dayPackage.daytotal == 30 || dayPackage.daytotal == 60 || dayPackage.daytotal == 90) {
                                    self.lsDayPackage.push(new vipfbnow.PackageObject(dayPackage.id, dayPackage.daytotal));
                                }
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
                StoreVipCmtScreenModel.prototype.getListVipID = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    self.lsVipComment([]);
                    var data = {
                        packageType: 1 /* COMMENT */
                    };
                    vipfbnow.Utils.postData($('#listVIPURL').val(), data).done(function (result) {
                        if (result.success) {
                            self.totalID(result.message[0].lsVipComment.length);
                            for (var _i = 0, _a = result.message[0].lsVipComment; _i < _a.length; _i++) {
                                var vipComment = _a[_i];
                                var storeVipComment = new vipfbnow.StoreVip();
                                storeVipComment.package = vipComment.package.total;
                                storeVipComment.fbName = vipComment.fbname;
                                storeVipComment.note = vipComment.note;
                                storeVipComment.expireDate = vipComment.expiretime;
                                self.lsVipComment.push(storeVipComment);
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
