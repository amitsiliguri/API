<template>
    <v-list-group :value="false" no-action :prepend-icon="icon"> 
        <template v-slot:activator>
            <v-list-item-content>
            <v-list-item-title>{{name}}</v-list-item-title>
            </v-list-item-content>
        </template> 
        <v-list-item v-for="([title, icon], i) in children" :key="i" link>
            <v-list-item-icon>
            <v-icon v-text="icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-title v-text="title"></v-list-item-title>
        </v-list-item>         
    </v-list-group>
</template>

<script>
export default {
    props: {
        children: {
            type: Array,
            required: true
        },
        name : {
            type: String,
            required: true
        },
        icon : {
            type: String,
            required: true
        }
    }
}
</script>