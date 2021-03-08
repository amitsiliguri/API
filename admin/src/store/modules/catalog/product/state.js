export default {
  //table
  headers: [
    { text: "Image", sortable: false, value: "images" },
    { text: "SKU", sortable: false, value: "sku" },
    { text: "Title", sortable: false, value: "title" },
    { text: "Status", sortable: false, value: "status" },
    { text: "Price", sortable: false, value: "base_price" },
    { text: "Inventory (Total)", sortable: false, value: "inventories" },
    { text: "Actions", value: "actions", sortable: false }
  ],
  data: [],
  selected: [],
  totalCategories: 0,
  categories: [],
  loading: false,
  options: {
    page: 1,
    itemsPerPage: 10,
    multiSort: false,
    mustSort: false
  },
  itemsPerPageOptions: [10, 20, 30, 50, 100],
  //form
  form: {
    id: null,
    status: true,
    sku: "",
    title: "",
    small_description: "",
    description: "",
    base_price: 0.0,
    slug: "",
    meta_title: "",
    meta_description: "",
    meta_image: null,
    categories: []
  }
};
