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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/scripts/particles.settings.js":
/*!****************************************************!*\
  !*** ./resources/js/scripts/particles.settings.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("particlesJS(\"particles-js\", {\n  \"particles\": {\n    \"number\": {\n      \"value\": 20,\n      \"density\": {\n        \"enable\": true,\n        \"value_area\": 800\n      }\n    },\n    \"color\": {\n      \"value\": \"#ffffff\"\n    },\n    \"opacity\": {\n      \"value\": 0.12025590456491421,\n      \"random\": false,\n      \"anim\": {\n        \"enable\": true,\n        \"speed\": 0.9744926547616141,\n        \"opacity_min\": 0.09744926547616141,\n        \"sync\": true\n      }\n    },\n    \"size\": {\n      \"value\": 4.008530152163807,\n      \"random\": false,\n      \"anim\": {\n        \"enable\": false,\n        \"speed\": 17.053621458328248,\n        \"size_min\": 0.1,\n        \"sync\": false\n      }\n    },\n    \"line_linked\": {\n      \"enable\": true,\n      \"distance\": 150,\n      \"color\": \"#ffffff\",\n      \"opacity\": 1,\n      \"width\": 1\n    },\n    \"move\": {\n      \"enable\": true,\n      \"speed\": 1.5,\n      \"direction\": \"none\",\n      \"random\": true,\n      \"straight\": false,\n      \"out_mode\": \"bounce\",\n      \"bounce\": false,\n      \"attract\": {\n        \"enable\": false,\n        \"rotateX\": 600,\n        \"rotateY\": 1200\n      }\n    }\n  },\n  \"interactivity\": {\n    \"detect_on\": \"canvas\",\n    \"events\": {\n      \"onhover\": {\n        \"enable\": false,\n        \"mode\": \"repulse\"\n      },\n      \"onclick\": {\n        \"enable\": true,\n        \"mode\": \"push\"\n      },\n      \"resize\": true\n    },\n    \"modes\": {\n      \"grab\": {\n        \"distance\": 400,\n        \"line_linked\": {\n          \"opacity\": 1\n        }\n      },\n      \"bubble\": {\n        \"distance\": 400,\n        \"size\": 40,\n        \"duration\": 2,\n        \"opacity\": 8,\n        \"speed\": 3\n      },\n      \"repulse\": {\n        \"distance\": 200,\n        \"duration\": 0.4\n      },\n      \"push\": {\n        \"particles_nb\": 4\n      },\n      \"remove\": {\n        \"particles_nb\": 2\n      }\n    }\n  },\n  \"retina_detect\": true\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2NyaXB0cy9wYXJ0aWNsZXMuc2V0dGluZ3MuanM/MTRhMSJdLCJuYW1lcyI6WyJwYXJ0aWNsZXNKUyJdLCJtYXBwaW5ncyI6IkFBQUFBLFdBQVcsQ0FBQyxjQUFELEVBQWlCO0FBQ3hCLGVBQWE7QUFDVCxjQUFVO0FBQUMsZUFBUyxFQUFWO0FBQWMsaUJBQVc7QUFBQyxrQkFBVSxJQUFYO0FBQWlCLHNCQUFjO0FBQS9CO0FBQXpCLEtBREQ7QUFFVCxhQUFTO0FBQUMsZUFBUztBQUFWLEtBRkE7QUFHVCxlQUFXO0FBQ1AsZUFBUyxtQkFERjtBQUVQLGdCQUFVLEtBRkg7QUFHUCxjQUFRO0FBQ0osa0JBQVUsSUFETjtBQUVKLGlCQUFTLGtCQUZMO0FBR0osdUJBQWUsbUJBSFg7QUFJSixnQkFBUTtBQUpKO0FBSEQsS0FIRjtBQWFULFlBQVE7QUFDSixlQUFTLGlCQURMO0FBRUosZ0JBQVUsS0FGTjtBQUdKLGNBQVE7QUFBQyxrQkFBVSxLQUFYO0FBQWtCLGlCQUFTLGtCQUEzQjtBQUErQyxvQkFBWSxHQUEzRDtBQUFnRSxnQkFBUTtBQUF4RTtBQUhKLEtBYkM7QUFrQlQsbUJBQWU7QUFBQyxnQkFBVSxJQUFYO0FBQWlCLGtCQUFZLEdBQTdCO0FBQWtDLGVBQVMsU0FBM0M7QUFBc0QsaUJBQVcsQ0FBakU7QUFBb0UsZUFBUztBQUE3RSxLQWxCTjtBQW1CVCxZQUFRO0FBQ0osZ0JBQVUsSUFETjtBQUVKLGVBQVMsR0FGTDtBQUdKLG1CQUFhLE1BSFQ7QUFJSixnQkFBVSxJQUpOO0FBS0osa0JBQVksS0FMUjtBQU1KLGtCQUFZLFFBTlI7QUFPSixnQkFBVSxLQVBOO0FBUUosaUJBQVc7QUFBQyxrQkFBVSxLQUFYO0FBQWtCLG1CQUFXLEdBQTdCO0FBQWtDLG1CQUFXO0FBQTdDO0FBUlA7QUFuQkMsR0FEVztBQStCeEIsbUJBQWlCO0FBQ2IsaUJBQWEsUUFEQTtBQUViLGNBQVU7QUFDTixpQkFBVztBQUFDLGtCQUFVLEtBQVg7QUFBa0IsZ0JBQVE7QUFBMUIsT0FETDtBQUVOLGlCQUFXO0FBQUMsa0JBQVUsSUFBWDtBQUFpQixnQkFBUTtBQUF6QixPQUZMO0FBR04sZ0JBQVU7QUFISixLQUZHO0FBT2IsYUFBUztBQUNMLGNBQVE7QUFBQyxvQkFBWSxHQUFiO0FBQWtCLHVCQUFlO0FBQUMscUJBQVc7QUFBWjtBQUFqQyxPQURIO0FBRUwsZ0JBQVU7QUFBQyxvQkFBWSxHQUFiO0FBQWtCLGdCQUFRLEVBQTFCO0FBQThCLG9CQUFZLENBQTFDO0FBQTZDLG1CQUFXLENBQXhEO0FBQTJELGlCQUFTO0FBQXBFLE9BRkw7QUFHTCxpQkFBVztBQUFDLG9CQUFZLEdBQWI7QUFBa0Isb0JBQVk7QUFBOUIsT0FITjtBQUlMLGNBQVE7QUFBQyx3QkFBZ0I7QUFBakIsT0FKSDtBQUtMLGdCQUFVO0FBQUMsd0JBQWdCO0FBQWpCO0FBTEw7QUFQSSxHQS9CTztBQThDeEIsbUJBQWlCO0FBOUNPLENBQWpCLENBQVgiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvc2NyaXB0cy9wYXJ0aWNsZXMuc2V0dGluZ3MuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJwYXJ0aWNsZXNKUyhcInBhcnRpY2xlcy1qc1wiLCB7XHJcbiAgICBcInBhcnRpY2xlc1wiOiB7XHJcbiAgICAgICAgXCJudW1iZXJcIjoge1widmFsdWVcIjogMjAsIFwiZGVuc2l0eVwiOiB7XCJlbmFibGVcIjogdHJ1ZSwgXCJ2YWx1ZV9hcmVhXCI6IDgwMH19LFxyXG4gICAgICAgIFwiY29sb3JcIjoge1widmFsdWVcIjogXCIjZmZmZmZmXCJ9LFxyXG4gICAgICAgIFwib3BhY2l0eVwiOiB7XHJcbiAgICAgICAgICAgIFwidmFsdWVcIjogMC4xMjAyNTU5MDQ1NjQ5MTQyMSxcclxuICAgICAgICAgICAgXCJyYW5kb21cIjogZmFsc2UsXHJcbiAgICAgICAgICAgIFwiYW5pbVwiOiB7XHJcbiAgICAgICAgICAgICAgICBcImVuYWJsZVwiOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgXCJzcGVlZFwiOiAwLjk3NDQ5MjY1NDc2MTYxNDEsXHJcbiAgICAgICAgICAgICAgICBcIm9wYWNpdHlfbWluXCI6IDAuMDk3NDQ5MjY1NDc2MTYxNDEsXHJcbiAgICAgICAgICAgICAgICBcInN5bmNcIjogdHJ1ZVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSxcclxuICAgICAgICBcInNpemVcIjoge1xyXG4gICAgICAgICAgICBcInZhbHVlXCI6IDQuMDA4NTMwMTUyMTYzODA3LFxyXG4gICAgICAgICAgICBcInJhbmRvbVwiOiBmYWxzZSxcclxuICAgICAgICAgICAgXCJhbmltXCI6IHtcImVuYWJsZVwiOiBmYWxzZSwgXCJzcGVlZFwiOiAxNy4wNTM2MjE0NTgzMjgyNDgsIFwic2l6ZV9taW5cIjogMC4xLCBcInN5bmNcIjogZmFsc2V9XHJcbiAgICAgICAgfSxcclxuICAgICAgICBcImxpbmVfbGlua2VkXCI6IHtcImVuYWJsZVwiOiB0cnVlLCBcImRpc3RhbmNlXCI6IDE1MCwgXCJjb2xvclwiOiBcIiNmZmZmZmZcIiwgXCJvcGFjaXR5XCI6IDEsIFwid2lkdGhcIjogMX0sXHJcbiAgICAgICAgXCJtb3ZlXCI6IHtcclxuICAgICAgICAgICAgXCJlbmFibGVcIjogdHJ1ZSxcclxuICAgICAgICAgICAgXCJzcGVlZFwiOiAxLjUsXHJcbiAgICAgICAgICAgIFwiZGlyZWN0aW9uXCI6IFwibm9uZVwiLFxyXG4gICAgICAgICAgICBcInJhbmRvbVwiOiB0cnVlLFxyXG4gICAgICAgICAgICBcInN0cmFpZ2h0XCI6IGZhbHNlLFxyXG4gICAgICAgICAgICBcIm91dF9tb2RlXCI6IFwiYm91bmNlXCIsXHJcbiAgICAgICAgICAgIFwiYm91bmNlXCI6IGZhbHNlLFxyXG4gICAgICAgICAgICBcImF0dHJhY3RcIjoge1wiZW5hYmxlXCI6IGZhbHNlLCBcInJvdGF0ZVhcIjogNjAwLCBcInJvdGF0ZVlcIjogMTIwMH1cclxuICAgICAgICB9XHJcbiAgICB9LFxyXG4gICAgXCJpbnRlcmFjdGl2aXR5XCI6IHtcclxuICAgICAgICBcImRldGVjdF9vblwiOiBcImNhbnZhc1wiLFxyXG4gICAgICAgIFwiZXZlbnRzXCI6IHtcclxuICAgICAgICAgICAgXCJvbmhvdmVyXCI6IHtcImVuYWJsZVwiOiBmYWxzZSwgXCJtb2RlXCI6IFwicmVwdWxzZVwifSxcclxuICAgICAgICAgICAgXCJvbmNsaWNrXCI6IHtcImVuYWJsZVwiOiB0cnVlLCBcIm1vZGVcIjogXCJwdXNoXCJ9LFxyXG4gICAgICAgICAgICBcInJlc2l6ZVwiOiB0cnVlXHJcbiAgICAgICAgfSxcclxuICAgICAgICBcIm1vZGVzXCI6IHtcclxuICAgICAgICAgICAgXCJncmFiXCI6IHtcImRpc3RhbmNlXCI6IDQwMCwgXCJsaW5lX2xpbmtlZFwiOiB7XCJvcGFjaXR5XCI6IDF9fSxcclxuICAgICAgICAgICAgXCJidWJibGVcIjoge1wiZGlzdGFuY2VcIjogNDAwLCBcInNpemVcIjogNDAsIFwiZHVyYXRpb25cIjogMiwgXCJvcGFjaXR5XCI6IDgsIFwic3BlZWRcIjogM30sXHJcbiAgICAgICAgICAgIFwicmVwdWxzZVwiOiB7XCJkaXN0YW5jZVwiOiAyMDAsIFwiZHVyYXRpb25cIjogMC40fSxcclxuICAgICAgICAgICAgXCJwdXNoXCI6IHtcInBhcnRpY2xlc19uYlwiOiA0fSxcclxuICAgICAgICAgICAgXCJyZW1vdmVcIjoge1wicGFydGljbGVzX25iXCI6IDJ9XHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuICAgIFwicmV0aW5hX2RldGVjdFwiOiB0cnVlXHJcbn0pO1xyXG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/scripts/particles.settings.js\n");

/***/ }),

/***/ 3:
/*!**********************************************************!*\
  !*** multi ./resources/js/scripts/particles.settings.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\User\Desktop\devhub\resources\js\scripts\particles.settings.js */"./resources/js/scripts/particles.settings.js");


/***/ })

/******/ });