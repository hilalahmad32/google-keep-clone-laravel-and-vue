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
          <v-card>
            <v-card-text>
              <h1>Register</h1>
            </v-card-text>
            <v-container>
              <form enctype="multipart/form-data" @submit="RegisterUser">
                <v-text-field
                  v-model="form.name"
                  placeholder="Enter Your Name"
                ></v-text-field>
                <v-text-field
                  v-model="form.email"
                  placeholder="Enter Your Email"
                ></v-text-field>
                <v-text-field
                  v-model="form.password"
                  type="password"
                  placeholder="Enter Your Password"
                ></v-text-field>
               <input type="file" class="form-control form-control-lg" @change="onchange" name="" id="">
                <div class="d-flex justify-content-between mt-3">
                  <v-btn type="submit" class="bg-primary">Register</v-btn>
                  <v-btn class="bg-info">Login</v-btn>
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
import {mapActions} from 'vuex'
export default {
  name: "register",
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        image: "",
      },
    };
  },
  methods: {
      ...mapActions('auth',['sendRegistration']),
    onchange(e) {
      this.form.image = e.target.files[0];
    },
    RegisterUser(e){
        e.preventDefault();
        const formData=new FormData();
        formData.append("name",this.form.name);
        formData.append("email",this.form.email);
        formData.append("password",this.form.password);
        formData.append("image",this.form.image);

        this.sendRegistration(formData);

    }
  },
};
</script>
<style>
</style>