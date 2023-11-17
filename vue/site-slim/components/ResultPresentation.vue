<template>
  <article id="resultsArticle" class="inline-grid auto-cols-auto grid-flow-col gap-2 overflow-x-hidden relative">
    <header class="hidden"><h2>Resultados dos pacientes</h2></header>
    <carousel class="w-screen mx-atuo"  :autoplay="3000" :pauseAutoplayOnHover="true" :settings="settings" :breakpoints="breakpoints" :wrap-around="true">
      <slide v-for="(patient, index) in patients" :key="index">
        <patient-result :patient="patient" />
      </slide>
    </carousel>

  </article>
</template>

<script lang="ts">
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
export default defineComponent({
  name: "ResultPresentation",
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  computed: {
    breakpoints: function () {
      const slides = {
        700: {
          itemsToShow: 1,
          snapAlign: "center",
        },
        1024: {
          itemsToShow: 2,
          snapAlign: "start",
        },
        1080: {
          itemsToShow: 2,
          snapAlign: "start",
        },
        1920: {
          itemsToShow: 4,
          snapAlign: "center",
        },
      };
      return slides;
    },
  },
  data(){
    return {
      totalRows: 1,
      settings: {
        itemsToShow: 1,
        snapAlign: "center",
      },
      patients: [
        {
          start: {
            weight: 99.5,
            BFI: 21.4,
            photos: ["/img/cases/1/1.png","/img/cases/1/3.png",]
          },
          end: {
            weight: 86.1,
            BFI: 13.4,
            photos: ["/img/cases/1/2.png", "/img/cases/1/4.png",]
          },
        },
        {
          deferential: true,
          start: {
            weight: 9.7,
            time: 48,
            BFI: null,
            photos: ["/img/cases/2/1.png"]
          },
          end: {
            weight: 9.7,
            time: 48,
            BFI: null,
            photos: ["/img/cases/2/2.png"]
          },
        },
        {
          deferential: true,
          start: {
            weight: 10.3,
            time: null,
            BFI: 20.1,
            photos: ["/img/cases/3/1.png","/img/cases/3/3.png","/img/cases/3/5.png",]
          },
          end: {
            weight: 10.3,
            time: null,
            BFI: 10,
            photos: ["/img/cases/3/2.png", "/img/cases/3/4.png","/img/cases/3/6.png",]
          },
        },
        {
          deferential: true,
          start: {
            weight: 8.2,
            time: 48,
            BFI: null,
            photos: ["/img/cases/5/1.png","/img/cases/5/3.png"]
          },
          end: {
            weight: 8.2,
            time: 48,
            BFI: null,
            photos: ["/img/cases/5/2.png", "/img/cases/5/4.png"]
          },
        },
      ]
    }
  },
})
</script>

<style scoped>

</style>
