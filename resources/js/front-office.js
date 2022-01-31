
// IMPORT DEPENDENCIES 
import Vue from 'vue';
import App from './views/App.vue';

// INIT VUE INSTANS
const root = new Vue({
	el:'#root',
	render: h => h(App),

})