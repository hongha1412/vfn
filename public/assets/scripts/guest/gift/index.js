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
            var GiftScreenModel = (function () {
                function GiftScreenModel() {
                    var self = this;
                    self.userInfo = ko.observable(new vipfbnow.UserInfo());
                    self.giftCode = ko.observable('');
                    self.isEnable = ko.observable(true);
                }
                GiftScreenModel.prototype.startPage = function () {
                    var self = this;
                    var dfd = $.Deferred();
                    vipfbnow.Utils.getLoggedInUserInfo().done(function (result) {
                        self.userInfo(result);
                    }).always(function () {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                GiftScreenModel.prototype.gift = function () {
                    var self = this;
                    $.blockUI();
                    self.isEnable(false);
                    $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
                    var giftInfo = new GiftInfo(self.userInfo().username);
                    giftInfo.giftCode = self.giftCode();
                    vipfbnow.Utils.postData($('#giftProcessURL').val(), giftInfo).done(function (result) {
                        vipfbnow.Utils.notify(result).done(function () {
                            location.reload();
                        });
                    }).fail(function (result) {
                        swal("ERROR", "Lỗi không xác định, vui lòng liên hệ quản trị viên.", "error" /* ERROR */);
                    }).always(function (result) {
                        $('#postdata').html('Nạp Thẻ');
                        self.isEnable(true);
                        $.unblockUI();
                    });
                };
                return GiftScreenModel;
            }());
            vipfbnow.GiftScreenModel = GiftScreenModel;
            var GiftInfo = (function () {
                function GiftInfo(username) {
                    var self = this;
                    self.username = username;
                    self.giftCode = '';
                }
                GiftInfo.prototype.load = function (username, giftCode) {
                    var self = this;
                    self.username = username;
                    self.giftCode = giftCode;
                };
                return GiftInfo;
            }());
            $(document).ready(function () {
                var screenModel = new GiftScreenModel();
                $.blockUI({ baseZ: 2000 });
                // $(".form-control").tooltip({ placement: 'right'});
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
