<template>
  <v-container>
    <v-row>
      <v-col cols="12">
        <vendorForm />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
//   import {mapActions} from "vuex";
import vendorForm from "@/components/supplier/Create";
export default {
  name: "Category",
  components: {
    vendorForm
  }
};
</script>
