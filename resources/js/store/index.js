import Vuex from 'vuex';
import Vue from 'vue';
Vue.use(Vuex);

// import Sidebar from './modules/dashboard/_store/index';
import AddStudent from './modules/user/_store/index';
import Reservation from './modules/reservations/_store/index';
import website from './modules/website/_store/index';

export default new Vuex.Store ({
  modules: {
    // Sidebar,
    AddStudent, 
    Reservation,
    website
  }
});
