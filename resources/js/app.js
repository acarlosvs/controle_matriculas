// The following line loads the standalone build of Vue instead of the runtime-only build,
// so you don't have to do: import Vue from 'vue/dist/vue'
// This is done with the browser options. For the config, see package.json

import Vue from 'vue'
import VueResource from 'vue-resource'
import moment from 'moment'
import Mixins from './Mixin.js'
import money from 'v-money'
import Swal from 'sweetalert2'
import VueTheMask from 'vue-the-mask'

window.Inputmask = require('inputmask');

Vue.directive('input-mask', {
    bind: function(el) {
        new Inputmask({
            mask: $(el).attr('mask'),
        }).mask(el);
    },
});

Vue.mixin(Mixins)
Vue.use(VueResource)
Vue.use(money, {precision: 2})

window.moment = moment;

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

import Home from './components/Home.vue'
import FormTurmas from './components/FormTurmas.vue'

new Vue({
    el: '#app',
    components: {
        Home,
        FormTurmas,
    },
})
