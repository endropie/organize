<template>
    <q-page-sticky v-if="$q.screen.gt.sm" expand position="left">
    <div class="fit q-pt-xl q-px-sm column">

        <q-btn round flat color="grey-8" stack no-caps size="26px" class="GPL__side-btn"
          @click="$router.push('/members')"
          :disable="$route.path === '/members'"
        >
          <q-icon size="22px" name="people" />
          <div class="GPL__side-btn__label">ANGGOTA</div>
        </q-btn>

        <q-btn round flat color="grey-8" stack no-caps size="26px" class="GPL__side-btn">
        <q-icon size="22px" name="monetization_on" />
        <div class="GPL__side-btn__label">PREMI</div>
        </q-btn>

        <q-btn round flat color="grey-8" stack no-caps size="26px" class="GPL__side-btn">
        <q-icon size="22px" name="event" />
        <div class="GPL__side-btn__label">ALEK</div>
        <q-badge floating color="red" text-color="white" style="top: 8px; right: 16px">
            1
        </q-badge>
        </q-btn>

        <q-btn round flat color="grey-8" stack no-caps size="26px" class="GPL__side-btn">
        <q-icon size="22px" name="local_atm" />
        <div class="GPL__side-btn__label">KAS</div>
        </q-btn>

        <q-btn round flat color="grey-8" stack no-caps size="26px" class="GPL__side-btn">
        <q-icon size="22px" name="photo" />
        <div class="GPL__side-btn__label">GALERY</div>
        </q-btn>

        <q-btn round flat color="grey-8" stack no-caps size="26px" class="GPL__side-btn">
        <q-icon size="22px" name="import_contacts" />
        <div class="GPL__side-btn__label">BERITA</div>
        </q-btn>
    </div>
    </q-page-sticky>
</template>
