/// <reference path="../../tsdefinition/jquery/index.d.ts" />
/// <reference path="../../tsdefinition/jquery.blockui/index.d.ts" />
/// <reference path="../../tsdefinition/knockout/index.d.ts" />
/// <reference path="../../tsdefinition/toastr/index.d.ts" />
/// <reference path="../../tsdefinition/sweetalert/index.d.ts/" />
/// <reference path="../../common/utils/index.ts" />
/// <reference path="../../common/models/index.ts" />
'use strict';

module com.sabrac.vipfbnow {
    export class HomeScreenModel {
        allDone: KnockoutObservable<boolean>;

        constructor() {
            var self = this;
            self.allDone = ko.observable<boolean>(false);
        }

        setAllDone(status: boolean): void {
            var self = this;
            self.allDone(status);
        }

        startPage(): JQueryPromise<any> {
            var self = this;
            var dfd = $.Deferred();
            dfd.resolve();
            return dfd.promise();
        }
    }

    class DfdStacker {
        dfdArray: Array<any>;

        constructor() {
            var self = this;
            self.dfdArray = [];
        }
    }

    $(document).ready(function() {
        var homeScreenModel = new HomeScreenModel();
        var headerScreenModel = new HeaderScreenModel();
        var modalLoginScreenModel = new ModalLoginScreenModel();
        var dfdArray = [];
        var counter = 0;

        $.blockUI({ overlayCSS: { opacity:1 }, baseZ: 2000 });
        dfdArray[counter++] = homeScreenModel.startPage();
        dfdArray[counter++] = headerScreenModel.startPage();
        dfdArray[counter++] = modalLoginScreenModel.startPage();

        $.when.apply($, dfdArray).done(function() {
            ko.applyBindings(headerScreenModel, $("#header-content")[0]);
            ko.applyBindings(modalLoginScreenModel, $("#modal-login-content")[0]);
            ko.applyBindings(homeScreenModel);
            $.unblockUI();
        });
    });
}