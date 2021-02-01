<template>
  <div class="about">
    <h1>This is a category page</h1>
    <v-btn @click="getCurrentUser()">Current User Details</v-btn>
  </div>
</template>
<script>
  import { mapActions} from "vuex";
  export default {
    name: "Category",
    methods : {
    ...mapActions(
      {
        getCurrentUser : "user/getCurrentUserData"
      }
    )
  }
  }
</script>