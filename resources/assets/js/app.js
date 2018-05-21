
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Dropzone = require('./dropzone');

Dropzone.autoDiscover = false;

window.Cropper = require('cropperjs')

console.log('pos load');

