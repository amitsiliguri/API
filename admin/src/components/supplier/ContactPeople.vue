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
              Add New Contact Person
            </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">Contact Person Form</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row justify="center">
                  <v-col cols="12" class="py-0">
                    <v-select
                      v-model="formData.prefix"
                      :items="['Mr.', 'Ms.', 'Mrs.']"
                      :counter="100"
                      label="Prefix"
                      dense
                      outlined
                    ></v-select>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.first_name"
                      :counter="100"
                      dense
                      outlined
                      label="First Name"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.middle_name"
                      :counter="100"
                      dense
                      outlined
                      label="Middle Name"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.last_name"
                      :counter="100"
                      dense
                      outlined
                      label="Last Name"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.job_title"
                      :counter="100"
                      dense
                      outlined
                      label="Job Title"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.email"
                      :counter="100"
                      dense
                      outlined
                      label="Email"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      v-model="formData.phone"
                      :counter="100"
                      dense
                      outlined
                      label="Phone"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-select
                      v-model="formData.gender"
                      :items="['Male', 'Female', 'Others']"
                      label="Gender"
                      dense
                      outlined
                    ></v-select>
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
      <v-icon small class="mr-2" @click="editsupplierContactPeople(item)">
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
      return this.$store.state.supplierContactPeople.form;
    },
    headers() {
      return this.$store.state.supplierContactPeople.headers;
    },
    items() {
      return this.$store.state.supplierContactPeople.data;
    },
    loading() {
      return this.$store.state.supplierContactPeople.loading;
    },
    itemsPerPageOptions() {
      return this.$store.state.supplierContactPeople.itemsPerPageOptions;
    },
    dialog: {
      get() {
        return this.$store.state.supplierContactPeople.dialog;
      },
      set: function(newValue) {
        this.toggleModal(newValue);
      }
    },
    options: {
      // getter
      get: function() {
        return this.$store.state.supplierContactPeople.options;
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
      loadSuppliersAddress: "supplierContactPeople/loadSuppliersAddress",
      setOptionValues: "supplierContactPeople/setOptionValues",
      toggleModal: "supplierContactPeople/toggleModal",
      submitSupplierFormData: "supplierContactPeople/submitSupplierFormData",
      setSupplierId: "supplierContactPeople/setSupplierId",
      editsupplierContactPeople: "supplierContactPeople/editsupplierContactPeople"
    }),
    validate() {
      let self = this;
      self.submitSupplierFormData(self.supplierId);
    }
  }
};
</script>
