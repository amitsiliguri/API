<template>
  <v-container>
    <v-row>
      <v-col cols="12">
        <productForm />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
//   import {mapActions} from "vuex";
import productForm from "@/components/catalog/product/form";
export default {
  name: "Category",
  components: {
    productForm
  }
};
</script>
