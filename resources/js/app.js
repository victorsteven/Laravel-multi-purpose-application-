
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');
import moment from 'moment';


window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router';
import VueProgressBar from 'vue-progressbar';

import swal from 'sweetalert2';
window.swal = swal;

import Gate from './Gate';
//if we want have access to our Gate any where in our app, we need to use prototyping like this:
Vue.prototype.$gate = new Gate(window.user)

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  window.toast = toast;


const options = {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    thickness: '10px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
  }
  Vue.use(VueProgressBar, options)

// Vue.use(VueProgressBar, {
//     color: 'rgb(143, 255, 199)',
//     failedColor: 'red',
//     height: '3px'
// });




Vue.use(VueRouter);


let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue') },
    { path: '/profile', component: require('./components/Profile.vue') },
    { path: '/users', component: require('./components/Users.vue') },
    { path: '/developer', component: require('./components/Developer.vue') },
    //if the route we are using for could not be found, direct routes to our 404
    { path: '*', component: require('./components/NotFound.vue') }


  ]

  const router = new VueRouter({
      routes,
      mode: 'history' //this guy make the routes look like that are now doing a get request
  });

  Vue.filter('upText', function(text){
    //   return text.toUpperCase();
    //take the first character and make it uppercase
    return text.charAt(0).toUpperCase() + text.slice(1)
  });
  Vue.filter('myDate', function(theDate){
      //because 'moment' is a function, we put the 'theDate' as a parameter instead
      return moment(theDate).format('MMMM Do YYYY');
  })

  Vue.component(
    'not-found',
    require('./components/NotFound.vue')
);

  Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

//this require is coming straight from the composer.json file
Vue.component('pagination', require('laravel-vue-pagination'));


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('example-component', require('./components/ExampleComponent.vue'));

//creating an eventBus, what this does is, when u create a new user, it broadcast an event, that, its listener call the "loadUsers" methods which refetch the data from the database.
//Now, when more than one person need to observe the update of the users table, we will use Pusher, so that other guys can also see the changes on real time
window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router,
    data: {
        search: '',
    }, 
    methods: {
        // searchit(){
        //     // console.log('searching');
        //     Fire.$emit('searching');
        // }
        searchit: _.debounce(() => {
            //  console.log('searching');
             Fire.$emit('searching');
        }, 300),

        printme(){
            window.print();
        }
    }
});
