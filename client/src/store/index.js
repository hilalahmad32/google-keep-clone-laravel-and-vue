import Vue from 'vue'
import Vuex from 'vuex'
import auth from './auth';
import notes from './notes';
import bins from './Bins';
import achieve from './achieve';

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    auth,
    notes,
    bins,
    achieve
  }
})
