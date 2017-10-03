/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../utils/index.ts" />
var com;
(function (com) {
    var sabrac;
    (function (sabrac) {
        var vipfbnow;
        (function (vipfbnow) {
            var UserInfo = (function () {
                function UserInfo() {
                    var self = this;
                    self.avt = "";
                    self.fullname = "Chưa cập nhật";
                    self.username = "Chưa cập nhật";
                    self.vnd = 0;
                    self.toida = 0;
                    self.mail = "Chưa cập nhật";
                    self.sdt = "Chưa cập nhật";
                }
                UserInfo.prototype.load = function (avt, fullname, username, vnd, toida, mail, sdt) {
                    var self = this;
                    self.avt = avt;
                    if (fullname) {
                        self.fullname = fullname;
                    }
                    if (username) {
                        self.username = username;
                    }
                    self.vnd = vipfbnow.Utils.number_format(vnd, 0, ',', ',');
                    self.toida = toida;
                    if (mail) {
                        self.mail = mail;
                    }
                    if (sdt) {
                        self.sdt = sdt;
                    }
                };
                return UserInfo;
            }());
            vipfbnow.UserInfo = UserInfo;
        })(vipfbnow = sabrac.vipfbnow || (sabrac.vipfbnow = {}));
    })(sabrac = com.sabrac || (com.sabrac = {}));
})(com || (com = {}));
