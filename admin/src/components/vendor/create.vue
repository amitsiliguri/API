<template>
    <v-form ref="form" lazy-validation>
        <v-btn color="primary" class="my-4">
            Submit
        </v-btn>

        <v-expansion-panels accordion multiple>
            <v-expansion-panel>
                <v-expansion-panel-header>General</v-expansion-panel-header>
                <v-expansion-panel-content>
                    <v-row>
                        <v-col cols="12" class="py-0">
                            <v-switch flat label="Is active?" ></v-switch>
                        </v-col>
                        <v-col cols="12" sm="6" md="3" class="py-0">
                            <v-text-field :counter="50" dense outlined label="prefix" required ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="3" class="py-0">
                            <v-text-field :counter="50" dense outlined label="First Name" required ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="3" class="py-0">
                            <v-text-field :counter="50" dense outlined label="Middle Name" required ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="3" class="py-0">
                            <v-text-field :counter="50" dense outlined label="Last Name" required ></v-text-field>
                        </v-col>
                        
                    </v-row>
                </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel>
                <v-expansion-panel-header>Addresses</v-expansion-panel-header>
                <v-expansion-panel-content>
                    <v-row>
                       
                    </v-row>
                </v-expansion-panel-content>
            </v-expansion-panel>


            <v-expansion-panel>
                <v-expansion-panel-header>Purchases</v-expansion-panel-header>
                <v-expansion-panel-content>
                    <v-row>
                       
                    </v-row>
                </v-expansion-panel-content>
            </v-expansion-panel>

        </v-expansion-panels>
    </v-form>
</template>