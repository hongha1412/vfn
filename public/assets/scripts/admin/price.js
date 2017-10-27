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
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(11);


/***/ }),

/***/ 11:
/***/ (function(module, exports) {

Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#price',
    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        fillItem: { 'type': '', 'vnd': '', 'package': '', 'daypackage': '', 'id': '' },
        formErrors: {},
        formDelete: { 'action': '', 'id': '' }
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
        }
    },
    ready: function ready() {
        this.getPriceList(this.pagination.current_page, this.pagination.per_page);
        this.getPackageList();
        this.getDayPackageList();
    },
    methods: {
        getPackageList: function getPackageList() {
            var _this = this;

            this.$http.get('/api/allpackage').then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this.$set('itemsPackage', $response);
                }
            });
        },
        getDayPackageList: function getDayPackageList() {
            var _this2 = this;

            this.$http.get('/api/alldaypackage').then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this2.$set('itemsDayPackage', $response);
                }
            });
        },
        getPriceList: function getPriceList(page, per_page) {
            var _this3 = this;

            this.$http.get('/api/price?page=' + page + '&perPage=' + per_page).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this3.$set('items', $response.data.data);
                    _this3.$set('pagination', $response.pagination);
                }
            });
        },
        changePage: function changePage(page, per_page) {
            this.pagination.current_page = page;
            this.pagination.per_page = per_page;
            this.getPriceList(page, per_page);
        },
        submit: function submit(id) {
            if (!id) {
                this.postSpeed();
            } else {
                this.update(id);
            }
        },
        postSpeed: function postSpeed() {
            var _this4 = this;

            var input = this.fillItem;
            this.$http.post('/api/price', input).then(function (response) {
                _this4.getPriceList(_this4.pagination.current_page, _this4.pagination.per_page);
                _this4.fillItem = { 'type': '', 'vnd': '', 'package': '', 'daypackage': '', 'id': '' };
                toastr.success('Tạo thành công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this4.formErrors = $response;
                }
            });
        },
        edit: function edit(item) {
            this.fillItem.id = item.id;
            this.fillItem.vnd = item.vnd;
            this.fillItem.type = item.type;
            this.fillItem.package = item.package;
            this.fillItem.daypackage = item.daypackage;
        },
        update: function update(id) {
            var _this5 = this;

            var input = this.fillItem;
            this.$http.put('/api/price/' + id, input).then(function (response) {
                _this5.getPriceList(_this5.pagination.current_page, _this5.pagination.per_page);
                _this5.fillItem = { 'type': '', 'vnd': '', 'package': '', 'daypackage': '', 'id': '' };
                toastr.success('Chỉnh Sửa Thành Công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this5.formErrors = $response;
                }
            });
        },
        showConfirmDelete: function showConfirmDelete(id) {
            this.formDelete.id = id;
            $("#confirmDeleteModal").modal('show');
        },
        submitDelete: function submitDelete() {
            this.remove(this.formDelete.id);
            $("#confirmDeleteModal").modal('hide');
        },
        remove: function remove($id) {
            var _this6 = this;

            this.$http.delete('/api/price/' + $id).then(function (response) {
                _this6.getPriceList(_this6.pagination.current_page, _this6.pagination.per_page);
                _this6.fillItem = { 'type': '', 'vnd': '', 'package': '', 'daypackage': '', 'id': '' };

                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    if ($response.error) {
                        toastr.error($response.message, 'Faild Alert', { timeOut: 5000 });
                    } else {
                        toastr.success($response.message, 'Success Alert', { timeOut: 5000 });
                    }
                }
            });
        }
    },
    filters: {
        formatType: function formatType(value) {
            var result = value;
            switch (value) {
                case 0:
                    result = "LIKE";
                    break;
                case 1:
                    result = "COMMENT";
                    break;
                case 2:
                    result = "SHARE";
                    break;
                case 3:
                    result = "REACT";
                    break;
                default:
                    result = value;
            }
            return result;
        }
    }
});

/***/ })

/******/ });