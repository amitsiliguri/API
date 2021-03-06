<template>
  <v-form ref="form" lazy-validation>
    <v-btn color="primary" class="my-4">
      Submit
    </v-btn>

    <v-expansion-panels accordion multiple>
      <v-expansion-panel>
                <v-expansion-panel-header>General</v-expansion-panel-header>
                <v-expansion-panel-content>
                    <v-row justify="center">
                        <v-col cols="12" sm="9" class="py-0">
                          <v-select :items="['Active', 'Inactive', 'Blocked']" label="Status" dense outlined></v-select>
                        </v-col>
                        <v-col cols="12" sm="9" class="py-0">
                            <v-text-field :counter="50" dense outlined label="Legal Name" required ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="9" class="py-0">
                            <v-text-field :counter="50" dense outlined label="VAT/GST" required ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="9" class="py-0">
                            <v-text-field :counter="50" dense outlined label="Email" required ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="9" class="py-0">
                            <v-text-field :counter="50" dense outlined label="Phone" required ></v-text-field>
                        </v-col>
                    </v-row>
                </v-expansion-panel-content>
            </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header>Legal Address</v-expansion-panel-header>
        <v-expansion-panel-content>
            <v-row justify="center">
              <v-col cols="12" sm="9" class="py-0">
                <v-text-field :counter="50" dense outlined label="Building Name" required ></v-text-field>
              </v-col>
              <v-col cols="12" sm="9" class="py-0">
                <v-text-field :counter="50" dense outlined label="Floor" ></v-text-field>
              </v-col>
              <v-col cols="12" sm="9" class="py-0">
                <v-text-field :counter="50" dense outlined label="Street" required ></v-text-field>
              </v-col>
              <v-col cols="12" sm="9" class="py-0">
                <v-text-field :counter="50" dense outlined label="Landmark" required ></v-text-field>
              </v-col>
              <v-col cols="12" sm="9" class="py-0">
                <v-text-field :counter="50" dense outlined label="City" required ></v-text-field>
              </v-col>
              <v-col cols="12" sm="9" class="py-0">
                <v-text-field :counter="50" dense outlined label="State" required ></v-text-field>
              </v-col>
              <v-col cols="12" sm="9" class="py-0">
                <v-text-field :counter="50" dense outlined label="Country" required ></v-text-field>
              </v-col>
              <v-col cols="12" sm="9" class="py-0">
                <v-text-field :counter="50" dense outlined label="Zip" required ></v-text-field>
              </v-col>
            </v-row>
          </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
            <v-expansion-panel-header>Admin</v-expansion-panel-header>
            <v-expansion-panel-content>
              <v-row justify="center">
                <v-col cols="12" sm="9" class="py-0">
                  <v-select :items="['Mr.', 'Ms.', 'Mrs.']" label="Prefix" dense outlined></v-select>
                </v-col>
                <v-col cols="12" sm="9" class="py-0">
                  <v-text-field :counter="50" dense outlined label="First Name" required ></v-text-field>
                </v-col>
                <v-col cols="12" sm="9" class="py-0">
                  <v-text-field :counter="50" dense outlined label="Middle Name" ></v-text-field>
                </v-col>
                <v-col cols="12" sm="9" class="py-0">
                  <v-text-field :counter="50" dense outlined label="Last Name" required ></v-text-field>
                </v-col>
                <v-col cols="12" sm="9" class="py-0">
                  <v-text-field :counter="50" dense outlined label="Job Title" required ></v-text-field>
                </v-col>
                <v-col cols="12" sm="9" class="py-0">
                  <v-text-field :counter="50" dense outlined label="Email" required ></v-text-field>
                </v-col>
                <v-col cols="12" sm="9" class="py-0">
                  <v-text-field :counter="50" dense outlined label="Phone" required ></v-text-field>
                </v-col>
              </v-row>
            </v-expansion-panel-content>
          </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header>Contact People</v-expansion-panel-header>
        <v-expansion-panel-content>
          <contactPeople/>
        </v-expansion-panel-content>
      </v-expansion-panel>


      <v-expansion-panel>
        <v-expansion-panel-header>Supply Addresses</v-expansion-panel-header>
        <v-expansion-panel-content>
          <supplyAddresses/>
        </v-expansion-panel-content>
      </v-expansion-panel>


        </v-expansion-panels>
    </v-form>
</template>



<script>
import contactPeople from '@/components/supplier/ContactPeople';
import supplyAddresses from '@/components/supplier/SupplyAddresses';
export default {
  name: "Category",
  components : {
    contactPeople,
    supplyAddresses
  }
}
</script>