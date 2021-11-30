<template>
  <div>
    <v-row>
      <v-col xl="8" md="8" sm="12" class="offset-xl-2 offset-md-2 offset-sm-0">
        <v-card class="w-100">
          <v-text-field
          v-on:click="Showdsc"
            id="input"
            v-model="title"
            class="p-3"
            placeholder="Take Note"
          ></v-text-field>
          <span v-if="show">
            <v-textarea
            v-model="notes"
              placeholder="Descritpion"
              auto-grow
              rows="1"
              class="p-3"
              id="input"
            ></v-textarea>
            <div class="d-flex justify-content-between px-3 pb-3">
              <v-btn type="submit" v-on:click="addNotes" class="bg-primary mr-3">Save</v-btn>
              <v-btn class="bg-default" v-on:click="closedes">Close</v-btn>
            </div>
          </span>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>
<script>
import { mapActions } from 'vuex';
export default {
  name: "add-notes",
  data() {
    return {
      show: false,
      title:"",
      notes:"",      
    };
  },

  methods:{
      Showdsc(){
          this.show=true;
      },
      closeDesc(){
          this.show=false;
      },
      closedes(){
          this.closeDesc();
      },
      changeColor(){
          this.color="red";
      },
      ...mapActions('notes',['sendAddNotes']),
      ...mapActions('notes',['getNotes']),
      addNotes(){
        const data={
          title:this.title,
          notes:this.notes,
        }
        this.sendAddNotes(data).then(()=>{
          this.title="";
          this.notes="";
          this.closeDesc()
          this.getNotes()
        });
      }
  },
};
</script>
<style>
#input {
  border: none !important;
}
</style>