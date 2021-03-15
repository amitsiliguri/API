export default {
  form: {
    prefix: 'Mr.',
    first_name: "",
    middle_name: "",
    last_name: "",
    job_title: "",
    email: "",
    phone: "",
    gender: "Male"
  },
  defaultForm: {
    prefix: 'Mr.',
    first_name: "",
    middle_name: "",
    last_name: "",
    job_title: "",
    email: "",
    phone: "",
    gender: "Male"
  },
  editedIndex: -1,
  //table
  headers: [
    {
      text: "First Name",
      align: "left",
      sortable: false,
      value: "first_name"
    },
    { text: "Last Name", align: "left", sortable: false, value: "last_name" },
    { text: "Job Title", align: "left", sortable: false, value: "job_title" },
    { text: "Email", align: "left", sortable: false, value: "email" },
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
