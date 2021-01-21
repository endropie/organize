<template>
  <q-list padding class="bg-grey-2">

    <q-list v-for="(groups, g) in links" :key="g">
      <q-item clickable
        v-for="(link, l) in groups" :key="l"
        :to="link.to || undefined"
        class="GPL__drawer-item"
        >
      <q-item-section avatar>
          <q-icon :name="link.icon" />
      </q-item-section>
      <q-item-section>
          <q-item-label>{{ link.text }}</q-item-label>
      </q-item-section>
      </q-item>
      <q-separator class="q-my-md" />
    </q-list>

    <q-item class="GPL__drawer-item GPL__drawer-item--storage">
    <q-item-section top class="text-grey-14">
      <div  class="text-weight-medium">IK2T - KAMPUNG TANJUNG</div>
      <div class="text-weight-light" style="line-height:normal">
        <div>Copyright © 2018 - 2021 JAKARTA</div>
        <div>Powered by Hendro Wibowo</div>
      </div>
    </q-item-section>
    </q-item>
  </q-list>
</template>

<script>
export default {
  name: 'MenuLink',
  data () {
    return {
      storage: 0.26,
      links: [
        [
          { icon: 'account_tree', text: 'Struktur' },
          { icon: 'people', text: 'Anggota', to: '/members' },
          { icon: 'monetization_on', text: 'Premi Wajib' },
          { icon: 'local_atm', text: 'Kas' },
          { icon: 'event', text: 'Acara Alek' }
        ],
        [
          { icon: 'photo', text: 'Album' },
          { icon: 'import_contacts', text: 'Berita' }
        ],
        [
          { icon: 'settings', text: 'Settings' },
          { icon: 'person', text: 'Users' },
          { icon: 'get_app', text: 'App Downloads' }
        ]
      ]
    }
  }
}
</script>
