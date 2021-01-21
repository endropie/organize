<template>
  <q-dialog :ref="DIALOG.name" persistent maximized>
    <q-card v-if="rsForm" style="min-width:250px">
      <q-bar class="bg-blue-grey text-white" style="height:47px">
        <q-btn flat icon="arrow_back_ios" style="width:25px" @click="DIALOG.hide" />
        <q-toolbar-title>FORM MEMBER</q-toolbar-title>
        <!-- <q-space /> -->
      </q-bar>
      <q-scroll-area :style="`height: calc(${FullHeight} - 100px); width:100%`"  :class="{'q-px-sm': $q.screen.gt.sm}">
        <q-card-section>
          <q-card flat bordered class="q-pb-sm q-mb-sm">
            <q-card-section :horizontal="!$q.screen.lt.sm" :class="{'q-px-md q-gutter-sm': !$q.screen.lt.sm}">
              <ux-select filter
                class=""
                label="No. KK"
                v-model="rsForm.premium" clearable
                source="/api/premiums?mode=all&fields=id,no,cost&includes=region"
                option-value="id"
                option-label="no"
                @input="(v) => {
                  rsForm.premium_id = v ? v.id : null
                }"
              />
              <q-space />
              <q-input v-if="rsForm.premium" :value="rsForm.premium.region.name" label="Regional" readonly />
              <q-input v-if="rsForm.premium" :value="rsForm.premium.cost" label="Premi" readonly />
            </q-card-section>
          </q-card>
          <q-card flat bordered class="q-pb-sm q-mb-sm" v-if="rsForm.premium">
            <q-card-section>
              <div class="row q-col-gutter-sm">
                <q-input class="col-12 col-sm-6"
                  label="No KTP"
                  v-model="rsForm.no"
                  v-validate="'required'"
                  name="no"
                  :error="errors.has('no')" no-error-icon
                  :error-message="errors.first('no')"
                />
                <div class="col-12 col-sm-6 column items-end">
                  <q-field :class="{'fit': $q.screen.lt.sm}" :borderless="!$q.screen.lt.sm"
                    prefix="Kelamin"
                    :error="errors.has('gender')" no-error-icon
                    :error-message="errors.first('gender')"
                  >
                  <q-option-group slot="control" inline
                    v-model="rsForm.gender"
                    color="secondary"
                    :options="GenderOptions"
                    name="gender"
                    v-validate="'required'"
                  />
                  </q-field>
                </div>

                <q-input class="col-12 col-md-6"
                  label="Nama"
                  v-model="rsForm.name"
                  v-validate="'required'"
                  name="name" data-vv-as="Nama"
                  :error="errors.has('name')" no-error-icon
                  :error-message="errors.first('name')"
                />

                <q-input class="col-12 col-sm-6 col-md-3"
                  label="Kelahiran" stack-label
                  v-model="rsForm.birth_place"
                  v-validate="'required'"
                  name="birth_place" data-vv-as="Kelahiran"
                  :error="errors.has('birth_place')" no-error-icon
                  :error-message="errors.first('birth_place')"
                />

                <q-input type="date" class="col-12 col-sm-6 col-md-3"
                  label="Tanggal Lahir" stack-label
                  v-model="rsForm.birth_date"
                  v-validate="'required'"
                  name="birth_date" data-vv-as="Tanggal lahir"
                  :error="errors.has('birth_date')" no-error-icon
                  :error-message="errors.first('birth_date')"
                />

                <q-input filled autogrow type="textarea" class="col-12"
                  label="Alamat Leangkap" stack-label
                  v-model="rsForm.address"
                  v-validate="'required'"
                  name="address" data-vv-as="Alamat"
                  :error="errors.has('address')" no-error-icon
                  :error-message="errors.first('address')"
                />

              </div>
            </q-card-section>
          </q-card>
          <q-card flat bordered class="q-pb-sm q-mb-sm" v-if="rsForm.premium">
            <q-card-section>
              <q-input filled
                label="No. kontak"
                v-model="rsForm.contact_number"
                v-validate="'required'"
                name="contact_number"
                :error="errors.has('contact_number')"
                :error-message="errors.first('contact_number')"
              />
              <q-field filled borderless
                label="Jenis Hubungan" stack-label
                :error="errors.has('contact_number')"
                :error-message="errors.first('contact_number')"
              >
                <q-option-group inline color="blue-grey" keep-color
                  v-model="rsForm.relate"
                  :options="RelateOptions"
                  v-validate="'required'"
                  name="contact_number"
                />
              </q-field>
            </q-card-section>
          </q-card>
        </q-card-section>
      </q-scroll-area>
      <q-space />
      <q-separator />
      <q-card-actions align="right" class="items-end">
        <q-btn glossy color="grey" label="Reset" @click="reset()" />
        <q-btn glossy color="positive" label="Save" @click="save()" :disable="!rsForm.premium" />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
