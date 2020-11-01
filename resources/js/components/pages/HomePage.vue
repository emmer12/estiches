<template>
  <div>

        <!-- Banner Section -->

        <banner-ani></banner-ani>
        <!-- Services Section -->

        <div class="section1">
            <h4>E-stiches</h4>
            <h2>Your look is our priority</h2>

            <p>Are you a lover of classy and stylish outfits? let your taste meet our skills</p>
        </div>


        <div class="section2">
           <special-gallery></special-gallery>
        </div>
        <br>
        <br>

        <!-- Testimony Section -->

        <testimony></testimony>

        <br>

        <div class="map container">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1eZ1xT2sDmWaWkZkc6UYACTDBhOenv-q_" width="100%" height="480"></iframe>
        </div>

        <br>
        <br>

        <!-- News Letter -->
        <!-- <news-letter></news-letter> -->


   </div>


    
</template>

<script>
   import SliderView from "../sliders/SliderView.vue";
   import Portfolio from "../partials/Portfoleo";
   import SpecialGallery from "../partials/SpecialGallery";
   import BannerAni from "../partials/BannerAni"
   import BannerVid from "../partials/BannerVid"
   import Wwdo from "../partials/Wwdo"
   import Testimony from "../partials/Testimony"
   import NewsLetter from "../partials/NewsLetter"
   import CustomVideo from "../partials/CustomVideo"

   import DupzyEmmy from '../partials/DupzyEmmy'
   export default {
       components: {
           SliderView,
           BannerAni,
           BannerVid,
           Portfolio,
           Wwdo,
           Testimony,
           NewsLetter,
           CustomVideo,
           DupzyEmmy,
           SpecialGallery
           },
        data(){ 
            return {
                slickOptions: {
                  slidesToShow: 2,
                  fade:true,
                  dots: true,
                // Any other options that can be got from plugin documentation
            },
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
// <style src="slick-carousel/slick/slick.css"></style>
<style src="slick-carousel/slick/slick-theme.css"></style>

<style lang="scss" >
  .heading{
      & h1{
          color:#555;
            font-size: 30px;
            padding: 10px;
            letter-spacing: 4px;
            font-family: 'Poppins', sans-serif;
            position: relative;
            margin: 10px;
            font-weight:700;
      }


      & ::after{
          content:'';
          position: absolute;
          height:3px;
          width:24px;
          background: #bb3407;
          bottom: 10px;
          left: 5px;
          transform:rotate(-20deg);


      } 

      & ::before{
          content:'';
          position: absolute;
          height:3px;
          width:24px;
          background: #bb3407;
          bottom: 10px;
          left: 5px;
          transform:rotate(20deg)

      } 
  }

  .section1{
      text-align:center;
      padding:10px;
      margin:43px auto;
      max-width:500px;


      h2{
          text-transform: uppercase;

      }
      h4{
          text-transform: uppercase;
          line-height:0px;
          opacity:0.7;
          letter-spacing:15px
      }
  }

  .section2{
     
      .horizontal {
        grid-column: span 2;
        }

        .vertical {
        grid-row: span 2;
        }

        .big {
        grid-column: span 2;
        grid-row: span 2;
        }

  }


  @media screen and (max-width:640px){
      .heading h1{
      font-size:20px;
      }

  }
  


</style>