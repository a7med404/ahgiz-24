import axios from "axios";

export default {

  /** Reservations *******************************************************************************/
  async fetchReservations({ commit }){
    try {
      const response = await axios.get('/api/cpanel/reservations');
      console.log(response.data.data);
      commit('ALL_RESERVATIONS', response.data.data);
    } catch (error) {
      commit('ALL_RESERVATIONS', []);
      console.error(error);
    }
  },

  async addReservation({ commit }, payload){
    await axios.post('/api/cpanel/reservations',payload)
    .then((response) => {
      console.log(response.data)
      commit('ADD_RESERVATION', response.data.data);
    })
    .catch((error) => {
      console.log(error)
      commit('ADD_RESERVATION', []);
      // commit('SET_ERRORS', error);
    })
  },

  async updateReservation({ commit }, upReservation) {
    try {
      const response = await axios.put(`/api/cpanel/reservations/${upReservation.id}`, upReservation);
      commit('UPDATE_RESERVATION', upReservation);
    } catch (error) {
      console.error(error);
    }
  },

  async deleteReservation({ commit }, id){
    let check = confirm('Are You Sure Do You Want Delete This ?');
    if(check){
      try {
        await axios.delete(`/api/cpanel/reservations/${id}`);
        commit('DELETE_RESERVATION', id);
      } catch (error) {
        commit('DELETE_RESERVATION', null);
        console.error(error);
      }
    }
  },

  async filterReservations({ commit }, e){
    const limit = parseInt(e.target.options[e.target.options.selectedIndex].innerText);
    try {
      const response = await axios.get(`/api/cpanel/reservations?_limit=${limit}`);
      commit('ALL_RESERVATIONS', response.data);
    } catch (error) {
      console.error(error);
    }
  },

  async fetchByReservationID({ commit }){
    try {
      const response = await axios.get('/api/cpanel/classrooms');
      commit('ALL_CLASSROOMS', response.data.data);
    } catch (error) {
      commit('ALL_CLASSROOMS', []);
      console.error(error);
    }
  },

}
