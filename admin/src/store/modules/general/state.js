export default {
    snackbar: false,
    snackbar_text: '',
    loader: false,
    menu : [
        { 
            title: 'Dashboard', 
            icon: 'mdi-view-dashboard', 
            to : '/dashboard',
            children : []
        },
        {
            title: 'Sales',
            icon: 'mdi-currency-inr',
            to : '#',
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
            title: 'Vendor',
            icon: 'mdi-account',
            to : '#',
            children : [
                {
                    title: 'Vendor list',
                    icon: 'mdi-format-list-bulleted-type',
                    to : '/vendor/list',
                    children : []
                },
                {
                    title: 'Purchase',
                    icon: 'mdi-basket',
                    to : '/purchase/list',
                    children : []
                }
            ]
        },
    ],
}