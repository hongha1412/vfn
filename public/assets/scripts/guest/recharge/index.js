/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../layout/_header/index.ts" />
/// <reference path="../layout/_sidebar/index.ts" />
/// <reference path="../layout/_control_sidebar/index.ts" />
/// <reference path="../layout/_modal_login/index.ts" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';
var com;
(function (com) {
    var sabrac;
    (function (sabrac) {
        var vipfbnow;
        (function (vipfbnow) {
            var RechargeScreenModel = (function () {
                function RechargeScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                    self.isEnable = ko.observable(true);
                    self.rechargeInfo = ko.observable(new RechargeInfo());
                    self.lsLog = ko.observableArray([]);
                }
                RechargeScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (userInfo) {
                        self.userInfo(userInfo);
                        self.getRechargeLog().always(function () {
                            dfd.resolve();
                        });
                    });
                    return dfd.promise();
                };
                RechargeScreenModel.prototype.processRecharge = function () {
                    var self = this;
                    $.blockUI();
                    self.isEnable(false);
                    $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
                    self.rechargeInfo().username = self.userInfo().username;
                    vipfbnow.Utils.postData($('#rechargeProcessURL').val(), self.rechargeInfo()).done(function (result) {
                        vipfbnow.Utils.notify(result);
                    }).fail(function (result) {
                        vipfbnow.Utils.notify(result);
                    }).always(function () {
                        $('#postdata').html('Nạp Thẻ');
                        self.isEnable(true);
                        $.unblockUI();
                    });
                };
                RechargeScreenModel.prototype.getRechargeLog = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.postData($('#rechargeLogURL').val(), null).done(function (result) {
                        var lsResult = $.parseJSON(result.message);
                        for (var _i = 0, lsResult_1 = lsResult; _i < lsResult_1.length; _i++) {
                            var rs = lsResult_1[_i];
                            var rechargeInfo = new RechargeInfo();
                            rechargeInfo.load(rs.account_user_id.username, rs.account_receive_user_id.username, rs.telco, rs.serial, rs.cardcode, vipfbnow.Utils.number_format(rs.amount, 0, ',', ','), rs.created_at);
                            self.lsLog.push(rechargeInfo);
                        }
                    }).fail(function (result) {
                        swal('ERROR', 'Lỗi không xác định, vui lòng liên hệ quản trị viên', "error" /* ERROR */);
                    }).always(function () {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                return RechargeScreenModel;
            }());
            vipfbnow.RechargeScreenModel = RechargeScreenModel;
            var RechargeInfo = (function () {
                function RechargeInfo() {
                    var self = this;
                    self.username = '';
                    self.receiveUsername = '';
                    self.provider = '';
                    self.seri = '';
                    self.pin = '';
                    self.amount = "-1";
                    self.time = '';
                }
                RechargeInfo.prototype.load = function (username, receiveUsername, provider, seri, pin, amount, time) {
                    var self = this;
                    self.username = username;
                    self.receiveUsername = receiveUsername;
                    self.provider = provider;
                    self.seri = seri;
                    self.pin = pin;
                    self.amount = amount;
                    self.time = time;
                };
                return RechargeInfo;
            }());
            $(document).ready(function () {
                var screenModel = new RechargeScreenModel();
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
