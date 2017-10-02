/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts/" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../models/index.ts" />
// <reference path="../../guest/home/index.ts" />

module com.sabrac.vipfbnow {

    export class Utils {
        self: any;

        constructor() {
            this.self = this;
        }

        public static getLoggedInUserInfo(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            var userInfo = new UserInfo();
            // Get logged in user info
            Utils.postData($("#get-logged-in-user-info-URL").val(), '').done(function(result) {
                if (result.success && result.message.length > 0) {
                    result = JSON.parse(result.message[0])
                    userInfo.load(result.avt, result.fullname, result.username, result.vnd, result.toida, result.mail, result.sdt);
                }
                dfd.resolve(userInfo);
            }).fail(function(result) {
                dfd.resolve();
            });
            return dfd.promise();
        }

        public static notify(result: any): JQueryPromise<any> {
            var dfd = $.Deferred();

            if (result.status) {
                result = JSON.parse(result.responseText);
            }

            if (result.success) {
                swal({
                    title: "Thành Công",
                    text: result.message,
                    type: SweetAlertType.SUCCESS
                }, function() {
                    dfd.resolve();
                });
            } else {
                swal({
                    title: "Lỗi",
                    text: result.message,
                    type: SweetAlertType.ERROR
                }, function() {
                    dfd.reject();
                });
            }
            return dfd.promise();
        }

        public static postData(url: string, data: any): JQueryPromise<any> {
            var dfd = $.Deferred();
            $.ajax({
                url: url,
                data: JSON.stringify(data),
                type: 'post',
                beforeSend: function(request) {
                    request.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
                },
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                cache: false,
                success: function(result) {
                    // dfd.resolve(JSON.parse(result));
                    dfd.resolve(result);
                },
                error: function(result) {
                    dfd.reject(result);
                }
            });
            return dfd.promise();
        }

        public static number_format (number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number;
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;
            var s: any;
            var toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + (Math.round(n * k) / k).toFixed(prec);
            }

            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    }

    export const enum SweetAlertType {
        WARNING = "warning",
        ERROR = "error",
        SUCCESS = "success",
        INFO = "info"
    }
}