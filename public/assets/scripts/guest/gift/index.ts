/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {
    export class GiftScreenModel {
        userInfo: KnockoutObservable<UserInfo>;
        giftCode: KnockoutObservable<string>;
        lsLog: KnockoutObservableArray<GiftInfo>;
        isEnable: KnockoutObservable<boolean>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.giftCode = ko.observable<string>('');
            self.lsLog = ko.observableArray<GiftInfo>([]);
            self.isEnable = ko.observable<boolean>(true);
        }

        reset() {
            var self = this;
            self.giftCode('');
            self.isEnable(true);
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(result) {
                self.userInfo(result);
                self.getGiftLog().done(function() {
                    dfd.resolve();
                });
            }).always(function() {
                dfd.resolve();
            });
            return dfd.promise();
        }

        gift(): void {
            var self = this;
            $.blockUI();
            self.isEnable(false);
            $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
            let giftInfo = new GiftInfo(self.userInfo().username);
            giftInfo.giftCode = self.giftCode();

            Utils.postData($('#giftProcessURL').val(), giftInfo).done(function(result) {
                Utils.notify(result).done(function() {
                    Utils.getLoggedInUserInfo().done(function(result) {
                        self.userInfo(result);
                        self.reset();
                        self.getGiftLog().always(function () {
                            Utils.reloadLayoutData(self.userInfo());
                        });
                    });
                });
            }).fail(function(result) {
                swal("ERROR", "Lỗi không xác định, vui lòng liên hệ quản trị viên.", SweetAlertType.ERROR);
            }).always(function(result) {
                $('#postdata').html('Nhập Quà');
                self.isEnable(true);
                $.unblockUI();
            });
        }

        getGiftLog(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.postData($('#giftLogURL').val(), null).done(function(result) {
                if (result.success) {
                    let lsResult = JSON.parse(result.message);
                    for (let log of lsResult) {
                        let giftInfo = new GiftInfo(log.account.username);
                        giftInfo.load(log.account.username, log.giftcode, log.amount, log.usedtime);
                        self.lsLog.push(giftInfo);
                    }
                } else {
                    Utils.notify(result);
                }
            }).fail(function(result) {
                swal('ERROR', 'Lỗi không xác định, vui lòng liên hệ quản trị viên', SweetAlertType.ERROR);
            }).always(function() {
                dfd.resolve();
            });
            return dfd.promise();
        }
    }

    class GiftInfo {
        username: string;
        giftCode: string;
        amount: string;
        usedtime: string;

        constructor(username: string) {
            var self = this;
            self.username = username;
            self.giftCode = '';
            self.amount = '0';
            self.usedtime = '';
        }

        load(username: string, giftCode: string, amount: string, usedtime: string) {
            var self = this;
            self.username = username;
            self.giftCode = giftCode;
            self.amount = amount;
            self.usedtime = usedtime;
        }
    }

    $(document).ready(function() {
        var screenModel = new GiftScreenModel();
        $.blockUI({ baseZ: 2000 });
        // $(".form-control").tooltip({ placement: 'right'});

        screenModel.startPage().done(function() {
            Utils.loadLayoutScreenModel(screenModel.userInfo()).done(function() {
                ko.applyBindings(screenModel);
                $.unblockUI();
            });
        });
    });
}