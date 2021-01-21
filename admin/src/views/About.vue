<template>
  <div class="about">
    <h1>This is an about page</h1>
    <v-btn @click="getCurrentUser()">Current User Details</v-btn>
  </div>
</template>
<script>
  import { mapActions} from "vuex";
  export default {
    name: "About",
    methods : {
    ...mapActions(
      {
        getCurrentUser : "user/getCurrentUserData"
      }
    )
  }
  }
</script>