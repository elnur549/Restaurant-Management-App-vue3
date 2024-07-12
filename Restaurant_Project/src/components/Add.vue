<template>
    
   <h1>Welcome to Add Restourant Page</h1>
   <div class="add">
<div>
    <input type="text" name="name" placeholder="Enter Restaurant name" 
    @input="resetError($event,'name')"
    :class="{'failed': errors && errors['name']}" 
    v-model="Restaurant.name">
    <div v-if="errors && errors['name']">
       <p class="error-message">{{ errors['name'] }}</p>
   </div>
</div>   

<div>
    <input type="text" name="address" placeholder="Enter Address"
    :class="{'failed': errors && errors['address']}" 
    @input="resetError($event,'address')"
    v-model="Restaurant.address">
    <div v-if="errors && errors['address']">
       <p class="error-message">{{ errors['address'] }}</p>
   </div>
</div>
<div>
    <input type="text"  placeholder="Enter contact number" 
    :class="{'failed': errors && errors['contact']}"
    @input="resetError($event,'contact')"
    v-model="Restaurant.contact">
    <div v-if="errors && errors['contact']">
       <p class="error-message">{{ errors['contact'] }}</p>
   </div>
</div>
<button type="button" v-on:click="addRestaurant()">Add new restaurant</button>

   </div>


</template>


<script>
import axios from 'axios';
export default {
    name:"Add-page",
    
        
    
    data(){
        return{
            Restaurant:{
                id:'',
                name:'',
                address:'',
                contact:''
            },
            errors: []
        }
    },
    methods:{
     addRestaurant(){
         try{
             axios.post("http://127.0.0.1:3500/api/restourant/store",
            {...this.Restaurant})
            .then(response=>{
                if(response.status==200){
                this.Restaurant.id
                console.log(response);
                this.$router.push({name:"Home"})

                return response
            }
            }).catch(error=>{
                Object.keys(error.response.data.errors).forEach(key=>{
                    this.errors[key] = error.response.data.errors[key][0]
                })
                console.log(error)
            });
        
        
         }catch(error){
            console.log(error)
         }
            
        },

        resetError(event,input){
          this.errors[input] = null
    
        }
    },
    async mounted() {
        // Kullanıcı bilgisi kontrolü
        let user = localStorage.getItem('user-info');

        if (!user) {
            this.$router.push({ name: 'SignUp' });
            return;
        }
}}
</script>

<style scoped lang="css">
input:focus{
    outline: none;
}
.failed{
    border: 1px solid red;
    placeholder{
        color: red;
    }
}

.failed::placeholder{
    color: red;

}

.error-message{
    font-family: Verdena;
    font-size: 12px;
    color: red;
}
</style>