<template>
  <div class="fullscreen bg-blue text-white text-center q-pa-md flex flex-center">
    <div>
      <div style="font-size: 30vh">
        {{ code || 'ERROR'}}
      </div>

      <div class="text-h2" style="opacity:.4">
        {{options[code] || 'ACCESS DENIED.'}}
      </div>
      <q-btn class="q-mt-xl" color="white" text-color="blue" unelevated label="TEST-LOGIN" no-caps @click="testLogin" />
    </div>
  </div>
</template>

<script>
export default {
  name: 'Error',
  data: () => ({
    code: null,
    options: {
      401: 'Oops. Access Unauthorized.'
    }
  }),
  mounted () {
    if (this.$route.query.code) {
      this.code = Number(this.$route.query.code)
    }
  },
  methods: {
    testLogin () {
      console.warn('TEST LOGIN')
      this.$axios.get('/api/auth/generate-token')
        .then((response) => {
          console.warn('RESPONSE', response)
          this.$q.cookies.set('authorization_token', response.data.token, 365)
        })
        .catch((error) => {
          console.error(error.response || error)
        })
    }
  }
}
</script>
