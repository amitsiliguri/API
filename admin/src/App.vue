<template>
  <v-app v-resize="onResize">
    <v-navigation-drawer
      v-if="$store.state.user.token"
      app
      v-model="drawer"
      class="pt-4"
      :expand-on-hover="windowSize.x > 1263"
    >
      <leftMenu></leftMenu>
    </v-navigation-drawer>

    <v-app-bar v-if="$store.state.user.token" flat app fixed dense>
      <v-app-bar-nav-icon
        @click="drawer = !drawer"
        v-if="windowSize.x < 1264"
      ></v-app-bar-nav-icon>
      <v-toolbar-title>Page title</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-switch v-model="$vuetify.theme.dark" class="mt-6"></v-switch>
      <v-btn icon @click="$router.go(-1)">
        <v-icon>mdi-undo-variant</v-icon>
      </v-btn>
    </v-app-bar>
    <v-main>
      <router-view />
    </v-main>
    <notifications />
    <loader />
  </v-app>
</template>

<script>
import loader from "@/components/loader";
import notifications from "@/components/Notifications";
import leftMenu from "@/components/Menu";
export default {
  name: "App",
  components: {
    notifications,
    leftMenu,
    loader
  },
  data() {
    return {
      drawer: null,
      windowSize: {
        x: 0,
        y: 0
      }
    };
  },
  mounted() {
    this.onResize();
  },
  methods: {
    onResize() {
      this.windowSize = { x: window.innerWidth, y: window.innerHeight };
    }
  }
};
</script>
