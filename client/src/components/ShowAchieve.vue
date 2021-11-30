<template >
  <div>
    <v-row>
      <v-col xl="4" md="6" sm="12" v-for="achieves in achieve" :key="achieves.id" >
        <v-card class="p-3" >
          <h3>{{ achieves.title }}</h3>
          <p>{{ achieves.notes }}</p>
          <div class="d-flex justify-content-between">
          <v-btn class="bg-info text-white" v-on:click="rachieve(achieves.id)"  data-toggle="tooltip" data-placement="top" title="Reachieve">R</v-btn>
          <v-btn class="bg-danger text-white" v-on:click="deleteAchieve(achieves.id)" data-toggle="tooltip" data-placement="top" title="Delete">d</v-btn>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>
<script>
import { mapActions, mapGetters } from 'vuex';
export default {
    computed:{
        ...mapGetters('achieve',["achieve"]),
    },

    methods: {
        ...mapActions("achieve",['getAchieve']),

        // reachieve
        ...mapActions('achieve',["rAchieve"]),
        rachieve(id){
        this.rAchieve(id);
        this.getAchieve();
        },
        // delete achieve
        ...mapActions('achieve',["deleteAchives"]),
        deleteAchieve(id){
            this.deleteAchives(id);
            this.getAchieve();
        }
    },

    mounted() {
        this.getAchieve();
    },
    
 };
</script>
<style >
</style>