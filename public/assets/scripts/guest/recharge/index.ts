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

module com.sabrac.vipfbnow {
    export class RechargeScreenModel {
        userInfo: KnockoutObservable<UserInfo>;
        isEnable: KnockoutObservable<boolean>;
        rechargeInfo: KnockoutObservable<RechargeInfo>;
        lsLog: KnockoutObservableArray<RechargeInfo>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.isEnable = ko.observable<boolean>(true);
            self.rechargeInfo = ko.observable<RechargeInfo>(new RechargeInfo());
            self.lsLog = ko.observableArray<RechargeInfo>([]);
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(userInfo) {
                self.userInfo(userInfo);
                self.getRechargeLog().always(function() {
                    dfd.resolve();
                });
            });
            return dfd.promise();
        }

        processRecharge(): void {
            var self = this;
            $.blockUI();
            self.isEnable(false);
            $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
            self.rechargeInfo().username = self.userInfo().username;

            Utils.postData($('#rechargeProcessURL').val(), self.rechargeInfo()).done(function(result) {
                Utils.notify(result);
            }).fail(function(result) {
                Utils.notify(result);
            }).always(function() {
                $('#postdata').html('Nạp Thẻ');
                self.isEnable(true);
                $.unblockUI();
            });
        }

        getRechargeLog(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();

            Utils.postData($('#rechargeLogURL').val(), null).done(function(result) {
                let lsResult = $.parseJSON(result.message);
                for (let rs of lsResult) {
                    let rechargeInfo = new RechargeInfo();
                    rechargeInfo.load(rs.account_user_id.username, rs.account_receive_user_id.username,
                        rs.telco, rs.serial, rs.cardcode, Utils.number_format(rs.amount, 0, ',', ','), rs.created_at);
                    self.lsLog.push(rechargeInfo);
                }
            }).fail(function(result) {
                swal('ERROR', 'Lỗi không xác định, vui lòng liên hệ quản trị viên', SweetAlertType.ERROR);
            }).always(function() {
                dfd.resolve();
            });
            return dfd.promise();
        }
    }

    class RechargeInfo {
        username: string;
        receiveUsername: string;
        provider: string;
        seri: string;
        pin: string;
        amount: string;
        time: string;

        constructor() {
            var self = this;
            self.username = '';
            self.receiveUsername = '';
            self.provider = '';
            self.seri = '';
            self.pin = '';
            self.amount = "-1";
            self.time = '';
        }

        load(username: string, receiveUsername: string, provider: string,
             seri: string, pin: string, amount: string, time: string) {

            var self = this;
            self.username = username;
            self.receiveUsername = receiveUsername;
            self.provider = provider;
            self.seri = seri;
            self.pin = pin;
            self.amount = amount;
            self.time = time;
        }
    }

    $(document).ready(function() {
        var screenModel = new RechargeScreenModel();
        $.blockUI({ baseZ: 2000 });

        screenModel.startPage().done(function() {
            Utils.loadLayoutScreenModel(screenModel.userInfo()).done(function() {
                ko.applyBindings(screenModel);
                $.unblockUI();
            });
        });
    });
}