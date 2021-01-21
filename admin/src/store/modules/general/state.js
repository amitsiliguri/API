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
            to : '/about',
            children : [
                {
                    title: 'Catalog',
                    icon: 'mdi-basket',
                    to : '/about',
                    children : []
                },
                {
                    title: 'Product',
                    icon: 'mdi-basket',
                    to : '/about',
                    children : []
                },
                {
                    title: 'Warehouse',
                    icon: 'mdi-basket',
                    to : '/about',
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