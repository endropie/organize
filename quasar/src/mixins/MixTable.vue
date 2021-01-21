
<script>
export default {
  name: 'MixTable',
  data () {
    return {
      TABLE: {
        api: null,
        params: [],
        rs: [],
        columns: [],
        pagination: {
          sortBy: null,
          descending: false,
          page: 1,
          rowsPerPage: 10,
          rowsNumber: 0
        },
        rowPageOptions: [10, 20, 25, 50, 100, 250, 500, 'all'],
        request: (request = {}) => {
          const setPage = (r) => {
            this.TABLE.pagination = {
              ...this.TABLE.pagination,
              last: r.data.last_page,
              page: r.data.current_page,
              rowsPerPage: r.data.per_page,
              rowsNumber: r.data.total
            }
          }
          this.TABLE.pagination = Object.assign(this.TABLE.pagination, request.pagination || {})

          this.$q.loading.show()
          this.$axios.get(this.TABLE.api, { params: { ...this.TABLE.params, pagetable: this.TABLE.pagination } })
            .then((response) => {
              setPage(response)
              this.TABLE.rs = []
              response.data.data.map(row => {
                this.TABLE.rs.push(row)
              })
            }).catch((error) => {
              console.error(error.response || error)
            }).finally(() => {
              this.$q.loading.hide()
            })
        }
      }
    }
  }
}
</script>
