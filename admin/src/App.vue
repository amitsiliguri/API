<template>
  <v-app v-resize="onResize">

    <v-navigation-drawer v-if="$store.state.user.token" app v-model="drawer" class="pt-4" :expand-on-hover="windowSize.x > 1263">
      <v-list dense nav >
        <v-list-item v-for="item in $store.state.general.menu" :key="item.title" link :to="item.to">
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar v-if="$store.state.user.token" app fixed dense>
      <v-app-bar-nav-icon @click="drawer = !drawer" v-if="windowSize.x < 1264"></v-app-bar-nav-icon>
      <v-toolbar-title>Page title</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-app-bar>

    <!-- <router-link to="/dashboard">Dashboard</router-link>
    <router-link to="/">Login</router-link>
    <router-link to="/about">About</router-link> -->
    <v-main>
      <router-view/>
    </v-main>
    <notifications/>
  </v-app>
</template>

<script>
import notifications from '@/components/Notifications'
// import menu from '@/components/Menu'
export default {
  name: "App",
  components: {
    notifications,
    // menu
  },
  data () {
    return {
      drawer: null,
      windowSize: {
        x: 0,
        y: 0,
      },
    }
  },
  mounted () {
    this.onResize()
  },
  methods: {
      onResize () {
        this.windowSize = { x: window.innerWidth, y: window.innerHeight }
      },
    },
};
</script>
