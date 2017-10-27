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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ 8:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(9);


/***/ }),

/***/ 9:
/***/ (function(module, exports) {

Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#notice',
    data: {
        itemNotice: { 'id': '', 'text': '' },
        formErrors: {}
    },
    computed: {},
    ready: function ready() {
        this.getNotice();
    },
    methods: {
        getNotice: function getNotice() {
            var _this = this;

            this.$http.get('/api/notice').then(function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this.itemNotice.text = $response.text;
                    _this.itemNotice.id = $response.id;
                }
            });
        },
        submitNotice: function submitNotice(id) {
            if (id) {
                this.updateNotice(id);
            } else {
                this.postNotice();
            }
        },
        updateNotice: function updateNotice(id) {
            var _this2 = this;

            var input = this.itemNotice;
            this.$http.put('/api/notice/' + id, input).then(function (response) {
                _this2.getNotice();
                toastr.success('Thay Đổi Thông Báo Thành Công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this2.formErrors = $response;
                }
            });
        },
        postNotice: function postNotice() {
            var _this3 = this;

            var input = this.itemNotice;
            this.$http.post('/api/notice', input).then(function (response) {
                _this3.getNotice();
                toastr.success('Thêm Thông Báo Thành Công!', 'Success Alert', { timeOut: 5000 });
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this3.formErrors = $response;
                }
            });
        }
    },
    filters: {}
});

/***/ })

/******/ });