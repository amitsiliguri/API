<template>
  <v-container>
    <v-row>
      <v-col cols="12">
        <supplierForm />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
//   import {mapActions} from "vuex";
import supplierForm from "@/components/supplier/Create";
export default {
  name: "Category",
  components: {
    supplierForm
  }
};
</script>
