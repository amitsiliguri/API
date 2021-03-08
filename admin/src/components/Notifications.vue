<template>
  <v-snackbar v-model="showNotifications">
    {{ notificationText }}
    <template v-slot:action="{ attrs }">
      <v-btn text v-bind="attrs" @click="hideNotifination(false)">
        Close
      </v-btn>
    </template>
  </v-snackbar>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "Notifications",
  computed: {
    showNotifications: {
      get: function() {
        return this.$store.state.general.snackbar;
      },
      set: function(newValue) {
        this.$store.commit("general/HIDE_NOTIFICATIONS", newValue, {
          root: true
        });
      }
    },
    notificationText() {
      return this.$store.state.general.snackbar_text;
    }
  },
  methods: {
    ...mapActions({
      hideNotifination: "general/hideNotification"
    })
  }
};
</script>
