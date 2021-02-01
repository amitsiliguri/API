<template>
  <div class="about">
    <h1>This is a Warehouse page</h1>
    <v-btn @click="getCurrentUser()">Current User Details</v-btn>
  </div>
</template>
<script>
  import { mapActions} from "vuex";
  export default {
    name: "Warehouse",
    methods : {
    ...mapActions(
      {
        getCurrentUser : "user/getCurrentUserData"
      }
    )
  }
  }
</script>