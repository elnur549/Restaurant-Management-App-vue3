<template>
    <div class="nav">
        <router-link to="/Home">Home</router-link>
        <router-link to="/Addr">Add Restourant</router-link>
        <router-link v-on:click="logout" to="">Log out</router-link>

    </div>
</template>


<script>

export default {
    name: "HeaderPage",
   
    data() {
        return {

        }
    },
    methods: {
        logout() {
            localStorage.clear();
            this.$router.push({ name: "LoginPage" });

        }
    }
}
</script>

<style scoped>
.nav {
    background-color: #333;
    overflow: hidden;

}

.nav a {
    float: left;
    color: #f2f2f2;
    padding: 14px 16px;
    text-align: center;
    font-style: 17px;
    text-decoration: none;
    margin-right: 5px;
}

.nav a:hover {
    background-color: #ddd;
}
</style>