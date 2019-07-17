
export default {
  ADD_RESERVATION:     (state, reservation) => state.reservations.unshift(reservation),
  RESERVATION_ID:      (state, id) => (state.reservation_id = id),
  ALL_RESERVATIONS:    (state, reservations) => (state.reservations = reservations),
  DELETE_RESERVATION:  (state, id) => state.reservations = state.reservations.filter(reservation => reservation.id !== id),
  UPDATE_RESERVATION: (state, upReservation) => {
    const index = state.reservations.findIndex(reservation => reservation.id === upReservation.id);
    if(index !== -1) {
      state.reservations.splice(index, 1, upReservation);
    }
  },



}
  