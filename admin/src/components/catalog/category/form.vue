<template>
    <v-form ref="form" v-model="formDataRules.valid" lazy-validation>
        <h4 class="title">General</h4>
        <v-switch v-model="formData.status" flat :label="`Switch 1: ${formData.status.toString()}`" ></v-switch>
        <v-text-field v-model="formData.title" :counter="50" dense outlined :rules="formDataRules.titleRules" label="Name" required ></v-text-field>
        <v-textarea v-model="formData.short_description" :counter="300" :rules="formDataRules.short_description_rules" clearable clear-icon="mdi-close-circle" outlined label="Short description" ></v-textarea>
        <v-file-input v-model="formData.banner" prepend-icon="mdi-camera" :rules="formDataRules.banner_rules" accept="image/png, image/jpeg, image/jpg" outlined dense label="Banner"></v-file-input>
        <h4 class="title">SEO</h4>
        <v-text-field v-model="formData.slug" :counter="50" dense outlined :rules="formDataRules.slugRules" label="URL" required ></v-text-field>
        <v-text-field v-model="formData.meta_title" :counter="50" dense outlined label="Meta title" required ></v-text-field>
        <v-textarea v-model="formData.meta_description" :counter="170" :rules="formDataRules.short_description_rules" clearable clear-icon="mdi-close-circle" outlined label="Meta description" ></v-textarea>
        <v-file-input v-model="formData.meta_banner" prepend-icon="mdi-camera" :rules="formDataRules.banner_rules" accept="image/png, image/jpeg, image/jpg" outlined dense label="Meta Banner"></v-file-input>
        <v-btn :disabled="!formDataRules.valid" color="success" class="mr-4" @click="validate" >
            Submit
        </v-btn>
        <v-btn color="warning" @click="resetValidation" >
            Reset Validation
        </v-btn>
    </v-form>
</template>

<script>
    import { mapActions} from "vuex";
    export default {
        computed: {
            formData: {
                get() {
                    return this.$store.state.catalogcategory.form
                }
            },
            formDataRules: {
                get() {
                    return this.$store.state.catalogcategory.formRules
                }
            }
        },
        methods: {
            ...mapActions(
                {
                    submitFormData : "catalogcategory/submitFormData"
                }
            ),
            validate () {
                if (this.$refs.form.validate()) {
                    this.submitFormData()
                }
            },
            resetValidation () {
                this.$refs.form.resetValidation()
            },
        },
  }
</script>