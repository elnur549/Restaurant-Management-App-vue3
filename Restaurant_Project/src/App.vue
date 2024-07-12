<template>
  <Header /> 
 <router-view />
 
</template>

<script>
import Header from './components/Header.vue'
export default {
 name: "App",
 components:{
  Header
 }
  
}
</script>

<style>
#app {font-family: Avenir, Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;text-align: center;color: #6a839d;
    
  }
  body{
      padding: 0;
      margin: 0;
  }
  .add input{
    width: 300px;
    height: 40px;
    padding-left: 20px;
    display: block;
    margin-bottom: 30px;
    margin-right: auto;
    margin-left: auto;
    border: 1px solid skyblue;
  }
  .add button{
   
    width: 320px;
    height: 40px;
    border: 1px solid skyblue;
    background-color: skyblue;
    color: #fffefe;
    cursor: pointer;
  }
  
</style>
