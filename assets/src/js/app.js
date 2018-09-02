import axios from 'axios'
import Vue from 'vue'
import VueCookies from 'vue-cookies'
import Paginate from 'vuejs-paginate'
import VueMq from 'vue-mq'
import SocialSharing from 'vue-social-sharing'

Vue.use(axios);
Vue.use(VueCookies)
Vue.use(require('vue-moment'))
Vue.use(VueMq, {
  breakpoints: {
    mobile: 600,
    tablet: 768,
    desktop: Infinity,
  }
})
Vue.use(SocialSharing)

Vue.component('paginate', Paginate)

// Vue JS components
import Categories from './components/Categories'
import Persona from './components/Persona'
import ServicesShortlist from './components/ServicesShortlist'
import ServiceHeader from './components/ServiceHeader'
import ServiceMain from './components/ServiceMain'
import OrganisationHeader from './components/OrganisationHeader'
import OrganisationMain from './components/OrganisationMain'
import Referral from './components/Referral'
import SocialShare from './components/SocialShare'

// Vue JS Components - Search
import SearchHome from './components/SearchHome'
import Search from './components/Search'

// Site modules
import { Accordion } from "./modules/accordion.js"
import { Navigation } from "./modules/navigation.js"
import { ScrollToAnchor } from "./modules/scrollToAnchor.js"

export class App {

  constructor() {

    let accordion = new Accordion();
    let navigation = new Navigation();
    let scrollToAnchor = new ScrollToAnchor();

    // Init the vue app
    var app = new Vue({
      el: '#app',
      delimiters: ['${', '}'],
      components: {
        Categories,
        Persona,
        ServicesShortlist,
        ServiceHeader,
        ServiceMain,
        OrganisationHeader,
        OrganisationMain,
        Referral,
        SearchHome,
        Search,
        SocialShare
      }
    })

  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());