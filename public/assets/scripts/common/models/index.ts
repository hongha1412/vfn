/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
'use strict';

module com.sabrac.vipfbnow {
    export class UserInfo {
        avt: string;
        fullname: string;
        username: string;
        vnd: number;
        toida: number;
        mail: string;
        sdt: string;

        constructor() {
            var self = this;
            self.avt = "Chưa cập nhật";
            self.fullname = "Chưa cập nhật";
            self.username = "Chưa cập nhật";
            self.vnd = 0;
            self.toida = 0;
            self.mail = "Chưa cập nhật";
            self.sdt = "Chưa cập nhật";
        }

        load(avt: string, fullname: string, username: string, vnd: number, toida: number, mail: string, sdt: string) {
            var self = this;
            self.avt = avt;
            if (fullname) {
                self.fullname = fullname;
            }
            if (username) {
                self.username = username;
            }
            self.vnd = Utils.number_format(vnd, 0, ',', ',');
            self.toida = toida;
            if (mail) {
                self.mail = mail;
            }
            if (sdt) {
                self.sdt = sdt;
            }
        }
    }
}
