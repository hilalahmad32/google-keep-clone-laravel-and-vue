import axios from "axios"


export default ({
    namespaced: true,
    state: {
        achieve: [],
    },
    getters: {
        achieve: (state) => {
            return state.achieve;
        }
    },
    mutations: {
        setAchieve(state, achieve) {
            state.achieve = achieve;
        }
    },
    actions: {
        async addAchieves(_, id) {
            const config = {
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("token"),
                }
            }
            const response = await axios.patch(`http://127.0.0.1:8000/api/addAchive/${id}`, _, config);
            if (response.data.success) {
                alert("Achive Add Successfully");
            } else {
                alert("Achive not add");
            }
        },
        async getAchieve({ commit }) {
            const config = {
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("token"),
                }
            }
            const response = await axios.get("http://127.0.0.1:8000/api/getAchive", config);
            commit("setAchieve", response.data.achieve);
        },
        async rAchieve(_, id) {
            const config = {
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("token"),
                }
            }
            const response = await axios.patch(`http://127.0.0.1:8000/api/rachieve/${id}`, _, config);
            if (response.data.success) {
                alert("Rachive Add Successfully");
            } else {
                alert("Rachive not add");
            }

        },
        async deleteAchives(_, id) {
            const config = {
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("token"),
                }
            }
            const response = await axios.patch(`http://127.0.0.1:8000/api/deleteAchive/${id}`, _, config);
            if (response.data.success) {
                alert("Rachive Add Successfully");
            } else {
                alert("Rachive not add");
            }
        }
    },
})
