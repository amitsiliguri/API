<template>
  <v-form ref="form" v-model="valid" lazy-validation>
    <v-expansion-panels accordion multiple v-model="panel">
      <v-expansion-panel>
        <v-expansion-panel-header>General</v-expansion-panel-header>
        <v-expansion-panel-content>
          <v-row justify="center">
            <v-col cols="12" sm="9" class="py-0">
              <v-switch
                v-model="formData.status"
                label="Is active?"
              ></v-switch>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.sku"
                :rules="formDataRules.skuRules"
                :counter="50"
                dense
                outlined
                label="SKU"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.title"
                :rules="formDataRules.titleRules"
                :counter="50"
                dense
                outlined
                label="Name"
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-textarea
                v-model="formData.small_description"
                outlined
                :counter="300"
                label="Small Description"
                dense
                rows="4"
                clearable
                clear-icon="mdi-close-circle"
              ></v-textarea>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-textarea
                v-model="formData.description"
                outlined
                :counter="300"
                label="Description"
                dense
                rows="8"
                clearable
                clear-icon="mdi-close-circle"
              ></v-textarea>
            </v-col>
          </v-row>
        </v-expansion-panel-content>
      </v-expansion-panel>

      <v-expansion-panel>
        <v-expansion-panel-header>SEO</v-expansion-panel-header>
        <v-expansion-panel-content>
          <v-row justify="center">
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.slug"
                :rules="formDataRules.slugRules"
                :counter="60"
                label="Slug"
                placeholder="Puoduct unique slug"
                outlined
                dense
                required
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-text-field
                v-model="formData.meta_title"
                label="Meta Title"
                placeholder="SEO Title"
                dense
                outlined
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="9" class="py-0">
              <v-textarea
                v-model="formData.meta_description"
                outlined
                :counter="170"
                label="Meta Description"
                dense
                rows="3"
                clearable
                clear-icon="mdi-close-circle"
              ></v-textarea>
            </v-col>
          </v-row>
        </v-expansion-panel-content>
      </v-expansion-panel>

      <v-expansion-panel>
        <v-expansion-panel-header>Categories</v-expansion-panel-header>
        <v-expansion-panel-content>
          <v-row>
            <v-col cols="12" md="4" class="py-0">
              <v-treeview
                v-model="selected_categories"
                :items="categories"
                selection-type="independent"
                selectable
                return-object
                open-all
              >
                <template v-slot:label="{ item }">
                  {{ item.title }}
                </template>
              </v-treeview>
            </v-col>
            <v-col cols="12" md="8" class="py-0">
              <template v-if="!selected_categories.length">
                No Category selected.
              </template>
              <template v-else>
                <div v-for="(node, index) in selected_categories" :key="index">
                  {{ node.title }}
                </div>
              </template>
            </v-col>
          </v-row>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </v-expansion-panels>

    <v-btn :disabled="!valid" color="primary" class="my-4" @click="validate">
      Submit
    </v-btn>
  </v-form>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data: () => ({
    valid: true,
    panel: [0],
    selected_categories: [],
    formDataRules: {
      titleRules: [
        v => !!v || "Title is required",
        v => (v && v.length <= 50) || "Title must be less than 50 characters"
      ],
      skuRules: [
        v => !!v || "URL is required",
        v => (v && v.length <= 50) || "URL must be less than 50 characters"
      ],
      slugRules: [
        v => !!v || "URL is required",
        v => (v && v.length <= 50) || "URL must be less than 50 characters"
      ]
    }
  }),
  mounted() {
    this.loadTree();
  },
  computed: {
    formData: {
      get() {
        return this.$store.state.catalogProduct.form;
      }
    },
    categories: {
      get() {
        return this.$store.state.catalogCategory.list;
      }
    }
  },
  methods: {
    ...mapActions({
      submitProductFormData: "catalogProduct/submitProductFormData",
      loadTree: "catalogCategory/loadTree",
      setSelectedCategories: "catalogProduct/setSelectedCategories"
    }),
    validate() {
      let self = this;
      self.panel = [0, 1, 2];
      setTimeout(function() {
        if (self.$refs.form.validate()) {
          self.submitProductFormData(self.selected_categories);
        }
      }, 1000);
    }
  }
};
</script>
