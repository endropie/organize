<template>
  <q-select
    ref="QSelect"
    v-model="value"
    v-bind="$attrs"
    v-on="$listeners"
    :slot-scope="$slots"
    @filter="filterFunc"
    @input="inputFunction"
    :options="opt"
    :use-input="PROP.useInput"
    :fill-input="PROP.fillInput"
    :hide-selected="PROP.hideSelected"
    :input-debounce="inputDebounce"
    autocomplete="off"
  >
    <template v-for="slot in Object.keys($slots)" v-slot:[slot]>
      <slot :name="slot" />
    </template>
  </q-select>
</template>

<script>
export default {
  name: 'UXSelect',
  inheritAttrs: false,
  props: {
    source: { type: String, default: null },
    sourceKeys: { type: Array, default: () => [] },
    filter: { type: Boolean, default: false },
    filterMin: { default: 0 },
    useInput: { type: Boolean },
    fillInput: { type: Boolean },
    hideSelected: { type: Boolean },
    inputDebounce: { type: Number, default: 600 }
  },
  data () {
    return {
      value: this.$attrs.value,
      options: this.$attrs.options || [],
      isFilterSkip: false
    }
  },
  created () {
    // code...
  },
  watch: {
    '$attrs.value': 'setValue',
    '$attrs.options': 'setOptions',
    '$props.source': function () {
      this.options = []
    }
  },
  computed: {
    PROP () {
      const def = {
        'use-input': this.filter,
        'fill-input': this.filter,
        'hide-selected': this.filter
      }

      if (this.$attrs.multiple !== undefined) {
        def['fill-input'] = false
        def['hide-selected'] = false
      }

      return {
        useInput: def['use-input'],
        fillInput: def['fill-input'],
        hideSelected: def['hide-selected']
      }
    },
    QSelect () {
      return this.$refs.QSelect || null
    },
    opt () {
      if (!this.filter && this.$attrs.options) return this.$attrs.options
      return this.options
    }
  },
  methods: {
    setValue (v) {
      this.value = v
    },
    setOptions (v) {
      this.options = v
    },
    getOptionDisable (option) {
      if (!this.$attrs['option-disable']) return option.disable

      if (typeof this.$attrs['option-disable'] === 'function') {
        return this.$attrs['option-disable'](option)
      }
      return option[this.$attrs['option-disable']]
    },
    getOptionLabel (option) {
      if (typeof option === 'string') {
        return option
      } else if (typeof this.$attrs['option-label'] === 'function') {
        return this.$attrs['option-label'](option)
      }

      const label = this.$attrs['option-label'] || 'label'
      return option[label]
    },
    getOptionSublabel (option) {
      if (!this.$attrs['option-sublabel']) return option.sublabel

      if (typeof this.$attrs['option-sublabel'] === 'function') {
        return this.$attrs['option-sublabel'](option)
      }
      return option[this.$attrs['option-sublabel']]
    },
    filterFn (val, update, abort) {
      if (this.$listeners.filter && typeof this.$listeners.filter === 'function') {
        this.$emit('filter', val, update, abort)
        return
      }

      const min = Number(this.filterMin)
      if (min) {
        if (String(val).length < min) {
          this.isFilterSkip = true
          return update()
        }
        this.isFilterSkip = false
      }

      if (this.options.length && !String(val).length) {
        update()
        return
      }

      if (this.source) {
        const separator = String(this.source).indexOf('?') < 0 ? '?' : '&'
        const fields = this.sourceKeys || []
        const search = fields
          ? `search=${val}&search-keys=${fields.join(',')}`
          : `search=${val}`
        const apiUrl = this.source + separator + search
        console.info(`[PLAY] Source GET: ${apiUrl}`)
        return this.$axios.get(apiUrl)
          .then(response => {
            this.options = response.data
          })
          .catch(error => {
            console.error(error || error.response)
          })
          .finally(() => {
            return update()
          })
      }

      update(() => {
        const needle = val.toLowerCase()
        this.options = this.$attrs.options.filter(v => {
          const needles = String(needle).split(' ')
          for (let i = 0; i < needles.length; i++) {
            if (needles[i] && !String(v.label + v.sublabel).toLowerCase().includes(needles[i])) return false
          }
          return true
        })
      })
    },
    filterFunc (v, u, a) {
      this.$listeners.filter && typeof this.$listeners.filter === 'function'
        ? this.$emit('filter', v, u, a)
        : this.filterFn(v, u)
    },
    inputFunction (v) {
      this.$nextTick(() => {
        let innerValue = v
        if (this.QSelect) {
          if (this.QSelect.multiple) innerValue = this.QSelect.innerValue
          else {
            innerValue = this.QSelect.innerValue[0] || null
          }
        }

        this.$emit('selected', this.value, innerValue)
      })
    }
  }
}
</script>

<style lang="stylus">
.q-field__before:empty,
.q-field__prepend:empty
  display none

.q-field__bottom
  // display none
  min-height: 0px;
  padding-top: 0;

  .q-field__messages:not(:empty),
  .q-field__counter:not(:empty)
    min-height: 12px
    margin-top: 4px

</style>
