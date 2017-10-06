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
        isEnable: KnockoutObservable<boolean>;

        constructor() {
            var self = this;
            self.userInfo = ko.observable<UserInfo>(new UserInfo());
            self.giftCode = ko.observable<string>('');
            self.isEnable = ko.observable<boolean>(true);
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            Utils.getLoggedInUserInfo().done(function(result) {
                self.userInfo(result);
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
                    location.reload();
                });
            }).fail(function(result) {
                swal("ERROR", "Lỗi không xác định, vui lòng liên hệ quản trị viên.", SweetAlertType.ERROR);
            }).always(function(result) {
                $('#postdata').html('Nạp Thẻ');
                self.isEnable(true);
                $.unblockUI();
            });
        }
    }

    class GiftInfo {
        username: string;
        giftCode: string;

        constructor(username: string) {
            var self = this;
            self.username = username;
            self.giftCode = '';
        }

        load(username: string, giftCode: string) {
            var self = this;
            self.username = username;
            self.giftCode = giftCode;
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