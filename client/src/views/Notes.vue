<template>
  <div>
    <div class="d-flex" id="my_nav">
      <div id="sidebar" class="bg-warning">
        <Sidebar />
      </div>
      <div class="w-100" id="content">

        <v-container>
        <Navbar />

          <add-notes />
          <show-notes />
        </v-container>
      </div>
    </div>
  </div>
</template>
<script>
import AddNotes from "../components/AddNotes.vue";
import Navbar from "../components/Navbar.vue";
import ShowNotes from "../components/ShowNotes.vue";
import Sidebar from "../components/Sidebar.vue";
export default {
  name: "navbar",
  components: {
    Navbar,
    Sidebar,
    AddNotes,
    ShowNotes,
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