!function e(t,n,r){function i(u,c){if(!n[u]){if(!t[u]){var a="function"==typeof require&&require;if(!c&&a)return a(u,!0);if(o)return o(u,!0);var f=new Error("Cannot find module '"+u+"'");throw f.code="MODULE_NOT_FOUND",f}var h=n[u]={exports:{}};t[u][0].call(h.exports,function(e){var n=t[u][1][e];return i(n?n:e)},h,h.exports,e,t,n,r)}return n[u].exports}for(var o="function"==typeof require&&require,u=0;u<r.length;u++)i(r[u]);return i}({1:[function(e,t,n){"use strict";!function(e,t,n){function r(){if(Modernizr.localstorage){var t="true"===localStorage.getItem("hide-past");e("#hide-past").prop("checked",t)}}function i(){var t=[];u.find("input:checked").each(function(n,r){t.push("."+e(r).attr("class"))}),f.hide().filter(t.join(", ")).show()}function o(){a.show(),c.show(),e("#hide-past").prop("checked")===!0?a.filter(".past").hide():a.show(),a.filter(function(){return 0==e(this).find(".event:visible").length}).hide(),c.filter(function(){return 0==e(this).find(".day:visible").length}).hide()}var u,c,a,f;t.on("change","#modules input",function(e){e.preventDefault(),i(),o()}).on("change","#hide-past",function(t){t.preventDefault(),o(),Modernizr.localstorage&&localStorage.setItem("hide-past",e(this).prop("checked"))}),t.ready(function(){u=e("#modules"),u.length>0&&(c=e(".week"),a=e(".day"),f=e(".event"),r(),i(),o())})}(jQuery,jQuery(document))},{}]},{},[1]);