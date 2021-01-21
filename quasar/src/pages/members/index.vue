<template>
  <q-page padding class="flex flex-center">

    <q-card flat style="width: 100%;min-height: calc(100vh - 100px)">
      <q-bar class="bg-transparent text-subtitle2" style="height:50px">
        <q-icon name="mdi-widgets-outline" size="20px" />
        <q-toolbar-title>
          LIST - ANGGOTA
        </q-toolbar-title>
        <q-btn round dense outline icon="add" @click="form()" />
        <q-btn flat round dense icon="more_vert" />
      </q-bar>
      <q-table bordered
        style="min-height: calc(100vh - 150px)"
        :grid="$q.screen.lt.sm" card-container-style="overflow-y:scroll"
        :flat="$q.screen.lt.sm"
        :data="TABLE.rs"
        :columns="TABLE.columns"
        :pagination.sync="TABLE.pagination"
        :rows-per-page-options="TABLE.rowPageOptions"
        rows-per-page-label="LIMIT"
        :pagination-label="(first, last, total, x) => `${TABLE.pagination.last ? TABLE.pagination.page + ' of ' + TABLE.pagination.last : ''}`"
        @request="TABLE.request"
      >

        <template v-slot:item="{ row }">
          <div class="q-pa-xs col-xs-12" :class="{'col-xs-6': $q.screen.gt.xs}">
            <q-card flat bordered @click="view(row)" class="cursor-pointer">
              <q-card-section horizontal class="q-pa-sm">
                <div class="column">
                  <label class="text-grey q-mb-sm">
                    Reference
                    <br><strong class="text-dark">{{ row.reference }}</strong>
                  </label>
                </div>
                <q-space />
                <div class="column">
                  <label class="text-grey-8" v-if="row.date">
                    {{$app.moment(row.date).format('ll')}}
                  </label>
                </div>
              </q-card-section>
            </q-card>
          </div>
        </template>
        <q-td  slot="body-cell-prefix" slot-scope="rs" :props="rs" style="width:50px">
          <q-btn flat dense color="blue-grey" icon="wysiwyg" @click="view(rs.row)" />
        </q-td>
      </q-table>
    </q-card>

  </q-page>
</template>
<script>
import MixTable from 'src/mixins/MixTable'
import ViewComponent from './view'
import FormComponent from './form'
export default {
  name: 'ReceivesIndex',
  mixins: [MixTable],
  data () {
    return {
      test: null,
      TABLE: {
        api: '/api/members',
        params: {
          includes: 'premium,region',
          fields: 'id,no,name'
        },
        rs: [],
        columns: [
          { name: 'prefix' },
          { name: 'no', field: 'no', label: 'NIK', align: 'left' },
          { name: 'name', field: 'name', label: 'Nama (usia)', align: 'left' },
          { name: 'premium', field: (v) => v.premium.no, label: 'KK', align: 'left' },
          { name: 'region', field: (v) => v.region.name, label: 'Regional', align: 'left' },
          { name: 'created_at', field: 'created_at', label: 'Dibuat', align: 'center' }
        ],
        pagination: {
          sortBy: 'created_at',
          descending: true,
          page: 1,
          rowsPerPage: 10,
          rowsNumber: 0
        }
      }
    }
  },
  created () {
    this.init()
  },
  computed: {
  },
  methods: {
    init () {
      this.TABLE.request()
    },
    form (row = null) {
      this.$q.dialog({
        component: FormComponent,
        parent: this.$root,
        mode: 'create',
        id: null
        // ...more.props...
      }).onOk(() => {
        this.load()
      })
    },
    view (row) {
      this.$q.dialog({
        component: ViewComponent,
        parent: this.$root,
        mode: 'read',
        id: row.id
        // ...more.props...
      }).onOk(() => {
        this.load()
      })
    }
  }
}
</script>
