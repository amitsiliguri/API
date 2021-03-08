<template>
  <v-list dense nav>
    <template v-for="(item, index) in $store.state.general.menu">
      <template v-if="item.children.length > 0">
        <menuGroup
          :children="item.children"
          :name="item.title"
          :icon="item.icon"
          :key="index"
        ></menuGroup>
      </template>
      <template v-else>
        <v-list-item :key="index" link :to="item.to">
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </template>
    </template>
  </v-list>
</template>

<script>
import menuGroup from "@/components/MenuGroup";
export default {
  name: "MainMenu",
  components: {
    menuGroup
  }
};
</script>
