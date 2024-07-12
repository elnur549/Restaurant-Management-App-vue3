<template>
  
    <h1>Sign Up</h1>
    <div class="register">
        <input v-model="name" type="text" placeholder="Enter name"/>
        <input v-model="email" type="E-mail" placeholder="Enter E-mail"/>
        <input v-model="password" type="Password" placeholder="Enter Password"/>
<button v-on:click="signUp">Sign Up</button>
    </div>
    <router-link to="/LoginPage">Login</router-link>

</template>


<script>
import axios from 'axios'
export default{
    
    name:'SignUp',

    data(){
        return{
            name:'',
            email:'',
            password:''
        }
    },
    methods:
    {
        async signUp() {
  try {
    let result = await axios.post("http://localhost:3000/users", {
      email: this.email,
      password: this.password,
      name: this.name
    });
    console.warn(result);
    if (result.status == 201) {
      alert("Qeydiyyat uğurla başa çatdı");

      localStorage.setItem("user-info", JSON.stringify(result.data));
      
      this.$router.push({ name: "LoginPage" });
    }
  } catch (error) {
    console.error("Sorğu zamanı səhv:", error);
    // Əlavə işləmələr və ya istifadəçiyə səhv mesajı göstərə bilərsiniz
  }
}

    }
}
</script>

<style scoped>
.logo{
    width: 100px;

}
.register input{
    display: block;
    width: 300px;
    height: 40px;
   margin: 0 auto 30px auto;
   border: 1px solid skyblue;

}
.register button{
    width: 320px;
    height: 40px;
    border: 1px solid skyblue;
    background-color: skyblue;
    color:white;
    cursor: pointer;
}


</style>