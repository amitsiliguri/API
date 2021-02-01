export default {
    snackbar: false,
    snackbar_text: '',
    menu : [
        { 
            title: 'Dashboard', 
            icon: 'mdi-view-dashboard', 
            to : '/dashboard',
            children : []
        },
        {
            title: 'Catalog',
            icon: 'mdi-basket',
            to : '#',
            children : [
                {
                    title: 'Category',
                    icon: 'mdi-format-list-bulleted-type',
                    to : '/catalog/category',
                    children : []
                },
                {
                    title: 'Product',
                    icon: 'mdi-basket',
                    to : '/catalog/product',
                    children : []
                },
                {
                    title: 'Warehouse',
                    icon: 'mdi-home',
                    to : '/catalog/warehouse',
                    children : []
                }
            ]
        },
        {
            title: 'Sales',
            icon: 'mdi-account-multiple-outline',
            to : '#',
            children : []
        },
    ],
}