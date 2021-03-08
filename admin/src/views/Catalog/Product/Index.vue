<template>
  <v-container>
    <v-row>
      <v-col cols="12">
        <v-data-table
          :headers="headers"
          :items="items"
          :loading="loading"
          :options.sync="options"
          :footer-props="{
            'items-per-page-options': itemsPerPageOptions
          }"
          :items-per-page="options.itemsPerPage"
          height="450"
          loader-height="2"
          class="elevation-1"
          show-select
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-btn icon>
                <v-icon small> mdi-delete </v-icon>
              </v-btn>
              <v-divider class="mx-4" inset vertical></v-divider>
              <v-toolbar-title>Products</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn
                color="primary"
                depressed
                dark
                class="mb-2"
                to="/catalog/product/create"
              >
                Add New Item
              </v-btn>
            </v-toolbar>
          </template>
        </v-data-table>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapActions } from "vuex";
export default {
  computed: {
    headers() {
      return this.$store.state.catalogProduct.headers;
    },
    items() {
      return this.$store.state.catalogProduct.data;
    },
    loading() {
      return this.$store.state.catalogProduct.loading;
    },
    itemsPerPageOptions() {
      return this.$store.state.catalogProduct.itemsPerPageOptions;
    },
    options: {
      // getter
      get: function() {
        return this.$store.state.catalogProduct.options;
      },
      // setter
      set: function(newValue) {
        this.setOptionValues(newValue);
        this.loadProducts({
          page: newValue.page,
          itemsPerPage: newValue.itemsPerPage
        });
      }
    }
  },
  mounted() {
    this.loadProducts({
      page: 1,
      itemsPerPage: 10
    });
  },
  methods: {
    ...mapActions({
      loadProducts: "catalogProduct/loadProducts",
      setOptionValues: "catalogProduct/setOptionValues"
    })
  }
};
</script>
