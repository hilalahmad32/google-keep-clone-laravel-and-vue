<template >
  <div>
    <div class="p-4">
      <div class="imag m-auto">
        <img :src="file + users.image" id="img" alt="" />
        <h5>{{ users.name }}</h5>
      </div>
      <div class="links mt-4">
        <router-link to="/notes" class="nav-link nav-item">
          <v-btn class="w-100 p-3" id="btn">Notes </v-btn></router-link
        >
      </div>
      <div class="links mt-4">
        <router-link to="/actieve" class="nav-link nav-item">
          <v-btn class="w-100 p-3" id="btn">Achive</v-btn></router-link
        >
      </div>
      <div class="links mt-4">
        <router-link to="/bins" class="nav-link nav-item">
          <v-btn class="w-100 p-3" id="btn">Bin</v-btn></router-link
        >
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default {
  name: "sidebar",
  data() {
    return {
      file: `http://127.0.0.1:8000/storage/`,
    };
  },
  computed: {
    ...mapGetters("auth", ["users"]),
  },
  methods: {
    ...mapActions("auth", ["getUsers"]),
  },
  mounted() {
    this.getUsers();
  },
};
</script>
<style>
#btn {
  border-radius: 50px;
  background-color: transparent;
  color: white;
}
#img {
  width: 100%;
  height: 100%;
  border-radius: 100%;
}
.imag {
  width: 50%;
}
</style>