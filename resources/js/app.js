

require('./bootstrap');

window.Vue = require('vue');





Vue.component('articulos-component', require('./components/Articulos.vue').default);
Vue.component('categorias-component', require('./components/Categorias.vue').default);



const app = new Vue({
    el: '#app',
});
