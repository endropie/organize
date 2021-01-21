
<script>
export default {
  name: 'MixDialog',
  data () {
    return {
      DIALOG: {
        name: 'dialog',
        hide: this.hide,
        show: this.show
      }
    }
  },
  methods: {
    show () {
      if (this.DIALOG.name) this.$refs[this.DIALOG.name].show()
    },
    hide () {
      if (this.DIALOG.name) this.$refs[this.DIALOG.name].hide()
      this.$nextTick(() => {
        if (this.DIALOG.name) this.DIALOG.name = null
      })
    }
  }
}
</script>
