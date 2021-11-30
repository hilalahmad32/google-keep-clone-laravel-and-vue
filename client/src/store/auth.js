import axios from "axios"
import router from "../router";

export default ({
  namespaced: true,
  state: {
    token: localStorage.getItem('token') || "",
    users: [],
  },
  getters: {
    token: (state) => {
      return state.token;
    },
    users: (state) => {
      return state.users
    }
  },
  mutations: {
    setUsers(state, users) {
      state.users = users;
    }
  },
  actions: {
    async sendRegistration(_, data) {
      const config = {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      }
      const response = await axios.post('http://127.0.0.1:8000/api/create', data, config);
      console.log(response)
      if (response.data.exist) {
        alert('Email already Exist');
      } else if (response.data.success) {
        alert('Registration succesfully now Login');
        router.push('/login');
      } else {
        alert('Something Woring');
      }
    },

    async sendLogin(_, data) {
      const response = await axios.post('http://127.0.0.1:8000/api/login', data);
      if (response.data.success) {
        // commit("token",response.data.token);
        localStorage.setItem("token", response.data.token);
        alert("Logiin Successfully");
        router.push('/notes');
      } else {
        alert("Invalid email and password");
      }
    },

    async getUsers({ commit }) {
      const config = {
        headers: {
          "Authorization": "Bearer " + localStorage.getItem("token"),
        }
      }
      const response = await axios.get('http://127.0.0.1:8000/api/users', config);
      commit('setUsers', response.data.users)
    },

    async sendLogout({ commit }) {
      const config = {
        headers: {
          "Authorization": "Bearer " + localStorage.getItem("token"),
        }
      }
      const response = await axios.get('http://127.0.0.1:8000/api/logout', config);
      localStorage.removeItem('token');
      commit('setUsers', "")
      if (response.data.success) {
        alert('logout successfully');
        router.push("/login");
      }
    }
  },
})
