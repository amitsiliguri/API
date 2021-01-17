<template>
  <v-app>
    <template v-if="isLiggedIn">yes</template>
    <template v-else>no</template>
    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",
  computed: {
    isLiggedIn() {
      return this.$store.state.user.token;
    }
  }
};
</script>
