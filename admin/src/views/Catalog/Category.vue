<template>
  <v-container>
    <v-row>
      <v-col cols="12" md="4">
        <h3>Categories</h3>
        <categorytree :tasks="list"></categorytree>
      </v-col>
      <v-col cols="12" md="7">
        <categoryform></categoryform>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
  import { mapActions} from "vuex";
  import categorytree from '@/components/catalog/category/tree'
  import categoryform from '@/components/catalog/category/form'
  export default {
    name: "Category",
    components : {
      categorytree,
      categoryform
    },
    computed: {
        list: {
            get() {
                return this.$store.state.catalogcategory.list
            },
            set(value) {
              // console.log(value);
              this.updateTree(value)
            }
        }
    },
    methods : {
    ...mapActions(
      {
        updateTree : "catalogcategory/updateTree"
      }
    )
  }
  }
</script>
