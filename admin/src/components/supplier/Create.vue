<template>
  <v-form ref="form" v-model="valid" lazy-validation>
    <v-btn color="primary" class="my-4" @click="validate()">
      Submit
    </v-btn>

    <v-expansion-panels accordion multiple v-model="panel">
      <v-expansion-panel>
        <v-expansion-panel-header>General</v-expansion-panel-header>
        <v-expansion-panel-content>
          <v-row justify="center">
            <v-col cols="12" sm="9" class="py-0">
              <v-select
                :items="['Active', 'Inactive', 'Blocked']"
                v-model="formData.status"
                label="Status"
                dense
                outlined
              ></v-select>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.legal_name"
                :counter="100"
                :rules="formDataRules.leagalNameRules"
                dense
                outlined
                label="Legal Name"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.register_number"
                :counter="100"
                :rules="formDataRules.registerNumberRules"
                dense
                outlined
                label="VAT/GST"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.email"
                :counter="100"
                :rules="formDataRules.emailRules"
                dense
                outlined
                label="Email"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.phone"
                :counter="100"
                :rules="formDataRules.phoneRules"
                dense
                outlined
                label="Phone"
                required
              ></v-text-field>
            </v-col>
          </v-row>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header>Legal Address</v-expansion-panel-header>
        <v-expansion-panel-content>
          <v-row justify="center">
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.building_name"
                :counter="100"
                :rules="formDataRules.addressBuildingNameRules"
                dense
                outlined
                label="Building Name"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.floor"
                :counter="100"
                :rules="formDataRules.addressFloorRules"
                dense
                outlined
                label="Floor"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.street"
                :counter="100"
                :rules="formDataRules.addressStreetRules"
                dense
                outlined
                label="Street"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.landmark"
                :counter="100"
                :rules="formDataRules.addressLandmarkRules"
                dense
                outlined
                label="Landmark"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.city"
                :counter="100"
                :rules="formDataRules.addressCityRules"
                dense
                outlined
                label="City"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.state"
                :counter="100"
                :rules="formDataRules.addressStateRules"
                dense
                outlined
                label="State"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.country"
                :counter="100"
                :rules="formDataRules.addressCountryRules"
                dense
                outlined
                label="Country"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.zip"
                :counter="100"
                :rules="formDataRules.addressZipRules"
                dense
                outlined
                label="Zip"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.address.phone"
                :counter="100"
                :rules="formDataRules.addressPhoneRules"
                dense
                outlined
                label="Phone"
                required
              ></v-text-field>
            </v-col>
          </v-row>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header>Admin</v-expansion-panel-header>
        <v-expansion-panel-content>
          <v-row justify="center">
            <v-col cols="12" sm="9" class="py-0">
              <v-select
                v-model="formData.contact_person.prefix"
                :items="['Mr.', 'Ms.', 'Mrs.']"
                :counter="100"
                :rules="formDataRules.contactPersonPrefixRules"
                label="Prefix"
                dense
                outlined
              ></v-select>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.contact_person.first_name"
                :counter="100"
                :rules="formDataRules.contactPersonFirstNameRules"
                dense
                outlined
                label="First Name"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.contact_person.middle_name"
                :counter="100"
                :rules="formDataRules.contactPersonMiddleNameRules"
                dense
                outlined
                label="Middle Name"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.contact_person.last_name"
                :counter="100"
                :rules="formDataRules.contactPersonLastNameRules"
                dense
                outlined
                label="Last Name"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.contact_person.job_title"
                :counter="100"
                :rules="formDataRules.contactPersonJobTitleRules"
                dense
                outlined
                label="Job Title"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.contact_person.email"
                :counter="100"
                :rules="formDataRules.contactPersonEmailRules"
                dense
                outlined
                label="Email"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.contact_person.phone"
                :counter="100"
                :rules="formDataRules.contactPersonPhoneRules"
                dense
                outlined
                label="Phone"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-select
                v-model="formData.contact_person.gender"
                :items="['Male', 'Female', 'Others']"
                label="Gender"
                :rules="formDataRules.contactPersonGenderRules"
                dense
                outlined
              ></v-select>
            </v-col>
          </v-row>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel v-if="formData.id">
        <v-expansion-panel-header>Contact People</v-expansion-panel-header>
        <v-expansion-panel-content>
          <contactPeople />
        </v-expansion-panel-content>
      </v-expansion-panel>

      <v-expansion-panel v-if="formData.id">
        <v-expansion-panel-header>Supply Addresses</v-expansion-panel-header>
        <v-expansion-panel-content>
          <supplyAddresses />
        </v-expansion-panel-content>
      </v-expansion-panel>
    </v-expansion-panels>
  </v-form>
</template>

<script>
import { mapActions } from "vuex";
import contactPeople from "@/components/supplier/ContactPeople";
import supplyAddresses from "@/components/supplier/SupplyAddresses";
export default {
  name: "SupplierCreate",
  components: {
    contactPeople,
    supplyAddresses
  },
  data: () => ({
    valid: true,
    panel: [0],
    formDataRules: {
      leagalNameRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      registerNumberRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      emailRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      phoneRules: [v => !!v || "This is a required field"],
      addressBuildingNameRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      addressFloorRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      addressStreetRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      addressLandmarkRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      addressCityRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      addressStateRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      addressCountryRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      addressZipRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      addressPhoneRules: [v => !!v || "This is a required field"],
      contactPersonJobTitleRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      contactPersonPrefixRules: [v => !!v || "This is a required field"],
      contactPersonFirstNameRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      contactPersonMiddleNameRules: [
        v =>
          (v.length >= 0 && v.length <= 100) ||
          "Title must be less than 100 characters"
      ],
      contactPersonLastNameRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      contactPersonEmailRules: [
        v => !!v || "This is a required field",
        v => (v && v.length <= 100) || "Title must be less than 100 characters"
      ],
      contactPersonPhoneRules: [v => !!v || "This is a required field"],
      contactPersonGenderRules: [v => !!v || "This is a required field"]
    }
  }),
  computed: {
    formData: {
      get() {
        return this.$store.state.supplier.form;
      }
    }
  },
  methods: {
    ...mapActions({
      submitSupplierFormData: "supplier/submitSupplierFormData"
    }),
    validate() {
      let self = this;
      self.panel = [0, 1, 2];
      setTimeout(function() {
        if (self.$refs.form.validate()) {
          self.submitSupplierFormData();
        }
      }, 1000);
    }
  }
};
</script>
