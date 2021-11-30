<template>
  <div>
    <v-container>
      <v-row>
        <v-col
          xl="6"
          md="8"
          sm="12"
          class="offset-xl-3 offset-md-2 offset-sm-12"
        >
          <v-card >
            <v-card-text>
              <h1>Login</h1>
            </v-card-text>
            <v-container>
              <form @submit="login">
                <v-text-field v-model="email" placeholder="Enter Your Email"></v-text-field>
                <v-text-field
                  type="password"
                  v-model="password"
                  placeholder="Enter Your Password"
                ></v-text-field>
                <div class="d-flex justify-content-between">
                  <v-btn type="submit"  class="bg-primary"
                    >Login
                  </v-btn>
                 <router-link to="/register"> <v-btn  class="bg-info" id="ml-10"
                    >Register</v-btn
                  ></router-link>
                </div>
              </form>
            </v-container>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
import { mapActions } from 'vuex';
export default {
  name: "login",
  data() {
    return {
      email:"",
      password:"",
    }
  },
  methods: {
  ...mapActions('auth',['sendLogin']),
  login(e){
    e.preventDefault();
    const data={
      email:this.email,
      password:this.password,
    };
    this.sendLogin(data);
  }

  },
};
</script>
<style>
</style>