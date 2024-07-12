<template>
    <h1>Welcome {{ user_name }} to Update Page</h1>
    <div v-if="!loading === true"> 
        <div class="add">
   <input type="text" name="name" placeholder="Enter Restaurant name" v-model="Restaurant.name">
   <input type="text" name="address" placeholder="Enter Address" v-model="Restaurant.address">
   <input type="text" name="contact" placeholder="Enter contact number" v-model="Restaurant.contact">
   <button type="button" v-on:click="updateRestaurant">Update restaurant</button>
   
     </div>

    </div>
    <div v-else>
        Loading data...
    </div>
   
 </template>
 
 
 <script>
 import axios from 'axios';
 export default {
     name:"Update-page",
     data(){
         return{
            Restaurant:{
                
                name:'',
                address:'',
                contact:'',
                user_name:''
            },
            loading: true,
         }
     },
     methods:{
        async updateRestaurant(){
        
            const resault = await axios.put("http://127.0.0.1:3500/api/restourant/edit",{
                id: this.$route.params.id,
                name:this.Restaurant.name,
                address:this.Restaurant.address,
                contact:this.Restaurant.contact,
            });
        
            if(resault.status===200){
            
                this.$router.push({name:"Home"})
            }
        }
     },
    
     mounted() {
        // Kullanıcı bilgisi kontrolü
        let user = localStorage.getItem('user-info');
this.user_name=user.name
        if (!user) {
            
            this.$router.push({ name: 'SignUp' });
          
        }
         axios.post('http://127.0.0.1:3500/api/restourant/update/',{id: this.$route.params.id}).then(response =>{
            this.Restaurant = response.data
            return response
        }).then(res=>{
            this.loading = false
            return res
        }).catch(error=>{
            console.log(error)
            this.loading = false
        })
        
},
watch:{
    loading(newVal){
        this.loading = newVal
    }
}
 }
 </script>