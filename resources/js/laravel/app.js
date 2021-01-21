/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('es6-promise').polyfill();

import DateComponent from './components/date.vue';
import FlatPickrComponent from 'vue-flatpickr-component';
import TelComponent from './components/Tel.vue';
import EmailComponent from './components/Email.vue';
import DateTimeComponent from './components/DateTime.vue';
import ModalComponent from './components/Modal.vue';
import Select2Component from './components/select2.vue';


import Lang from 'lang.js';
import messages from '../../../public/messages';
import {Ziggy} from '../ziggy.js';
import route from '../../../vendor/tightenco/ziggy/dist/js/route';


window.Lang = new Lang({
    messages: messages,
});


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.mixin({
    methods: {
        route: window.route
    }
});

Vue.component('flatPickr', FlatPickrComponent);
Vue.component('tel', TelComponent);
Vue.component('email', EmailComponent);
Vue.component('DateTime', DateTimeComponent);
Vue.component('date', DateComponent);
Vue.component('modal', ModalComponent);
Vue.component('v-select', Select2Component);

Vue.filter('trans', (...args) => {
    return window.Lang.get(...args);
});

Vue.filter('formatDateTime', function(value) {
  if (value) {
    return moment(String(value)).format('DD/MM/YYYY HH:mm')
  }
});

Vue.filter('formatDate', function(value) {
  if (value) {
    return moment(String(value)).format('DD/MM/YYYY')
  }
});

Vue.filter('formatHumanDate', function(value) {
  if (value) {
    return moment(String(value)).fromNow();
  }
});

Vue.filter('trim', function(value) {
  return value.trim();
});

Vue.filter('nl2br', function(value) {
  return value.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1<br/>$2');
});

window.sweetAjax = function(options,callback,callbackError){
    if(!options.url){
        console.error('sweetAjax : Url manquante');
        return false;
    }

    let defaultOptions = {
        type:'get',
        loader:true,
        dataType:'json',
        beforeSend:function () {
            activeLoader();
        },
        success:function(res){
            if(res.success){
                if(callback){
                    callback.call(this,res.data);
                }
            }else{
                swal({
                    title: 'Erreur!',
                    text: res.message,
                    type: 'error',
                    confirmButtonText: 'Ok',
                    timer:4000
                });
            }
        },
        error:function(info){
            errorResponse(info,callbackError);
        },
        complete:function(){
            closeLoader();
        }
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let ajaxOptions = {
        type:options.type,
        headers: {'X-Requested-With': 'XMLHttpRequest' },
        url:options.url,
        data:options.data,
        beforeSend:options.beforeSend?options.beforeSend:(options.loader === false?function(){}:defaultOptions.beforeSend),
        dataType:options.dataType?options.DataType:defaultOptions.dataType,
        success:options.success?options.success:defaultOptions.success,
        error:options.error?options.error:defaultOptions.error,
        complete:options.complete?options.complete:defaultOptions.complete,

    };

    if(options.enctype){
        ajaxOptions.enctype = options.enctype;
    }
    if(typeof(options.processData)!= 'undefined'){
        ajaxOptions.processData = options.processData;
    }
    if(typeof(options.contentType)!= 'undefined'){
        ajaxOptions.contentType = options.contentType;
    }

    if(options.confirm){
        let defaultText = "Vous ne pourrez pas revenir en arrière!";
        if(typeof(options.confirm) == 'string'){
            defaultText = options.confirm;
        }
        swal({
            title: 'Etes vous sûr?',
            text: defaultText,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui',
            cancelButtonText:'Annuler'
        }).then((result) => {
            if (result.value) {
                $.ajax(ajaxOptions);
            }
        })
    }else{
        $.ajax(ajaxOptions);
    }
};

function errorResponse(info,callbackError){
    let swalTimer = 4000;
    switch(info.status) {
        case 422:
            // Form errors
            swal({
                title: 'Oups !',
                text: "Vous avez dû faire une erreur !",
                type: 'error',
                confirmButtonText: 'Ok',
                timer:swalTimer
            });
            if(callbackError){
                callbackError.call(this,info.responseJSON);
            }
            break;
        case 401:
            swal({
                title: 'Erreur !',
                text: "Un monstrelio nous informe que vous n'êtes pas autorisé à effectuer cette action sans être connecté, veuillez contacter votre administrateur réseau !",
                type: 'error',
                confirmButtonText: 'Ok',
                timer:swalTimer
            });
            break;
        case 403:
            swal({
                title: 'Erreur !',
                text: "Un monstrelio nous informe que vous n'êtes pas autorisé à effectuer cette action, veuillez contacter votre administrateur réseau !",
                type: 'error',
                confirmButtonText: 'Ok',
                timer:swalTimer
            });
            break;
        case 404:
            swal({
                title: 'Erreur !',
                text: "Notre monstrelio a beau chercher, cette action n\'est pas connue, veuillez contactez votre administrateur réseau !",
                type: 'error',
                confirmButtonText: 'Ok',
                timer:swalTimer
            });
            break;
        case 500:
            swal({
                title: 'Erreur !',
                text: "Un monstrelio a mangé le serveur ce qui a provoqué une erreur, veuillez contactez votre administrateur réseau !",
                type: 'error',
                confirmButtonText: 'Ok',
                timer:swalTimer
            });
            break;
        case 503:
            swal({
                title: 'Erreur !',
                text: "Un monstrelio a déplacé le serveur, le serveur est indisponible, veuillez contactez votre administrateur réseau !",
                type: 'error',
                confirmButtonText: 'Ok',
                timer:swalTimer
            });
            break;
        case 504:
            swal({
                title: 'Erreur !',
                text: "Apparemment l'attente du monstrelio est beaucoup trop longue, veuillez contactez votre administrateur réseau !",
                type: 'error',
                confirmButtonText: 'Ok',
                timer:swalTimer
            });
            break;
        default:
            swal({
                title: 'Erreur !',
                text: "Une erreur est survenue, un monstrelio est sur le coup... veuillez vérifier votre connection internet et recommencer !",
                type: 'error',
                confirmButtonText: 'Ok',
                timer:swalTimer
            });
    }
}
function activeLoader(){
    console.log('loaderOn');
}

function closeLoader(){
    console.log('loaderOff');
}