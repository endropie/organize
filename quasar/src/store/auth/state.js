export default {
  user: null,
  loginCallbacks: [],
  userData: (data) => {
    return {
      id: data.id,
      email: data.email,
      name: data.name,
      roles: data.roleNames
    }
  }
}
