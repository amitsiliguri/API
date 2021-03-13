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
              <v-toolbar-title>Suppliers</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn
                color="primary"
                depressed
                dark
                class="mb-2"
                @click="createSupplier()"
              >
                Add New Supplier
              </v-btn>
            </v-toolbar>
          </template>

          <template v-slot:[`item.actions`]="{ item }">
            <v-icon small class="mr-2" @click="editSupplier(item.id)">
              mdi-pencil
            </v-icon>
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
      return this.$store.state.supplier.headers;
    },
    items() {
      return this.$store.state.supplier.data;
    },
    loading() {
      return this.$store.state.supplier.loading;
    },
    itemsPerPageOptions() {
      return this.$store.state.supplier.itemsPerPageOptions;
    },
    options: {
      // getter
      get: function() {
        return this.$store.state.supplier.options;
      },
      // setter
      set: function(newValue) {
        this.setOptionValues(newValue);
        this.loadSuppliers({
          page: newValue.page,
          itemsPerPage: newValue.itemsPerPage
        });
      }
    }
  },
  mounted() {
    this.loadSuppliers({
      page: 1,
      itemsPerPage: 10
    });
  },
  methods: {
    ...mapActions({
      loadSuppliers: "supplier/loadSuppliers",
      setOptionValues: "supplier/setOptionValues",
      editSupplier: "supplier/editSupplier",
      createSupplier: "supplier/createSupplier"
    })
  }
};
</script>
