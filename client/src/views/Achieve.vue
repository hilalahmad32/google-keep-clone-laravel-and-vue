<template>
  <div>
    <div class="d-flex" id="my_nav">
      <div id="sidebar" class="bg-warning">
        <Sidebar />
      </div>
      <div class="w-100" id="content">

        <v-container>
        <Navbar />
        <show-achieve />
        </v-container>
      </div>
    </div>
  </div>
</template>
<script>
import Navbar from "../components/Navbar.vue";
import ShowAchieve from '../components/ShowAchieve.vue';
import Sidebar from "../components/Sidebar.vue";
export default {
  name: "actieve",
  components: {
    Navbar,
    Sidebar,
    ShowAchieve,
  },
};
</script>
<style>
#my_nav {
  position: relative;
}
#sidebar {
  content: "";
  position: fixed;
  width: 20%;
  border-left: 1px solid green;
  height: 100vh;
  top: 0;
  bottom: 0;
}
#content {
  margin-left: 20%;
}
@media screen and (max-with: 1167px) {
  #sidebar {
    display: none;
  }
}
</style>