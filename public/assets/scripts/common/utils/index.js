/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts/" />
var com;
(function (com) {
    var sabrac;
    (function (sabrac) {
        var vipfbnow;
        (function (vipfbnow) {
            var Utils = (function () {
                function Utils() {
                    this.self = this;
                }
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
                return Utils;
            }());
            vipfbnow.Utils = Utils;
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
