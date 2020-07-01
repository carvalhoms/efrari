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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/site.js":
/*!******************************!*\
  !*** ./resources/js/site.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $("#owl-products").owlCarousel({
    items: 3,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    dots: true
  });
}); // Javascript

function ajax(config) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', config.url, true);

  xhr.onload = function (e) {
    if (xhr.status === 200) {
      config.sucesso(xhr.response);
    } else if (xhr.status >= 400) {
      config.erro({
        codigo: xhr.status,
        texto: xhr.statusText
      });
    }
  };

  xhr.send();
}

function getEstado(onclick) {
  var ufId = onclick.id;
  var ulRepre = document.querySelector('#represList');
  ulRepre.innerHTML = '';
  ajax({
    url: 'getRepresentantes/' + ufId,
    sucesso: function sucesso(response) {
      var data = JSON.parse(response);
      listaRepre(data);
    },
    erro: function erro(e) {
      alert('Errooooou!');
    }
  });
}

function listaRepre(data) {
  var repres = data.map(function (repre) {
    var liRepre = document.createElement('li');
    liRepre.innerHTML = '<div>';
    liRepre.innerHTML += '<p>' + repre.empresa + '</p>';
    liRepre.innerHTML += '<p>' + repre.contato + '</p>';
    liRepre.innerHTML += '<p>' + repre.fone + '</p>';
    liRepre.innerHTML += '<p>' + repre.email + '</p>';
    liRepre.innerHTML += '<p>' + repre.uf + '</p>';
    liRepre.innerHTML += '<p>' + repre.cidade + '</p>';
    liRepre.innerHTML += '<div>';
    liRepre.innerHTML += '<hr>';
    return liRepre;
  });
  var ulRepre = document.querySelector('#represList');
  repres.forEach(function (repre) {
    return ulRepre.appendChild(repre);
  });
}

/***/ }),

/***/ 2:
/*!************************************!*\
  !*** multi ./resources/js/site.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Volumes/Developer/Dev/efrari/resources/js/site.js */"./resources/js/site.js");


/***/ })

/******/ });