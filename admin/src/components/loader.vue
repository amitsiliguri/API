<template>
  <v-dialog v-model="showLoader" persistent width="300">
    <v-card>
      <v-card-text>
        Please stand by
        <v-progress-linear indeterminate class="mb-0"></v-progress-linear>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "Notifications",
  computed: {
    showLoader: {
      get: function() {
        return this.$store.state.general.loader;
      }
    }
  }
};
</script>
