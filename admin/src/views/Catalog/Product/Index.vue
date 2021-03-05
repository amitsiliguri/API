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
            'items-per-page-options':itemsPerPageOptions
          }"
          :items-per-page="options.itemsPerPage"
          height="450"
          loader-height="2"
          class="elevation-1"
        >

          <template v-slot:top>
            <v-toolbar flat >
              <v-toolbar-title>Products</v-toolbar-title>
              <v-divider class="mx-4" inset vertical></v-divider>
              <v-btn icon>
                <v-icon small> mdi-delete </v-icon>
              </v-btn>
              <v-spacer></v-spacer>
              <v-btn color="primary" depressed dark class="mb-2" to="/catalog/product/create">
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
  import { mapActions} from "vuex";
  export default {
    computed: {
      headers() { return this.$store.state.catalogproduct.headers },
      items() { return this.$store.state.catalogproduct.data },
      loading() { return this.$store.state.catalogproduct.loading },
      itemsPerPageOptions (){ return this.$store.state.catalogproduct.itemsPerPageOptions },
      options: {
        // getter
        get: function () {
          return this.$store.state.catalogproduct.options
        },
        // setter
        set: function (newValue) {
          //set data
          this.setOptionValues(newValue)
          // set url parameter
          let url = new URL(window.location.href)
          url.searchParams.set('page', newValue.page)
          url.searchParams.set('itemsPerPage', newValue.itemsPerPage)
          history.pushState(null, document.title, url.toString())
          // load table data
          this.loadProducts({
            page : newValue.page,
            itemsPerPage : newValue.itemsPerPage
          })
        }
      }
    },
    mounted () {
      let url = new URL(window.location.href)
      if (url.searchParams.get('page')) {
        this.options.page = url.searchParams.get('page')
      }else{
        this.options.page = 1
      }
      if (url.searchParams.get('itemsPerPage')) {
        this.options.itemsPerPage = 10
        // this.options.itemsPerPage = this.findClosest( this.itemsPerPageOptions , url.searchParams.get('itemsPerPage') )  // ClosestInArray mixin
      }else{
        this.options.itemsPerPage = 10
      }
    },
    methods : {
      ...mapActions(
        {
          loadProducts : "catalogproduct/loadProducts",
          setOptionValues : "catalogproduct/setOptionValues"
        }
      )
    }
  }
</script>