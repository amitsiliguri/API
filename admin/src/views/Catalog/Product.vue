<template>
  <div class="about">
    <h1>This is a Product page</h1>
    <v-btn @click="getCurrentUser()">Current User Details</v-btn>
  </div>
</template>
<script>
  import { mapActions} from "vuex";
  export default {
    name: "Product",
    methods : {
    ...mapActions(
      {
        getCurrentUser : "user/getCurrentUserData"
      }
    )
  }
  }
</script>