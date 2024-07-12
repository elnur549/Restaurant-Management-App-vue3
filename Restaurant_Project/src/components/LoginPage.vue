<template>
   
    <h1>Log in</h1>
    <div class="register">
        <input v-model="email" type="email" placeholder="Enter E-mail" />
        <input v-model="password" type="password" placeholder="Enter Password" />
        <p v-if="submitted" id="info">{{ mesaj }}</p>
        <button v-on:click="login">Login</button>
    </div>
    <router-link to="/Signup">Sign up</router-link>
</template>

<script>

import axios from 'axios';



//import {validations} from 'vueali'

export default {
    name: 'LoginPage',
    




    data() {
        return {
            name:'',
            email: '',
            password: '',
            mesaj: "Email ve Sifrenizi bos buraxa bilmezsiniz ",
            submitted: false
        }
    },

   
    methods: {
        async login() {
            if (!this.email || !this.password) {
                this.submitted=true,
                console.error('Email ve şifre gereklidir.');
                return;
            }
            try {
                console.log('Gönderilen email:', this.email);
                console.log('Gönderilen şifre:', this.password);

                let response = await axios.get('http://localhost:3000/users', {
                    params: {
                        email: this.email,
                        password: this.password,
                        
                        
                    },
                    
                });
                if (response.status == 200 && response.data.length>0) {
                    
                    alert("response.status == 200 ve response.data.length>0 her ikiside true'dur");


                 localStorage.setItem("user-info", JSON.stringify(response.data[0]));
                 
                    this.$router.push({ name: "Home" });
                }
                console.warn(response);
            } catch (error) {
                console.error('Bir hata oluştu:', error);
            }
        }
    }
}
</script>

<style scoped>
.logo {
    width: 100px;
}

.register input {
    display: block;
    width: 300px;
    height: 40px;
    margin: 0 auto 30px auto;
    border: 1px solid skyblue;
}

.register button {
    width: 320px;
    height: 40px;
    border: 1px solid skyblue;
    background-color: skyblue;
    color: white;
    cursor: pointer;
}
</style>
