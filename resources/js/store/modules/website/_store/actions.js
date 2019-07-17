import axios from "axios";

export default {

  /** Trips *******************************************************************************/
  async fetchTrips({ commit }){
    try {
      const response = await axios.get('/api/search-post');
      console.log(response.data);
      commit('ALL_TRIPS', response.data);
    } catch (error) {
      commit('ALL_TRIPS', []);
      console.error(error); 
    }
  },
  async getTrip({ commit }, id){
    try {
      const response = await axios.get(`/api/bus-details/${id}`);
      console.log(response.data);
      commit('TRIP', response.data.data);
    } catch (error) {
      commit('TRIP', []);
      console.error(error); 
    }
  },

  async filterTrips({ commit }, e){
    const limit = parseInt(e.target.options[e.target.options.selectedIndex].innerText);
    try {
      const response = await axios.get(`/api/trips?_limit=${limit}`);
      commit('ALL_TRIPS', response.data);
    } catch (error) {
      console.error(error);
    }
  },
  
}