import mixRecord from 'src/mixins/MixRecord'
import MixDialog from 'src/mixins/MixDialog'
export default {
  name: 'ReceiveForm',
  mixins: [mixRecord, MixDialog],
  data () {
    return {
      rsForm: null,
      RelateOptions: [
        { label: 'Pusako', value: 'pusako' },
        { label: 'Sumando', value: 'sumando' },
        { label: 'Anak Keturunan', value: 'anak' },
        { label: 'Partisipatisan', value: 'partisipatisan' }
      ],
      GenderOptions: [
        { label: 'Pria', value: 'M' },
        { label: 'Wanita', value: 'F' }
      ],
      DIALOG: {
        name: 'dialog',
        beforeHide: () => {
          this.$q.notify('no-hide')
        }
      },
      RECORD: {
        api: '/api/members',
        params: {
          fields: 'id,date,reference',
          includes: 'receive_items.item'
        },
        setForm: (v = {}) => ({
          reference_number: null,
          reference_batch: null,
          date: new Date().toISOString().slice(0, 10),
          receive_items: [],
          ...v
        }),
        setFormItem: (v = {}) => ({
          serial: null,
          item: null,
          notes: null,
          ...v
        })
      }
    }
  },
  created () {
    this.init()
  },
  computed: {
    FullHeight () {
      return window.innerHeight + 'px'
    }
  },
  methods: {
    init () {
      this.rsForm = this.RECORD.setForm()
    },
    enterCode (e) {
      this.addNewItem(e.target.value)
      e.target.value = ''
    },
    addNewItem (v) {
      if (!String(v).length) return this.$q.notify({ message: 'Please enter code..', textColor: 'white', type: 'warning' })

      if (this.rsForm.receive_items.find(x => x.serial === v)) {
        this.$q.notify({ type: 'negative', message: 'Serial has been added.' })
      } else {
        this.rsForm.receive_items.push(this.RECORD.setFormItem({ serial: v, item: this.as_item }))
      }
    },
    removeItem (index) {
      this.rsForm.receive_items.splice(index, 1)
    },
    reset () {
      const reset = () => {
        this.init()
      }
      this.$q.dialog({
        title: 'RESET',
        message: 'Konfirmasi reset data',
        ok: 'Ya, Reset',
        cancel: 'Batal'
      }).onOk(() => {
        reset()
      })
    },
    save () {
      const submit = () => {
        this.$q.loading.show()
        this.$axios.post(this.RECORD.api, this.rsForm)
          .then((response) => {
            const message = `${response.data.reference} created!`
            this.$q.notify({ type: 'positive', message })
            this.$emit('ok')
            this.hide()
          })
          .catch((error) => {
            this.fieldError(error.response || null)
            let message = { code: 0, text: 'SAVE INVALID' }

            if (error.response) {
              if (error.statusText) message.text = error.response.statusText
              if (error.response.data && error.response.data.message) message = error.response.data.message
            }
            this.$q.notify({ type: 'negative', message: message })
          })
          .finally(() => {
            this.$q.loading.hide()
          })
      }

      this.$validator.validate().then(valid => {
        if (!valid) return this.$q.notify({ type: 'negative', message: 'SUBMIT FAILED' })

        const len = this.rsForm.receive_items.length
        const desc = Object
          .values(this.$function.groupBy(this.rsForm.receive_items, row => row.item.id))
          .map(rows => {
            return rows.length ? `(${rows.length}) ${rows[0].item.name}` : null
          })
          .join('<BR>')

        this.$q.dialog({
          title: 'SIMPAN',
          html: true,
          message: `${desc}<BR><B>Konfirmasi penerimaan (${len}) total unit<b>`,
          ok: 'Ya, Simpan',
          cancel: 'Batal'
        }).onOk(() => {
          submit()
        }).onDismiss(() => {
          this.$refs.code.focus()
        })
      })
    },
    fieldError ({ ...ErrRes }, form = null) {
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
</script>
<style lang="stylus">
.q-field__bottom
  padding 0px !important
</style>
