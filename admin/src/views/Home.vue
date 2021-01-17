<template>
  <v-container fluid fill-height>
    <v-layout flex align-center justify-center>
      <v-form v-model="valid">
        <v-card class="mx-auto" max-width="400" min-width="390">
          <v-card-title>
            <v-icon large left> mdi-login </v-icon>
            <span class="title font-weight-light">Login</span>
          </v-card-title>
          <v-divider></v-divider>
          <v-progress-linear indeterminate v-if="$store.state.user.login_form_processing"></v-progress-linear>
          <v-card-text>
            <v-text-field v-model="loginFormInputs.email" label="Email" dense outlined clearable class="mt-4"></v-text-field>
            <v-text-field 
              v-model="loginFormInputs.password" 
              autocomplete="password" 
              :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append="showPassword = !showPassword"
              label="Password" 
              :type="showPassword ? 'text' : 'password'" 
              dense 
              outlined 
              clearable 
              class="mt-2">
            </v-text-field>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <v-btn text outlined class="ml-2" @click="requestLogin()" :disabled="$store.state.user.login_form_processing">Submit</v-btn>
            <v-spacer></v-spacer>
            <v-btn text  :disabled="$store.state.user.login_form_processing">Forget Password ?</v-btn>
          </v-card-actions>
        </v-card>
      </v-form>
    </v-layout>
  </v-container>
</template>

<script>
import { mapActions} from "vuex";
export default {
  name: "Home",
  data: () => ({
    valid: false,
    showPassword : false
  }),
  computed: {
    loginFormInputs () {
      return this.$store.state.user.login
    }
  },
  methods : {
    ...mapActions(
      {
        requestLogin : "user/requestToken"
      }
    )
  }
};
</script>
