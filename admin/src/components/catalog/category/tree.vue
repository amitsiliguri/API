<template>
    <draggable class="dragArea" tag="ul" :list="tasks" :group="{ name: 'g1' }">
        <li v-for="el in tasks" :key="el.name">
            <div class="bar">
                <v-btn icon>
                    <v-icon>mdi-menu-right</v-icon>
                </v-btn>
                <span class="node-name">{{ el.name }}</span>
                <v-btn icon>
                    <v-icon>mdi-delete</v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>mdi-pencil</v-icon>
                </v-btn>
            </div>
            <nested-draggable :tasks="el.tasks" />
        </li>
    </draggable>
</template>

<script>
    import draggable from "vuedraggable";
    export default {
    props: {
        tasks: {
            required: true,
            type: Array
        }
    },
    components: {
        draggable
    },
    name: "nested-draggable"
    };
</script>

<style lang="scss" scoped>
    .dragArea {
        list-style-type: none;
        margin-left: 0;
        padding-left: 0px;
        li{
            padding-left: 5px;
            .bar{
                display: flex;
                margin-bottom: 16px;
                .node-name{
                    padding: 5px;
                    cursor: all-scroll;
                    flex-grow: 1;
                }
            }
            ul{
                li{
                    padding-left: 24px;
                }
            }
        }
    }
</style>