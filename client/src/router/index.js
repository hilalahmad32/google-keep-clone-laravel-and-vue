import Vue from 'vue'
import VueRouter from 'vue-router'
import Notes from '../views/Notes.vue'
import Main from '../views/Main.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import Bins from '../views/Bins.vue'
import Achieve from '../views/Achieve.vue'
Vue.use(VueRouter)

// guest
const guest=(to,from,next)=>{
  if(!localStorage.getItem("token")){
    return next();
  }else{
    return next("/notes")
  }
}

// auth middlware
const auth=(to,from,next)=>{ 
  if(localStorage.getItem("token")){
    return next()
  }else{ 
    return next("/notes")
  }
}

const routes = [
  {
    path:'/',
    name:'main',
    component:Main,
    beforeEnter:guest
    
  },
  {
    path:'/register',
    name:'register',
    component:Register,
    beforeEnter:guest
  },
  {
    path:'/login',
    name:'login',
    component:Login,
    beforeEnter:guest
  },
  {
    path:'/notes',
    name:'notes',
    component:Notes,
    beforeEnter:auth
  },
  {
    path:'/bins',
    name:'bins',
    component:Bins,
    beforeEnter:auth
  },
  {
    path:'/actieve',
    name:'actieve',
    component:Achieve,
    beforeEnter:auth
  },
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
