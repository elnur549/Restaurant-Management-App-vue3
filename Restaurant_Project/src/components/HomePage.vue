<template>
    <div>
      <h1>Hello {{ user_name }}, Welcome to Home Page</h1>
      <table border="1px" v-if="restaurant && restaurant.length">
        <tr>
          <td>User Id</td>
          <td>Name</td>
          <td>Contact</td>
          <td>Address</td>
          <td>Actions</td>
        </tr>
        <tr  v-for="item in restaurant" :key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.contact }}</td>
          <td>{{ item.address }}</td>
          <td id="UpdateDelete">
            <router-link id="router-link" :to="{name: 'Restourant_Update', params: {id: item.id}}" class="update-link">Update</router-link>
            <button style="background-color: red; color: white;" @click="deleteRestaurant(item.id)">Delete</button>
          </td>
        </tr>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: "HomePage",
    data() {
      return {
        user_name: "",
        restaurant: [],
      };
    },
    async mounted() {
      try {
        await this.loadData();
        let user = localStorage.getItem('user-info');
        if (!user) {
          throw new Error("User information not found in localStorage.");
        }
        this.user_name = await JSON.parse(user).name;
        
      } catch (error) {
        console.error("An error occurred while loading user information:", error);
        this.$router.push({ name: 'SignUp' });
        return;
      }
  let username= localStorage.getItem("user-info");
  this.user_name=username.name
      
    },
  
    methods: {
      async deleteRestaurant(id) {
        try {
          let result = await axios.post(`http://127.0.0.1:3500/api/restourant/delete`,{id: id});
          console.log(result.data)
          if (result.status === 200) {
            this.loadData(); 
          }
        } catch (error) {
          console.error("Error deleting restaurant:", error);
        }
      },
  
      async loadData() {
        try {
          let response = await axios.post('http://127.0.0.1:3500/api/members/all'); 
           this.restaurant = response.data;

        } catch (error) {
          console.error("Error loading restaurant data:", error);
        }
      }
    },

    watch:{
        resturant(newVal){
            this.restaurant = newVal
        }
    }
  };
  </script>
  
  <style scoped>
  td {
    width: 160px;
    height: 40px;
  }
  table {
    margin: 5px auto;
  }
  #UpdateDelete {
    display: flex;
    justify-content: center;
    
    
  }
 
  #UpdateDelete button, #router-link {
    width: 100%;
    margin: 1px;
    text-decoration: none;
    cursor: pointer;
   
    
  }
  #UpdateDelete #router-link{
  
    background-color: rgb(0, 0, 136);
    color:white;
   

  }
 
  </style>
  