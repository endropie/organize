
<script>
export default {
  name: 'MixRecord',
  props: {
    mode: { type: String, default: 'create' },
    id: Number
  },
  data () {
    return {
      RECORD: {
        api: null,
        params: {
          fields: '*'
        },
        load: (resolve, reject = null) => {
          if (this.mode === 'create') return resolve(this.RECORD.setForm())
          if (this.mode === 'update' || this.mode === 'read') {
            this.$q.loading.show()
            this.$axios.get(`${this.RECORD.api}/${this.$props.id}`, { params: this.RECORD.params })
              .then(response => {
                // console.warn('LOAD RESPONSE', response)
                this.RECORD.data = response.data
                resolve(response.data)
              })
              .catch((error) => {
                if (!reject) this.$q.notify({ type: 'negative', message: `RECORD #${this.$props.id} LOAD FAILED!` })
                reject(error.response || error)
              })
              .finally(() => {
                this.$q.loading.hide()
              })
          }
        },
        setForm: (v = {}) => ({}),
        setErrorResponse ({ ...ErrRes }, form = null) {
          if (ErrRes.status && ErrRes.status === 422) {
            if (this.$validator && ErrRes.data && ErrRes.data.errors) {
              this.$validator.errors.clear()
              const ErrorFields = ErrRes.data.errors
              const scope = form ? { scope: form } : {}

              for (const field in ErrorFields) {
                if (field) {
                  const basefield = Object.assign({ field: field, msg: ErrorFields[field][0] }, scope)
                  this.$validator.errors.add(basefield)
                }
              }
            }
          }
        }
      }
    }
  },
  methods: {
    //
  }
}
</script>
