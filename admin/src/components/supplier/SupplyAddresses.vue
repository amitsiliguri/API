<template>
  <v-data-table
    :headers="headers"
    :items="items"
    :loading="loading"
    :options.sync="options"
    :footer-props="{
      'items-per-page-options': itemsPerPageOptions
    }"
    :items-per-page="options.itemsPerPage"
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
        <v-spacer></v-spacer>

        <v-dialog v-model="dialog" max-width="767px" scrollable>
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" class="mb-2" v-bind="attrs" v-on="on">
              Add New Address
            </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">Add New Address</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row justify="center">
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      :counter="50"
                      v-model="formData.building_name"
                      dense
                      outlined
                      label="Building Name"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.floor"
                      :counter="50"
                      dense
                      outlined
                      label="Floor"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.street"
                      :counter="50"
                      dense
                      outlined
                      label="Street"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.landmark"
                      :counter="50"
                      dense
                      outlined
                      label="Landmark"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.city"
                      :counter="50"
                      dense
                      outlined
                      label="City"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.state"
                      :counter="50"
                      dense
                      outlined
                      label="State"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.country"
                      :counter="50"
                      dense
                      outlined
                      label="Country"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.zip"
                      :counter="50"
                      dense
                      outlined
                      label="Zip"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.phone"
                      :counter="50"
                      dense
                      outlined
                      label="Phone"
                      required
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="dialog = false">
                Cancel
              </v-btn>
              <v-btn color="blue darken-1" text @click="validate()">
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:[`item.actions`]="{ item }">
      <v-icon small class="mr-2" @click="editSupplierAddress(item)">
        mdi-pencil
      </v-icon>
    </template>
  </v-data-table>
</template>

<script>
import { mapActions } from "vuex";
export default {
  props: {
    supplierId: {
      type: Number,
      required: true
    }
  },
  computed: {
    formData() {
      return this.$store.state.supplierAddress.form;
    },
    headers() {
      return this.$store.state.supplierAddress.headers;
    },
    items() {
      return this.$store.state.supplierAddress.data;
    },
    loading() {
      return this.$store.state.supplierAddress.loading;
    },
    itemsPerPageOptions() {
      return this.$store.state.supplierAddress.itemsPerPageOptions;
    },
    dialog: {
      get() {
        return this.$store.state.supplierAddress.dialog;
      },
      set: function(newValue) {
        this.toggleModal(newValue);
      }
    },
    options: {
      // getter
      get: function() {
        return this.$store.state.supplierAddress.options;
      },
      // setter
      set: function(newValue) {
        let self = this;
        self.setOptionValues(newValue);
        self.loadSuppliersAddress({
          id : self.supplierId,
          page: newValue.page,
          itemsPerPage: newValue.itemsPerPage
        });
      }
    }
  },
  mounted() {
    let self = this;

    self.setSupplierId(self.supplierId);

    self.loadSuppliersAddress({
        id : self.supplierId,
        page: 1,
        itemsPerPage: 10
      });
  },
  methods: {
    ...mapActions({
      loadSuppliersAddress: "supplierAddress/loadSuppliersAddress",
      setOptionValues: "supplierAddress/setOptionValues",
      toggleModal: "supplierAddress/toggleModal",
      submitSupplierFormData: "supplierAddress/submitSupplierFormData",
      setSupplierId: "supplierAddress/setSupplierId",
      editSupplierAddress: "supplierAddress/editSupplierAddress"
    }),
    validate() {
      let self = this;
      self.submitSupplierFormData(self.supplierId);
    }
  }
};
</script>
