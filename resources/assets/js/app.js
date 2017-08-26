
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Dropzone = require('./dropzone');

Dropzone.autoDiscover = false;

//require('./dropzone-cropper.js')
//
var myDropzone = new Dropzone("#dropzone-container", {
    addRemoveLinks: true,
    uploadMultiple: false,
    init: function () {
        this.on('success', function (file) {
        });
    }
});
//
