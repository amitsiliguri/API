<template>
  <v-list-group :value="false" no-action :prepend-icon="icon">
    <template v-slot:activator>
      <v-list-item-content>
        <v-list-item-title>{{ name }}</v-list-item-title>
      </v-list-item-content>
    </template>
    <v-list-item v-for="(item, i) in children" :key="i" link :to="item.to">
      <v-list-item-title v-text="item.title"></v-list-item-title>
      <v-list-item-icon>
        <v-icon v-text="item.icon"></v-icon>
      </v-list-item-icon>
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
    name: {
      type: String,
      required: true
    },
    icon: {
      type: String,
      required: true
    }
  }
};
</script>
