import axios from 'axios'
import Vue from 'vue'
import VueCookies from 'vue-cookies'

Vue.use(axios);
Vue.use(VueCookies)
Vue.use(require('vue-moment'))

// Vue JS components
import Categories from './components/Categories'
import Recommendations from './components/Recommendations'
import SearchHome from './components/SearchHome'
import SearchResults from './components/SearchResults'
import ServicesGrid from './components/ServicesGrid'
import ServicesShortlist from './components/ServicesShortlist'
import ServiceHeader from './components/ServiceHeader'
import ServiceMain from './components/ServiceMain'
import OrganisationHeader from './components/OrganisationHeader'
import OrganisationMain from './components/OrganisationMain'

// Site modules,
import { Form } from "./modules/form.js"
import { Map } from "./modules/map.js"
import { Navigation } from "./modules/navigation.js"

export class App {

  constructor() {

    let form = new Form();
    let map = new Map();
    let navigation = new Navigation();

    // Init the vue app
    var app = new Vue({
      el: '#app',
      delimiters: ['${', '}'],
      components: {
        Categories,
        Recommendations,
        SearchHome,
        SearchResults,
        ServicesGrid,
        ServicesShortlist,
        ServiceHeader,
        ServiceMain,
        OrganisationHeader,
        OrganisationMain
      }
    })

  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());