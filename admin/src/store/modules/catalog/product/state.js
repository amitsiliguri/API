export default {
  headers: [
    { 
      text: 'Image', 
      sortable: false, 
      value: 'images' 
    },
    { 
      text: 'SKU', 
      sortable: false, 
      value: 'sku' 
    },
    { 
      text: 'Title', 
      sortable: false, 
      value: 'title' 
    },
    { 
      text: 'Status', 
      sortable: false, 
      value: 'status' 
    },
    { 
      text: 'Price', 
      sortable: false, 
      value: 'base_price' 
    },
    { 
      text: 'Inventory (Total)', 
      sortable: false, 
      value: 'inventories' 
    },
    { 
      text: 'Actions', 
      value: 'actions', 
      sortable: false 
    },
  ],
  selected: [],
  totalCategories: 0,
  categories: [],
  loading: false,
  options: {
    page: 1,
    itemsPerPage: 0,
    multiSort: false,
    mustSort: false
  },
  itemsPerPageOptions:[10, 20, 30, 50, 100],
  data:[]
}