/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts/" />

module com.sabrac.vipfbnow {

    export class Utils {
        self: any;

        constructor() {
            this.self = this;
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
    }

    export const enum SweetAlertType {
        WARNING = "warning",
        ERROR = "error",
        SUCCESS = "success",
        INFO = "info"
    }
}