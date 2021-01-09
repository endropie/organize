<template>
  <q-list padding class="bg-grey-2">
    <q-item v-for="link in links1" :key="link.text" clickable class="GPL__drawer-item">
    <q-item-section avatar>
        <q-icon :name="link.icon" />
    </q-item-section>
    <q-item-section>
        <q-item-label>{{ link.text }}</q-item-label>
    </q-item-section>
    </q-item>

    <q-separator class="q-my-md" />

    <q-item v-for="link in links2" :key="link.text" clickable class="GPL__drawer-item">
    <q-item-section avatar>
        <q-icon :name="link.icon" />
    </q-item-section>
    <q-item-section>
        <q-item-label>{{ link.text }}</q-item-label>
    </q-item-section>
    </q-item>

    <q-separator class="q-my-md" />

    <q-item clickable class="GPL__drawer-item"
      v-for="link in links3" :key="link.text"
      :to="link.to || undefined"
    >
    <q-item-section avatar>
      <q-icon :name="link.icon" />
    </q-item-section>
    <q-item-section>
      <q-item-label>{{ link.text }}</q-item-label>
    </q-item-section>
    </q-item>

    <q-separator class="q-my-md" />

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
      links1: [
        { icon: 'account_tree', text: 'Struktur' },
        { icon: 'people', text: 'Anggota' },
        { icon: 'monetization_on', text: 'Iuran Wajib' },
        { icon: 'local_atm', text: 'Kas' },
        { icon: 'event', text: 'Acara Alek' }
      ],
      links2: [
        { icon: 'photo', text: 'Album' },
        { icon: 'import_contacts', text: 'Berita' }
      ],
      links3: [
        { icon: 'settings', text: 'Settings' },
        { icon: 'person', text: 'Users' },
        { icon: 'get_app', text: 'App Downloads' }
      ]
    }
  }
}
</script>
