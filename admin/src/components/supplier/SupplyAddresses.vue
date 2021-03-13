<template>
  <v-data-table
    :headers="headers"
    :items="desserts"
    :items-per-page="5"
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
                    <v-select
                      :items="['Mr.', 'Ms.', 'Mrs.']"
                      label="Prefix"
                      dense
                      outlined
                    ></v-select>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      :counter="50"
                      dense
                      outlined
                      label="First Name"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      :counter="50"
                      dense
                      outlined
                      label="Middle Name"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      :counter="50"
                      dense
                      outlined
                      label="Last Name"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      :counter="50"
                      dense
                      outlined
                      label="Job Title"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
                      :counter="50"
                      dense
                      outlined
                      label="Email"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="py-0">
                    <v-text-field
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
              <v-btn color="blue darken-1" text>
                Cancel
              </v-btn>
              <v-btn color="blue darken-1" text>
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
  </v-data-table>
</template>

<script>
export default {
  data() {
    return {
      dialog: false,
      headers: [
        {
          text: "Dessert (100g serving)",
          align: "start",
          sortable: false,
          value: "name"
        },
        { text: "Calories", value: "calories" },
        { text: "Fat (g)", value: "fat" },
        { text: "Carbs (g)", value: "carbs" },
        { text: "Protein (g)", value: "protein" },
        { text: "Iron (%)", value: "iron" }
      ],
      desserts: [
        {
          name: "Frozen Yogurt",
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: "1%"
        },
        {
          name: "Ice cream sandwich",
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: "1%"
        },
        {
          name: "Eclair",
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: "7%"
        },
        {
          name: "Cupcake",
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          iron: "8%"
        },
        {
          name: "Gingerbread",
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          iron: "16%"
        },
        {
          name: "Jelly bean",
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          iron: "0%"
        },
        {
          name: "Lollipop",
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          iron: "2%"
        },
        {
          name: "Honeycomb",
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5,
          iron: "45%"
        },
        {
          name: "Donut",
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          iron: "22%"
        },
        {
          name: "KitKat",
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: "6%"
        }
      ]
    };
  }
};
</script>