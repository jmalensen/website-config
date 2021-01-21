//Support vuerouter
import VueRouter from 'vue-router';
//Support vuex
import Vuex from 'vuex';
import {routes} from './routes';
import mainappuserconf from './components/registrationstep/MainAppUserConf.vue';
import storeData from './store';

// Step by step
import recapaside from './components/registrationstep/RecapAside.vue';
import ariane from './components/registrationstep/Ariane.vue';
import inputformgroup from './components/inputformgroup.vue';
import checkboxcustom from './components/checkboxcustom.vue';

import { mapGetters } from 'vuex';

import intlTelInput from 'intl-tel-input';

window.intlTelInput = intlTelInput;
window.intlTelInputGlobals.defaults.nationalMode = false;
window.intlTelInputGlobals.defaults.autoPlaceholder = 'off';
window.intlTelInputGlobals.defaults.formatOnDisplay = true;
window.intlTelInputGlobals.defaults.preferredCountries = ['fr', 'lu', 'be', 'de'];
window.intlTelInputGlobals.defaults.utilsScript = require('intl-tel-input/build/js/utils');
window.formatIntlTelInput = function(e) {
    let iti = window.intlTelInputGlobals.getInstance(e.target)
    if (typeof intlTelInputUtils !== 'undefined') { // utils are lazy loaded, so must check
        let currentText = iti.getNumber(intlTelInputUtils.numberFormat.E164);
        if (typeof currentText === 'string') { // sometimes the currentText is an object :)
            iti.setNumber(currentText); // will autoformat because of formatOnDisplay=true
        }
    }
};


Vue.use(VueRouter);
Vue.use(Vuex);

Vue.mixin({
    computed:{
        ...mapGetters({
            isLoggedIn: 'isLoggedIn',
            currentUser: 'getUser',
            welcome: 'welcome',
            stepNb: 'getStep',
            currentDataCompany: 'getCurrentDataCompany',
            currentDataEkoUsage: 'getCurrentDataEkoUsage',
        })
    },
    methods: {
        isValueExist: function(value){
            if( typeof(value) != 'undefined'
                && value != null ){
                return true;
            } else{
                return false;
            }
        }
    }
});

//Step by step
Vue.component('recapaside', recapaside);
Vue.component('ariane', ariane);
Vue.component('inputformgroup', inputformgroup);
Vue.component('checkboxcustom', checkboxcustom);

const store = new Vuex.Store(
    storeData
);

const router = new VueRouter({
    routes,
    mode: 'history'
});

// L'application
const vm = new Vue({
    el: '#mystepvuejs',
    store, //for vuex
    router, //for vuerouter
    components: {
        mainappuserconf
    },
    data: {
        step: 0,
    },
});