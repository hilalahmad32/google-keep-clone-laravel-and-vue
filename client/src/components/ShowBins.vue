<template >
  <div>
    <v-row>
      <v-col xl="4" md="6" sm="12" v-for="bins in bin" :key="bins.id" >
        <v-card class="p-3" >
          <h3>{{ bins.title }}</h3>
          <p>{{ bins.notes }}</p>
          <div class="d-flex justify-content-between">
          <v-btn class="bg-info text-white" v-on:click="recycleBins(bins.id)"  data-toggle="tooltip" data-placement="top" title="ReCycle">R</v-btn>
          <v-btn class="bg-danger text-white" v-on:click="deleteNotes(bins.id)"  data-toggle="tooltip" data-placement="top" title="Full Delete">d</v-btn>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters("bins", ["bin"]),
  },
  methods: {
    // gets notes from the bin table
    ...mapActions("bins", ["getBinNotes"]),
    // gets notes from the notes table
    ...mapActions('notes',['getNotes']),
    // recycle bin the notes
    ...mapActions('bins',['recycleBinsNotes']),
    recycleBins(id){
      this.recycleBinsNotes(id);
      this.getBinNotes();
      this.getNotes();
    },
    // delete 
    ...mapActions('bins',['fullDeleteNotes']),
    deleteNotes(id){
      this.fullDeleteNotes(id);
      this.getBinNotes();
    }
  },
  mounted() {
    this.getBinNotes();
  },
};
</script>
<style >
</style>