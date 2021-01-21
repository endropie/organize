<script>
export default {
  name: 'MixForm',
  data () {
    return {
      FORM: {
        response: {
          error: (error, attr = {}) => {
            if (typeof attr === 'string') attr = { title: attr }
            attr.color = 'negative'
            if (error.response) {
              attr.message = error.response.data.message || error.response.statusText
              switch (error.response.status) {
                case 401:
                  if (attr.message === 'verification_required') {
                    attr.message = this.$t('auth.login.verification_required')
                  }
                  break
                case 403:
                  attr.message = this.$t('auth.login.invalid_credentials')
                  break
              }
              attr.message = `${attr.title}<br><small>${attr.message}</small>`
              attr.html = true
              console.error('[APP] - error response', error)
              this.$q.notify(attr)
            } else {
              console.error('[APP] - error resource', error)
              this.$q.notify('Resource Failed. Please contact administrator!')
            }
          },
          validate: (error) => {
            console.warn('FORM.error', error.response || error)
          }
        }
      }
    }
  }
}
</script>
