
import auth from 'src/store/auth'

const isArrayOrString = function (variable) {
  if (typeof variable === typeof [] || typeof variable === typeof '') {
    return true
  }
  return false
}
const config = {
  form_register: false
}

export default ({ app, router, store, Vue }) => {
  // Register auth store
  store.registerModule('auth', auth)

  // Set route guard
  router.beforeEach((to, from, next) => {
    const record = to.matched.find(record => record.meta.auth)
    if (record) {
      if (!store.getters['auth/loggedIn']) {
        return store.dispatch('auth/fetch').then((data) => {
          if (!store.getters['auth/loggedIn']) {
            next('/error?code=401')
          } else if (
            isArrayOrString(record.meta.auth) &&
            !store.getters['auth/check'](record.meta.auth)
          ) {
            next('/admin')
          } else {
            next()
          }
        }).catch(() => {
          next('/error?code=401')
        })
      } else if (
        isArrayOrString(record.meta.auth) &&
        !store.getters['auth/check'](record.meta.auth)
      ) {
        return next('/admin')
      }
    }
    next()
  })

  app.mounted = () => {
    store.dispatch('auth/fetch').catch(() => {
      store.dispatch('auth/logout')
    })
  }

  var helper = {
    config
  }
  helper.register = (data) => { return store.dispatch('auth/register', data) }
  helper.login = async (data) => { return store.dispatch('auth/login', data) }
  helper.logout = () => { return store.dispatch('auth/logout') }
  helper.verify = (token) => { return store.dispatch('auth/verify', token) }
  helper.passwordForgot = (data) => { return store.dispatch('auth/passwordForgot', data) }
  helper.passwordReset = (data) => { return store.dispatch('auth/passwordReset', data) }
  helper.loggedIn = () => { return store.getters['auth/loggedIn'] }
  helper.check = (roles) => { return store.getters['auth/check'](roles) }
  helper.setHeader = (data) => { return store.dispatch('auth/setHeader', data) }
  helper.fetch = () => { return store.dispatch('auth/fetch') }
  helper.user = () => { return store.getters['auth/user'] }
  Vue.prototype.$auth = helper

  store.commit('auth/addLoginCallback', () => console.log('Logged in'))
}
