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
/******/ 	return __webpack_require__(__webpack_require__.s = 14);
/******/ })
/************************************************************************/
/******/ ({

/***/ 14:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(15);


/***/ }),

/***/ 15:
/***/ (function(module, exports) {

Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#fbtoken',
    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search: ""
        },
        offset: 4,
        selected: [],
        fillItem: { 'token': '', 'ten': '', 'idfb': '', 'id': '' },
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
        },
        selectAll: {
            get: function get() {
                if (!this.selected || this.selected.length == 0) {
                    return false;
                }
                return this.items ? this.selected.length == this.items.length : false;
            },
            set: function set(value) {
                var selected = [];

                if (value) {
                    this.items.forEach(function (item) {
                        selected.push(item.id);
                    });
                }

                this.selected = selected;
            }
        }
    },
    ready: function ready() {
        this.gettokenList(this.pagination.current_page, this.pagination.per_page);
    },
    methods: {
        gettokenList: function gettokenList(page, per_page) {
            var _this = this;

            this.$http.get('/api/token?page=' + page + '&perPage=' + per_page).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this.$set('items', $response.data.data);
                    _this.$set('pagination', $response.pagination);
                }
            });
        },
        search: function search() {
            var _this2 = this;

            var page = this.pagination.current_page - 1;
            var per_page = this.pagination.per_page;
            var search = this.pagination.search;
            this.$http.get('/api/token?page=' + page + '&perPage=' + per_page + '&q=' + search).then(function (response) {
                if (response) {
                    var $response = JSON.parse(response.data);
                    _this2.$set('items', $response.data.data);
                    _this2.$set('pagination', $response.pagination);
                }
            });
        },
        changePage: function changePage(page, per_page) {
            this.pagination.current_page = page;
            this.pagination.per_page = per_page;
            this.selected = [];
            this.gettokenList(page, per_page);
        },
        submit: function submit(id) {
            if (!id) {
                this.posttoken();
            } else {
                this.update(id);
            }
        },
        posttoken: function posttoken() {
            var _this3 = this;

            var input = this.fillItem;
            this.$http.post('/api/token', input).then(function (response) {
                _this3.gettokenList(_this3.pagination.current_page, _this3.pagination.per_page);
                _this3.fillItem = { 'token': '', 'ten': '', 'idfb': '', 'id': '' };
                toastr.success('Tạo token thành công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this3.formErrors = $response;
                }
            });
        },
        edit: function edit(item) {
            this.fillItem.id = item.id;
            this.fillItem.total = item.total;
            this.fillItem.type = item.type;
        },
        update: function update(id) {
            var _this4 = this;

            var input = this.fillItem;
            this.$http.put('/api/token/' + id, input).then(function (response) {
                _this4.gettokenList(_this4.pagination.current_page, _this4.pagination.per_page);
                _this4.fillItem = { 'token': '', 'ten': '', 'idfb': '', 'id': '' };
                toastr.success('Chỉnh Sửa Thành Công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this4.formErrors = $response;
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
        showConfirmDeleteAll: function showConfirmDeleteAll() {
            if (!this.selected || this.selected.length == 0) {
                toastr.error("Chưa chọn token nào!", 'Faild Alert', { timeOut: 5000 });
                return;
            }
            $("#confirmDeleteMultipleModal").modal('show');
        },
        submitDeleteAll: function submitDeleteAll() {
            var self = this;
            self.removeMultiple(this.selected).done(function (error) {
                if (!error) {
                    self.selected = [];
                }
            });
            $("#confirmDeleteMultipleModal").modal('hide');
        },
        remove: function remove($id) {
            var _this5 = this;

            this.$http.delete('/api/token/' + $id).then(function (response) {
                _this5.gettokenList(_this5.pagination.current_page, _this5.pagination.per_page);
                _this5.fillItem = { 'token': '', 'ten': '', 'idfb': '', 'id': '' };

                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    if ($response.error) {
                        toastr.error($response.message, 'Faild Alert', { timeOut: 5000 });
                    } else {
                        toastr.success($response.message, 'Success Alert', { timeOut: 5000 });
                    }
                }
            });
        },
        removeMultiple: function removeMultiple(selected) {
            var _this6 = this;

            var dfd = $.Deferred();
            var ids = { 'ids': selected };
            this.$http.post('/api/token/removemultiple', ids).then(function (response) {
                _this6.gettokenList(_this6.pagination.current_page, _this6.pagination.per_page);
                _this6.fillItem = { 'token': '', 'ten': '', 'idfb': '', 'id': '' };

                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    if ($response.error) {
                        toastr.error($response.message, 'Faild Alert', { timeOut: 5000 });
                    } else {
                        toastr.success($response.message, 'Success Alert', { timeOut: 5000 });
                    }
                }

                dfd.resolve($response.error);
            }, function (response) {
                dfd.reject();
            });

            return dfd.promise();
        }
    }
});

/***/ })

/******/ });