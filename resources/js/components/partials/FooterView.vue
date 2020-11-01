<template>
   <div class="footer-con ui footer">
       <div class="container">
          All right reserved E-Stiches {{ new Date().getFullYear() }}
       </div>
   </div>
</template>

<script>
export default {

}
</script>

<style lang="scss">
 $color: #8783ce;
 $secondary:rgb(86, 79, 204);
 
 .footer-con{
   background: #333;
   color:rgba($color: #fff, $alpha: 0.8);
   padding:10px;
   text-align:center;
  //  position: absolute;
   bottom:0px;
   left:0px;
   width:100%;
   & h4{
     color:$secondary;
     text-transform: uppercase;
     font-size: 20px;
   }
   & .f-col{
     padding:10px;
     & ul{
       margin:0px;
       padding:0px;

       & li{
         line-height: 23px;
          border-bottom: 1px solid #555;
          padding:10px 5px; 
         & a{
           color:white;
           font-weight: 600;
         }
       }
     }
   }

   & .f-col:nth-child(1){
      background:url(/images/footer-bg.png) no-repeat;
    }
    

   & .f-col:nth-child(3){
         & ul li{
           display:inline-block;
           border-bottom:none;

           & i{
             font-size: 25px
           }
         }
      }
      
 }

  @media screen and(max-width:640px) {
 
  }
    
</style>