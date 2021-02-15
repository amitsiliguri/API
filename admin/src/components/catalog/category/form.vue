<template>
    <v-form ref="form" v-model="valid" lazy-validation>
        <h4 class="title">General</h4>
        <v-switch v-model="formData.status" flat label="Is active?" ></v-switch>
        <v-text-field v-model="formData.title" :counter="50" dense outlined :rules="formDataRules.titleRules" label="Name" required ></v-text-field>
        <v-textarea v-model="formData.short_description" :counter="300" maxlength="300" clearable clear-icon="mdi-close-circle" outlined label="Short description" ></v-textarea>
        <v-file-input v-model="formData.banner" prepend-icon="mdi-camera" :rules="formDataRules.banner_rules" accept="image/png, image/jpeg, image/jpg" outlined dense label="Banner"></v-file-input>
        <h4 class="title">SEO</h4>
        <v-text-field v-model="formData.slug" :counter="50" dense outlined :rules="formDataRules.slugRules" label="URL" required ></v-text-field>
        <v-text-field v-model="formData.meta_title" :counter="50" dense outlined label="Meta title" required ></v-text-field>
        <v-textarea v-model="formData.meta_description" :counter="170"  maxlength="170" clearable clear-icon="mdi-close-circle" outlined label="Meta description" ></v-textarea>
        <v-file-input v-model="formData.meta_banner" prepend-icon="mdi-camera" :rules="formDataRules.banner_rules" accept="image/png, image/jpeg, image/jpg" outlined dense label="Meta Banner"></v-file-input>
        <v-btn :disabled="!valid" color="primary" class="mr-4" @click="validate" >
            Submit
        </v-btn>
    </v-form>
</template>

<script>
    import { mapActions} from "vuex";
    export default {
        data: () => ({
            valid: true,
            formDataRules : {
                titleRules: [
                    v => !!v || 'Title is required',
                    v => (v && v.length <= 50) || 'Title must be less than 50 characters',
                ],
                banner_rules: [
                    value => !value || value.size < 512000 || 'Avatar size should be less than 512 KB!',
                ], 
                slugRules: [
                    v => !!v || 'URL is required',
                    v => (v && v.length <= 50) || 'URL must be less than 50 characters',
                ]
            },
        }),
        computed: {
            formData: {
                get() {
                    return this.$store.state.catalogcategory.form
                }
            }
        },
        watch: {
            '$store.state.catalogcategory.resetForrm': function (val) {
                if (val) {
                    this.$refs.form.reset()
                    this.resetForm()
                }
            },
        },
        methods: {
            ...mapActions(
                {
                    submitFormData : "catalogcategory/submitFormData",
                    resetForm : "catalogcategory/resetForm"
                }
            ),
            validate () {
                if (this.$refs.form.validate()) {
                    this.submitFormData()
                }
            }
        }
  }
</script>