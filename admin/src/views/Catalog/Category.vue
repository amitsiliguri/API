<template>
  <v-container>
    <v-row>
      <v-col cols="12" md="4">
        <div class="d-flex justify-space-between align-center">
          <h3>Categories</h3>
          <v-btn icon @click="saveReorder()">
            <v-icon>mdi-sync</v-icon>
          </v-btn>
        </div>

        <categorytree :tasks="list"></categorytree>
      </v-col>
      <v-col cols="12" md="7">
        <categoryform></categoryform>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import { mapActions } from "vuex";
import categorytree from "@/components/catalog/category/tree";
import categoryform from "@/components/catalog/category/form";
export default {
  name: "Category",
  components: {
    categorytree,
    categoryform
  },
  computed: {
    list: {
      get() {
        return this.$store.state.catalogCategory.list;
      }
    }
  },
  mounted() {
    this.loadTree();
  },
  methods: {
    ...mapActions({
      saveReorder: "catalogCategory/saveReorder",
      loadTree: "catalogCategory/loadTree"
    })
  }
};
</script>
