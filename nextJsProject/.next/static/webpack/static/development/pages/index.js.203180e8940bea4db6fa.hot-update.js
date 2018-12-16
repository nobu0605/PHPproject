webpackHotUpdate("static/development/pages/index.js",{

/***/ "./components/FadeInLogo.js":
/*!**********************************!*\
  !*** ./components/FadeInLogo.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return FadeInLogo; });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var velocity_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! velocity-react */ "./node_modules/velocity-react/index.js");
/* harmony import */ var velocity_react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(velocity_react__WEBPACK_IMPORTED_MODULE_1__);
var _jsxFileName = "/Applications/XAMPP/xamppfiles/htdocs/portfolio/nextJsProject/components/FadeInLogo.js";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }




var FadeInLogo =
/*#__PURE__*/
function (_React$Component) {
  _inherits(FadeInLogo, _React$Component);

  function FadeInLogo() {
    var _this;

    _classCallCheck(this, FadeInLogo);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(FadeInLogo).call(this));
    _this.state = {
      children: [react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("img", {
        src: "static/img/nextjs-white-logo.svg",
        style: {
          width: '30%',
          height: '100%'
        },
        __source: {
          fileName: _jsxFileName,
          lineNumber: 10
        },
        __self: this
      }), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("img", {
        src: "static/img/ReactJS.png",
        style: {
          width: '25%',
          height: '80%',
          marginLeft: 60
        },
        __source: {
          fileName: _jsxFileName,
          lineNumber: 14
        },
        __self: this
      })]
    };
    return _this;
  }

  _createClass(FadeInLogo, [{
    key: "render",
    value: function render() {
      return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(velocity_react__WEBPACK_IMPORTED_MODULE_1__["VelocityTransitionGroup"], {
        style: {
          display: 'flex',
          justifyContent: 'center',
          height: 200,
          marginTop: 30
        },
        runOnMount: true,
        enter: {
          animation: 'fadeIn',
          stagger: 100
        },
        leave: {
          animation: 'fadeOut',
          stagger: 100
        },
        __source: {
          fileName: _jsxFileName,
          lineNumber: 23
        },
        __self: this
      }, this.state.children);
    }
  }]);

  return FadeInLogo;
}(react__WEBPACK_IMPORTED_MODULE_0___default.a.Component);



/***/ })

})
//# sourceMappingURL=index.js.203180e8940bea4db6fa.hot-update.js.map