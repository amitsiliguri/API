export default {
  form: {
    status: "Active",
    legal_name: "",
    register_number: "",
    email: "",
    phone: "",
    address: {
      building_name: "",
      floor: "",
      street: "",
      landmark: "",
      city: "",
      state: "",
      country: "",
      zip: "",
      phone: ""
    },
    contact_person: {
      job_title: "",
      prefix: "",
      first_name: "",
      middle_name: "",
      last_name: "",
      email: "",
      phone: "",
      gender: ""
    }
  },
  //table
  headers: [
    { text: "Leagal Name", sortable: false, value: "legal_name" },
    { text: "Status", sortable: false, value: "status" },
    { text: "Email", sortable: false, value: "email" },
    { text: "Phone", sortable: false, value: "phone" },
    { text: "Register Number", sortable: false, value: "register_number" },
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
};
