import axios from "axios";
import state from "./state";



export default {

  /** Users *******************************************************************************/
  async fetchUsers({ commit }){
    try {
      const response = await axios.get('/api/cpanel/users');
      commit('ALL_USERS', response.data.data);
      commit('ALL_ROLES', response.data.roles);
    } catch (error) {
      commit('ALL_USERS', []);
      console.error(error);
    }
  },

  async addUser({ commit }, payload){
    await axios.post('/api/cpanel/users',payload)
    .then((response) => {
      console.log(response.data)
      commit('ADD_USER', response.data.data);
    })
    .catch((error) => {
      console.log(error)
      commit('ADD_USER', []);
      // commit('SET_ERRORS', error);
    })
  },

  async updateUser({ commit }, upUser) {
    try {
      const response = await axios.put(`/api/cpanel/users/${upUser.id}`, upUser);
      commit('UPDATE_USER', upUser);
    } catch (error) {
      console.error(error);
    }
  },

  async deleteUser({ commit }, id){
    let check = confirm('Are You Sure Do You Want Delete This ?');
    if(check){
      try {
        await axios.delete(`/api/cpanel/users/${id}`);
        commit('DELETE_USER', id);
      } catch (error) {
        commit('DELETE_USER', null);
        console.error(error);
      }
    }
  },

  async filterUsers({ commit }, e){
    const limit = parseInt(e.target.options[e.target.options.selectedIndex].innerText);
    try {
      const response = await axios.get(`/api/cpanel/users?_limit=${limit}`);
      commit('ALL_USERS', response.data);
    } catch (error) {
      console.error(error);
    }
  },

  async fetchByUserID({ commit }){
    try {
      const response = await axios.get('/api/cpanel/classrooms');
      commit('ALL_CLASSROOMS', response.data.data);
    } catch (error) {
      commit('ALL_CLASSROOMS', []);
      console.error(error);
    }
  },


  /** Roles *******************************************************************************/
  // async fetchRoles({ commit }){
  //   try {
  //     const response = await axios.get('/api/cpanel/roles');
  //     console.log(response.data.data);
  //     console.log(response.data.roles);
  //     commit('ALL_ROLES', response.data.data);
  //   } catch (error) {
  //     commit('ALL_ROLES', []);
  //     console.error(error);
  //   }
  // },
}
