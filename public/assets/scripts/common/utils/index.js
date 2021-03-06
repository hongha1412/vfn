/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts/" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../guest/layout/_header/index.ts" />
/// <reference path="../../guest/layout/_sidebar/index.ts" />
/// <reference path="../../guest/layout/_control_sidebar/index.ts" />
/// <reference path="../../guest/layout/_modal_login/index.ts" />
var com;
(function (com) {
    var sabrac;
    (function (sabrac) {
        var vipfbnow;
        (function (vipfbnow) {
            var Utils = (function () {
                function Utils() {
                    var self = this;
                }
                Utils.notify = function (result) {
                    var dfd = $.Deferred();
                    if (result.status) {
                        result = JSON.parse(result.responseText);
                    }
                    if (result.success) {
                        swal({
                            title: "Thành Công",
                            text: result.message,
                            type: "success" /* SUCCESS */
                        }, function () {
                            dfd.resolve();
                        });
                    }
                    else {
                        swal({
                            title: "Lỗi",
                            text: result.message,
                            type: "error" /* ERROR */
                        }, function () {
                            dfd.reject();
                        });
                    }
                    return dfd.promise();
                };
                Utils.postData = function (url, data) {
                    var dfd = $.Deferred();
                    $.ajax({
                        url: url,
                        data: JSON.stringify(data),
                        type: 'post',
                        beforeSend: function (request) {
                            request.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
                        },
                        contentType: "application/json; charset=utf-8",
                        dataType: 'json',
                        cache: false,
                        success: function (result) {
                            // dfd.resolve(JSON.parse(result));
                            dfd.resolve(result);
                        },
                        error: function (result) {
                            dfd.reject(result);
                        }
                    });
                    return dfd.promise();
                };
                Utils.number_format = function (number, decimals, decPoint, thousandsSep) {
                    if (decimals === void 0) { decimals = 0; }
                    if (decPoint === void 0) { decPoint = '.'; }
                    if (thousandsSep === void 0) { thousandsSep = ','; }
                    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                    var n = !isFinite(+number) ? 0 : +number;
                    var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
                    var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;
                    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;
                    var s;
                    var toFixedFix = function (n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + (Math.round(n * k) / k).toFixed(prec);
                    };
                    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                    if (s[0].length > 3) {
                        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                    }
                    if ((s[1] || '').length < prec) {
                        s[1] = s[1] || '';
                        s[1] += new Array(prec - s[1].length + 1).join('0');
                    }
                    return s.join(dec);
                };
                Utils.getLoggedInUserInfo = function () {
                    var dfd = $.Deferred();
                    var userInfo = new vipfbnow.UserInfo();
                    // Get logged in user info
                    Utils.postData($("#get-logged-in-user-info-URL").val(), '').done(function (result) {
                        if (result.success && result.message.length > 0) {
                            result = JSON.parse(result.message[0]);
                            userInfo.load(result.avt, result.fullname, result.username, result.vnd, result.toida, result.mail, result.sdt);
                        }
                        dfd.resolve(userInfo);
                    }).fail(function (result) {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                Utils.loadLayoutScreenModel = function (userInfo) {
                    var dfd = $.Deferred();
                    Utils.headerScreenModel = ko.observable(new vipfbnow.HeaderScreenModel());
                    Utils.modalLoginScreenModel = ko.observable(new vipfbnow.ModalLoginScreenModel());
                    Utils.sidebarScreenModel = ko.observable(new vipfbnow.SidebarScreenModel);
                    Utils.controlSidebarScreenModel = ko.observable(new vipfbnow.ControlSidebarScreenModel);
                    var dfdArray = [];
                    var counter = 0;
                    dfdArray[counter++] = Utils.headerScreenModel().startPage(userInfo);
                    dfdArray[counter++] = Utils.sidebarScreenModel().startPage(userInfo);
                    dfdArray[counter++] = Utils.controlSidebarScreenModel().startPage(userInfo);
                    dfdArray[counter++] = Utils.modalLoginScreenModel().startPage();
                    $.when.apply($, dfdArray).done(function () {
                        ko.applyBindings(Utils.headerScreenModel(), $("#header-content")[0]);
                        ko.applyBindings(Utils.sidebarScreenModel(), $("#sidebar-content")[0]);
                        ko.applyBindings(Utils.controlSidebarScreenModel(), $("#control-sidebar-content")[0]);
                        ko.applyBindings(Utils.modalLoginScreenModel(), $("#modal-login-content")[0]);
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                Utils.reloadLayoutData = function (userInfo) {
                    Utils.headerScreenModel().userInfo(userInfo);
                    Utils.sidebarScreenModel().userInfo(userInfo);
                    Utils.controlSidebarScreenModel().userInfo(userInfo);
                };
                Utils.getFacebookInfo = function (fbURL) {
                    var dfd = $.Deferred();
                    var data = {
                        fbURL: fbURL
                    };
                    Utils.postData('/get-facebook-user-info', data).done(function (result) {
                        if (result.success) {
                            result.message[0].fbname = Utils.decodeUTF8(result.message[0].fbname);
                        }
                        dfd.resolve(result);
                    }).fail(function (result) {
                        dfd.resolve();
                    });
                    return dfd.promise();
                };
                Utils.decodeUTF8 = function (string) {
                    var r = /\\u([\d\w]{4})/gi;
                    var x = string.replace(r, function (match, grp) {
                        return String.fromCharCode(parseInt(grp, 16));
                    });
                    return x;
                };
                Utils.unexpectedError = function () {
                    swal('ERROR', 'Lỗi không xác định, vui lòng liên hệ quản trị viên', "error" /* ERROR */);
                };
                return Utils;
            }());
            vipfbnow.Utils = Utils;
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
