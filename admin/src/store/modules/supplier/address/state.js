export default {
  form: {
    id: null,
    building_name: "",
    floor: "",
    street: "",
    landmark: "",
    city: "",
    state: "",
    country: "",
    zip: "",
    phone: "",
    supplier_id: null
  },
  defaultForm: {
    id: null,
    building_name: "",
    floor: "",
    street: "",
    landmark: "",
    city: "",
    state: "",
    country: "",
    zip: "",
    phone: "",
    supplier_id: null
  },
  editedIndex: -1,
  //table
  headers: [
    {
      text: "Building Name",
      align: "left",
      sortable: false,
      value: "building_name"
    },
    { text: "Street", align: "left", sortable: false, value: "street" },
    { text: "City", align: "left", sortable: false, value: "city" },
    { text: "State", align: "left", sortable: false, value: "state" },
    { text: "Zip", align: "left", sortable: false, value: "zip" },
    { text: "Phone", align: "left", sortable: false, value: "phone" },
    { text: "Actions", align: "right", value: "actions", sortable: false }
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
  //modal
  dialog: false
};
