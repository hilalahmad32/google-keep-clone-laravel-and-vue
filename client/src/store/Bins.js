import axios from "axios"


export default ({
    namespaced: true,
    state: {
        bin: [],
    },
    getters: {
        bin:(state)=>{
            return state.bin;
        }
    },
    mutations: {
        setBins(state,bin){
            state.bin=bin;
        }
    },
    actions: {
        async getBinNotes({ commit }) {
            const config = {
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("token"),
                }
            }
            const response = await axios.get('http://127.0.0.1:8000/api/getBin', config);
            commit('setBins', response.data.bins);
        },

        async recycleBinsNotes(_,id){
            const config = {
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("token"),
                }
            }
            const response = await axios.patch(`http://127.0.0.1:8000/api/recycleBin/${id}`, _,config);
            if(response.data.success){
                alert("Data restore Successfully");
            }else{
                alert("Some problem are found");
            }
        },

        async fullDeleteNotes(_,id){
            const config = {
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("token"),
                }
            }
            const response = await axios.delete(`http://127.0.0.1:8000/api/fulldeleteBin/${id}`,config);
            if(response.data.success){
                alert("Data Delete Successfully");
            }else{
                alert("Some problem are found");
            }
        }
    }
})
