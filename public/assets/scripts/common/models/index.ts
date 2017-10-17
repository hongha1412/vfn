/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../utils/index.ts" />

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
            self.avt = "";
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

    export class PackageObject {
        id: number;
        value: number;

        constructor(id: number, value: number) {
            var self = this;
            self.id = id;
            self.value = value;
        }
    }

    export class StoreVip {
        fbId: string;
        fbName: string;
        package: number;
        speed: number;
        dayPackage: number;
        note: string;
        expireDate: string;

        constructor() {
            var self = this;
            self.fbId = '';
            self.fbName = '';
            self.package = 1;
            self.speed = 1;
            self.dayPackage = 1;
            self.note = '';
            self.expireDate = '';
        }
    }
}