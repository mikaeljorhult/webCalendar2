!function e(t,n,r){function i(u,c){if(!n[u]){if(!t[u]){var a="function"==typeof require&&require;if(!c&&a)return a(u,!0);if(o)return o(u,!0);var f=new Error("Cannot find module '"+u+"'");throw f.code="MODULE_NOT_FOUND",f}var h=n[u]={exports:{}};t[u][0].call(h.exports,function(e){var n=t[u][1][e];return i(n?n:e)},h,h.exports,e,t,n,r)}return n[u].exports}for(var o="function"==typeof require&&require,u=0;u<r.length;u++)i(r[u]);return i}({1:[function(e,t,n){"use strict";function r(){if(Modernizr.localstorage){var e="true"===localStorage.getItem("hide-past");$("#hide-past").prop("checked",e)}}function i(){var e=[];u.find("input:checked").each(function(t,n){e.push("."+$(n).attr("class"))}),f.hide().filter(e.join(", ")).show()}function o(){a.show(),c.show(),$("#hide-past").prop("checked")===!0?a.filter(".past").hide():a.show(),a.filter(function(){return 0==$(this).find(".event:visible").length}).hide(),c.filter(function(){return 0==$(this).find(".day:visible").length}).hide()}var u,c,a,f,h=$(document);h.on("change","#modules input",function(e){e.preventDefault(),i(),o()}).on("change","#hide-past",function(e){e.preventDefault(),o(),Modernizr.localstorage&&localStorage.setItem("hide-past",$(this).prop("checked"))}),h.ready(function(){u=$("#modules"),u.length>0&&(c=$(".week"),a=$(".day"),f=$(".event"),r(),i(),o())})},{}]},{},[1]);