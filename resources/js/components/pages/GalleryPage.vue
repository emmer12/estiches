<template>
        <div class="container">
            <gallery></gallery>
        </div> 
</template>
<script>

import Gallery from "../partials/Gallery" 
   
   
   export default {
       components: {
          Gallery
        },
        data(){ 
            return {
                
            } 
        }, 
        methods:{

        },
        mounted() {

        },
        computed:{
           LoggedUser(){
            if(window.loggedUser){
                return true;
            }else{
                return false;
            }
           }
        }
    }
</script>


<style lang="scss" scoped>
   
</style>