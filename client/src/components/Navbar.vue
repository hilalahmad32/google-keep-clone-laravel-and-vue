<template>
  <div>
    <v-card class="bg-primary text-white">
      <v-container class="d-flex justify-content-between align-items-center">
        <div class="search">
          <v-text-field
            v-model="name"
            placeholder="Seach Here...."
          ></v-text-field>
        </div>
        <div class="logout">
          <v-btn v-on:click="logout()" color="bg-primary text-white">Logout</v-btn>
        </div>
      </v-container>
    </v-card>
  </div>
</template>
<script>
import { mapActions } from 'vuex';
export default {
  methods: {
    ...mapActions('auth',['sendLogout']),
    logout(){
      this.sendLogout();
    }
  },
};
</script>
<style>
</style>