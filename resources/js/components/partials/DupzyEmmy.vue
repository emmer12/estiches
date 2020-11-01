<template>
  <div class="banner" >
    <div class="" >
      <div >
        <div  style="width:100%;height:100%" >
          <div class="overlay" ></div>
          <div class="right" style="z-index:0;position:relative">
              <vue-flux
                :options="vfOptions"
                :images="vfImages"
                :transitions="vfTransitions"
                ref="slider"
                style="width:100%;height:100%;background:red"
          >
                <template v-slot:preloader>
                    <flux-preloader />
                </template>
              </vue-flux>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {
   VueFlux,
   FluxPreloader,
} from 'vue-flux';

export default {
  components: {
    VueFlux,
    FluxPreloader,
  },
  data: () => ({
    vfOptions: {
      autoplay: true
    },
    vfImages: [
      "/images/banners/1.jpg",
      "/images/banners/2.jpg",
      "/images/banners/3.jpg",
      "/images/banners/4.jpg",
      "/images/banners/5.jpg",
      "/images/banners/6.jpg",
      "/images/banners/7.jpg",
      "/images/banners/8.jpg",
      "/images/banners/9.jpg",
      "/images/banners/10.jpg",
      "/images/banners/11.jpg",
      "/images/banners/12.jpg",
      "/images/banners/13.jpg",
      "/images/banners/14.jpg",
      "/images/banners/15.jpg",
      "/images/banners/16.jpg",
      "/images/banners/17.jpg",
    ],
    vfTransitions: ['fade'],
  })
};
</script>

<style lang="scss" scoped>
.banner{
//    background:url(/images/love.png);
 background:#333;
 height:100%;
 width:100%;
 position:absolute;
 z-index:1000000;
 top:0;
 left:0;
   background-position:bottom;
   background-size: cover;
   & .left{
      & h1{
         font-weight: 800;
         font-size: 30px;
         padding: 10px;
      }
      & p{
         padding: 10px;
      }
   }
}
.overlay{
  position: absolute;
  width:100px;
  height:100px;
  left:0px;
  top: 0px;
  background: url(/images/love.png);
  background-size: contain;
  background-repeat: no-repeat;
  z-index: 1;
  overflow: hidden;
  // opacity: 0.5;
}
</style>