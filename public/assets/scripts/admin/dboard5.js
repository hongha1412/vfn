/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(1);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#dashboard',

    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        itemsAccount: [],
        paginationAccount: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsVipLike: [],
        paginationVipLike: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsVipCmt: [],
        paginationVipCmt: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsVipShare: [],
        paginationVipShare: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsCamXuc: [],
        paginationCamXuc: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsLogCard: [],
        paginationLogCard: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        offset: 4,

        formDelete: { 'action': '', 'id': '' },
        formErrors: {},
        itemAccount: { 'vnd': '', 'toida': '' },
        fillItemAccount: { 'vnd': '', 'toida': '', 'id': '' },
        fillItemVipLike: { 'idfb': '', 'fbname': '', 'package': '', 'time': '', 'id': '' }
    },

    computed: {
        isActived: function isActived() {
            return this.pagination.current_page;
        },
        pagesNumber: function pagesNumber() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedAccount: function isActivedAccount() {
            return this.paginationAccount.current_page;
        },
        pagesNumberAccount: function pagesNumberAccount() {
            if (!this.paginationAccount.to) {
                return [];
            }
            var from = this.paginationAccount.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.paginationAccount.last_page) {
                to = this.paginationAccount.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedVipLike: function isActivedVipLike() {
            return this.paginationVipLike.current_page;
        },
        pagesNumberVipLike: function pagesNumberVipLike() {
            if (!this.paginationVipLike.to) {
                return [];
            }
            var from = this.paginationVipLike.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.paginationVipLike.last_page) {
                to = this.paginationVipLike.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedVipCmt: function isActivedVipCmt() {
            return this.paginationVipCmt.current_page;
        },
        pagesNumberVipCmt: function pagesNumberVipCmt() {
            if (!this.paginationVipCmt.to) {
                return [];
            }
            var from = this.paginationVipCmt.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.paginationVipCmt.last_page) {
                to = this.paginationVipCmt.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedVipShare: function isActivedVipShare() {
            return this.paginationVipShare.current_page;
        },
        pagesNumberVipShare: function pagesNumberVipShare() {
            if (!this.paginationVipShare.to) {
                return [];
            }
            var from = this.paginationVipShare.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.paginationVipShare.last_page) {
                to = this.paginationVipShare.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedCamXuc: function isActivedCamXuc() {
            return this.paginationCamXuc.current_page;
        },
        pagesNumberCamXuc: function pagesNumberCamXuc() {
            if (!this.paginationCamXuc.to) {
                return [];
            }
            var from = this.paginationCamXuc.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.paginationCamXuc.last_page) {
                to = this.paginationCamXuc.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedLogCard: function isActivedLogCard() {
            return this.paginationLogCard.current_page;
        },
        pagesNumberLogCard: function pagesNumberLogCard() {
            if (!this.paginationLogCard.to) {
                return [];
            }
            var from = this.paginationLogCard.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.paginationLogCard.last_page) {
                to = this.paginationLogCard.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    ready: function ready() {
        this.getvueAccount(this.paginationAccount.current_page, this.paginationAccount.per_page, "");
        this.getvueviplike(this.paginationVipLike.current_page, this.paginationVipLike.per_page, "");
        this.getvueVipCmt(this.paginationVipCmt.current_page, this.paginationVipCmt.per_page, "");
        this.getvueVipShare(this.paginationVipShare.current_page, this.paginationVipShare.per_page, "");
        this.getvueCamXuc(this.paginationCamXuc.current_page, this.paginationCamXuc.per_page, "");
        this.getvueLogCard(this.paginationLogCard.current_page);
    },

    methods: {
        //////////////////////////////// Danh sach ////////////////////////////////////////
        getvueAccount: function getvueAccount(page, per_page, search_key) {
            var _this = this;

            var path = search_key ? '/api/account?page=' + page + '&perPage=' + per_page + '&' + 'q=' + search_key : '/api/account?page=' + page + '&perPage=' + per_page;
            this.$http.get(path).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this.$set('itemsAccount', $response.data.data);
                    _this.$set('paginationAccount', $response.pagination);
                }
            });
        },

        changePageAccount: function changePageAccount(page, per_page) {
            this.paginationAccount.current_page = page;
            this.paginationAccount.per_page = per_page;
            this.getvueAccount(page, per_page, this.paginationAccount.search_key);
        },

        getvueviplike: function getvueviplike(page, per_page, search_key) {
            var _this2 = this;

            var path = search_key ? '/api/viplike?page=' + page + '&perPage=' + per_page + '&' + 'q=' + search_key : '/api/viplike?page=' + page + '&perPage=' + per_page;
            this.$http.get(path).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this2.$set('itemsVipLike', $response.data.data);
                    _this2.$set('paginationVipLike', $response.pagination);
                }
            });
        },

        changePageVipLike: function changePageVipLike(page, per_page) {
            this.paginationVipLike.current_page = page;
            this.paginationVipLike.per_page = per_page;
            this.getvueviplike(page, per_page, this.paginationVipLike.search_key);
        },

        searchVipLike: function searchVipLike() {
            var page = this.paginationVipLike.current_page - 1;
            var per_page = this.paginationVipLike.per_page;
            var search = this.paginationVipLike.search_key;
            this.getvueviplike(page, per_page, search);
        },
        //////////////////////////////
        getvueVipCmt: function getvueVipCmt(page, per_page, search_key) {
            var _this3 = this;

            var path = search_key ? '/api/vipcmt?page=' + page + '&perPage=' + per_page + '&' + 'q=' + search_key : '/api/vipcmt?page=' + page + '&perPage=' + per_page;
            this.$http.get(path).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this3.$set('itemsVipCmt', $response.data.data);
                    _this3.$set('paginationVipCmt', $response.pagination);
                }
            });
        },

        changePageVipCmt: function changePageVipCmt(page, per_page) {
            this.paginationVipCmt.current_page = page;
            this.paginationVipCmt.per_page = per_page;
            this.getvueVipCmt(page, per_page, this.paginationVipCmt.search_key);
        },

        searchVipCmt: function searchVipCmt() {
            var page = this.paginationVipCmt.current_page - 1;
            var per_page = this.paginationVipCmt.per_page;
            var search = this.paginationVipCmt.search_key;
            this.getvueVipCmt(page, per_page, search);
        },
        //////////////////////////////
        getvueVipShare: function getvueVipShare(page, per_page, search_key) {
            var _this4 = this;

            var path = search_key ? '/api/vipshare?page=' + page + '&perPage=' + per_page + '&' + 'q=' + search_key : '/api/vipshare?page=' + page + '&perPage=' + per_page;
            this.$http.get(path).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this4.$set('itemsVipShare', $response.data.data);
                    _this4.$set('paginationVipShare', $response.pagination);
                }
            });
        },

        changePageVipShare: function changePageVipShare(page, per_page) {
            this.paginationVipShare.current_page = page;
            this.paginationVipShare.per_page = per_page;
            this.getvueVipShare(page, per_page, this.paginationVipShare.search_key);
        },

        searchVipShare: function searchVipShare() {
            var page = this.paginationVipShare.current_page - 1;
            var per_page = this.paginationVipShare.per_page;
            var search = this.paginationVipShare.search_key;
            this.getvueVipShare(page, per_page, search);
        },
        //////////////////////////////

        getvueCamXuc: function getvueCamXuc(page, per_page, search_key) {
            var self = this;
            var path = search_key ? '/api/camxuc?page=' + page + '&perPage=' + per_page + '&' + 'q=' + search_key : '/api/camxuc?page=' + page + '&perPage=' + per_page;
            this.$http.get(path).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    self.$set('itemsCamXuc', $response.data);
                    self.$set('paginationCamXuc', $response.pagination);
                }
            });
        },

        changePageCamXuc: function changePageCamXuc(page, per_page) {
            this.paginationCamXuc.current_page = page;
            this.paginationCamXuc.per_page = per_page;
            this.getvueCamXuc(page, per_page, this.paginationCamXuc.search_key);
        },

        searchCamXuc: function searchCamXuc() {
            var page = this.paginationCamXuc.current_page - 1;
            var per_page = this.paginationCamXuc.per_page;
            var search = this.paginationCamXuc.search_key;
            this.getvueCamXuc(page, per_page, search);
        },
        //////////////////////////////

        getvueLogCard: function getvueLogCard(page) {
            var _this5 = this;

            this.$http.get('/api/logcard?page=' + page).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this5.$set('itemsLogCard', $response.data.data);
                    _this5.$set('paginationLogCard', $response.pagination);
                }
            });
        },

        changePageLogCard: function changePageLogCard(page) {
            this.paginationLogCard.current_page = page;
            this.getvueLogCard(page);
        },

        //////////////////////////////// DELETE ////////////////////////////////////////
        showConfirmDelete: function showConfirmDelete(action, id) {
            this.formDelete.action = action;
            this.formDelete.id = id;
            $("#confirmDeleteModal").modal('show');
        },

        submitDelete: function submitDelete() {
            switch (this.formDelete.action) {
                case "account":
                    this.deleteAccount(this.formDelete.id);
                    break;
                case "viplike":
                    this.deleteVipLike(this.formDelete.id);
                    break;
                case "vipcmt":
                    this.deleteVipCmt(this.formDelete.id);
                    break;
                case "vipshare":
                    this.deleteVipShare(this.formDelete.id);
                    break;
                case "camxuc":
                    this.deleteCamXuc(this.formDelete.id);
                    break;
            }

            $("#confirmDeleteModal").modal('hide');
        },

        deleteAccount: function deleteAccount(id) {
            var _this6 = this;

            this.$http.delete('/api/account/' + id).then(function (response) {
                _this6.changePageAccount(_this6.paginationAccount.current_page, _this6.paginationAccount.per_page);
                toastr.success('Xóa Tài Khoản Thành Công!', 'Success Alert', { timeOut: 5000 });
            });
        },

        deleteVipLike: function deleteVipLike(id) {
            var _this7 = this;

            this.$http.delete('/api/viplike/' + id).then(function (response) {
                _this7.changePageVipLike(_this7.paginationVipLike.current_page, _this7.paginationVipLike.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', { timeOut: 5000 });
            });
        },

        deleteVipCmt: function deleteVipCmt(id) {
            var _this8 = this;

            this.$http.delete('/api/vipcmt/' + id).then(function (response) {
                _this8.changePageVipCmt(_this8.paginationVipCmt.current_page, _this8.paginationVipCmt.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', { timeOut: 5000 });
            });
        },

        deleteVipShare: function deleteVipShare(id) {
            var _this9 = this;

            this.$http.delete('/api/vipshare/' + id).then(function (response) {
                _this9.changePageVipShare(_this9.paginationVipShare.current_page, _this9.paginationVipShare.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', { timeOut: 5000 });
            });
        },

        deleteCamXuc: function deleteCamXuc(id) {
            var _this10 = this;

            this.$http.delete('/api/camxuc/' + id).then(function (response) {
                _this10.changePageCamXuc(_this10.paginationCamXuc.current_page, _this10.paginationCamXuc.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', { timeOut: 5000 });
            });
        },

        //////////////////////////////// Edit ////////////////////////////////////////
        // Account
        congTien: function congTien(item) {
            this.fillItemAccount.id = item.id;
            $("#congtienModal").modal('show');
        },

        updateCongTien: function updateCongTien(id) {
            var _this11 = this;

            var input = this.fillItemAccount;
            this.$http.put('/api/account/congtien/' + id, input).then(function (response) {
                _this11.changePageAccount(_this11.paginationAccount.current_page, _this11.paginationAccount.per_page);
                _this11.fillItemAccount = { 'vnd': '', 'toida': '', 'id': '' };
                $("#congtienModal").modal('hide');
                toastr.success('Cộng tiền vào tài khoản thành công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this11.formErrors = $response;
                }
            });
        },

        themId: function themId(item) {
            this.fillItemAccount.id = item.id;
            $("#themIdModal").modal('show');
        },

        updateToiDa: function updateToiDa(id) {
            var _this12 = this;

            var input = this.fillItemAccount;
            this.$http.put('/api/account/themid/' + id, input).then(function (response) {
                _this12.changePageAccount(_this12.paginationAccount.current_page, _this12.paginationAccount.per_page);
                _this12.fillItemAccount = { 'vnd': '', 'toida': '', 'id': '' };
                $("#themIdModal").modal('hide');
                toastr.success('Thêm id vào Tài Khoản Thành Công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this12.formErrors = $response;
                }
            });
        },

        // Vip like
        editVipLike: function editVipLike(item) {
            this.fillItemVipLike.id = item.id;
            this.fillItemVipLike.idfb = item.idfb;
            this.fillItemVipLike.fbname = item.fbname;
            this.fillItemVipLike.package = item.package;
            this.fillItemVipLike.time = item.expiretime;
            $("#editVipLikeModal").modal('show');
        },
        updateVipLike: function updateVipLike(id) {
            var _this13 = this;

            var input = this.fillItemVipLike;
            this.$http.put('/api/viplike/' + id, input).then(function (response) {
                _this13.changePageVipLike(_this13.paginationVipLike.current_page, _this13.paginationVipLike.per_page);
                _this13.fillItemVipLike = { 'idfb': '', 'fbname': '', 'package': '', 'time': '', 'id': '' };
                $("#editVipLikeModal").modal('hide');
                toastr.success('Chỉnh Sửa Cập Nhật Tài Khoản Thành Công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this13.formErrors = $response;
                }
            });
        }
        // Vip cmt

        // Vip share

        // Cam xuc

        //////////////////////////////// Add /////////////////////////////////////////
    },

    filters: {
        formatPrice: function formatPrice(value) {
            if (!value) {
                return "0";
            }
            var val = (value / 1).toFixed(0).replace('.', ',');
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        formatDate: function formatDate(value) {
            if (!value) {
                return "";
            }
            var date = new Date(value);
            var curr_date = date.getDate();
            var curr_month = date.getMonth() + 1; //Months are zero based
            var curr_year = date.getFullYear();
            var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
            var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
            var second = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
            return curr_date + "/" + curr_month + "/" + curr_year + " " + hours + ":" + minutes + ":" + second;
        },
        formatTelco: function formatTelco(value) {
            if (!value) {
                return "";
            }
            switch (value) {
                case "VTT":
                    return "Viettel";
                case "VNP":
                    return "Vinaphone";
                case "VMS":
                    return "Mobifone";
                case "VNM":
                    return "Vietnamobile";
                default:
                    return "";
            }
            return "";
        }
    }
});

/***/ })
/******/ ]);