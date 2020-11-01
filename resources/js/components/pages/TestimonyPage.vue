<template>
  <div class="testimony">
    <form class="ui form" :class="{loading:loading}">
       
       <div class="heading">
           <h1>Please Your Experence</h1>
       </div>
       
       <div class="field">
            <label>Fullname</label>
            <input type="text" v-model="data.fullname">
        </div>
      <div class="field">
        <label>What do you want to say about our services</label>
        <textarea rows="2" v-model="data.message"></textarea>
      </div>

      <div class="ui button" @click="submit">Submit</div>
    </form>
  </div>
</template>

<script>
export default {
    data () {
        return {
            loading:false,
            data:{
                 fullname:'',
                 message:''
            }
        }
    },
    methods: {
        submit(){
            this.loading=true;
            this.$store.dispatch('submitTest',this.data).then(()=>{
                this.loading=false;
                 this.$toast.success({
                        title:"Success",
                        message:"testimony submitted successfully created"
                    });
                this.$router.push('/')
            }).catch(()=>{
                this.loading=false
            })
        }
    },
};
</script>

<style>

   .testimony{
       max-width:600px;
       padding:10px;
       margin:auto
   }
</style>