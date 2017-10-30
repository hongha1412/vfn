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
/******/ 	return __webpack_require__(__webpack_require__.s = 16);
/******/ })
/************************************************************************/
/******/ ({

/***/ 16:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(17);


/***/ }),

/***/ 17:
/***/ (function(module, exports) {

Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#token-check',
    data: {
        fillItem: { 'tokens': '', 'token_die': '', 'token_live': '' },
        totalTokenDie: 0,
        totalTokenLive: 0,
        formErrors: {},
        loading: false
    },
    computed: {},
    ready: function ready() {},
    methods: {
        checktoken: function checktoken() {
            var _this = this;

            this.loading = true;
            var $tokens = this.fillItem.tokens ? this.fillItem.tokens.split(/\n/) : null;
            var dataRequest = {
                "tokens": $tokens
            };
            this.$http.post('/api/token/check', dataRequest).then(function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this.totalTokenDie = $response.token_die.length;
                    _this.totalTokenLive = $response.token_live.length;
                    _this.fillItem.token_die = $response.token_die && $response.token_die.length > 0 ? $response.token_die.join('\n') : "";
                    _this.fillItem.token_live = $response.token_live && $response.token_live.length > 0 ? $response.token_live.join('\n') : "";
                }
                _this.loading = false;
            }, function (response) {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    _this.formErrors = $response;
                }
                _this.loading = false;
            });
        }
    }
});

/***/ })

/******/ });