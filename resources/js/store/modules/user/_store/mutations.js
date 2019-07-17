
export default {
  ADD_USER:     (state, user) => state.users.unshift(user),
  USER_ID:      (state, id) => (state.user_id = id),
  ALL_USERS:    (state, users) => (state.users = users),
  DELETE_USER:  (state, id) => state.users = state.users.filter(user => user.id !== id),
  UPDATE_USER: (state, upUser) => {
    const index = state.users.findIndex(user => user.id === upUser.id);
    if(index !== -1) {
      state.users.splice(index, 1, upUser);
    }
  },

  ALL_ROLES:    (state, roles) => (state.roles = roles),
}