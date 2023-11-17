<template>
  <div class="flex flex-row justify-between gap-4 px-4 py-2 w-[29.2rem]">
    <div class="result__container">
      <div class="relative" :class="(patient.start.photos.length > 1)? 'cf4a': ''">
        <img class="absolute h-[26rem]" :style="getAnimationStyle(index, patient.start.photos.length)" v-for="(startImage, index) in patient.start.photos" :src="startImage">
      </div>
      <div class="absolute inset-0 flex flex-row justify-center items-center bg-[#96874c] bg-opacity-30">
        <div class="flex flex-col gap-8 items-center">
          <span class="font-bold" v-if="patient.deferential">Menos</span>
          <span class="font-extrabold" v-if="patient.start.weight"> {{ patient.start.weight.toString().replace(".", ",") }}kg </span>
          <span v-if="patient.start.BFI">{{ patient.start.BFI.toString().replace(".", ",") }}% de gordura</span>
          <span v-if="patient.start.time">Em {{ patient.start.time }} dias</span>
        </div>
      </div>
    </div>
    <div class="result__container">
      <div class="relative" :class="(patient.end.photos.length > 1)? 'cf4a': ''">
        <img class="absolute h-[26rem]" :style="getAnimationStyle(index, patient.start.photos.length)" v-for="(endImage, index) in patient.end.photos" :src="endImage">
      </div>
      <div class="absolute inset-0 flex flex-row justify-center items-center bg-[#96874c] bg-opacity-30">
        <div class="flex flex-col gap-8 items-center" v-if="!patient.deferential">
          <span class="font-extrabold" v-if="patient.end.weight">{{ patient.end.weight.toString().replace(".", ",") }}kg</span>
          <span v-if="patient.end.BFI">{{ patient.end.BFI.toString().replace(".", ",") }}%  de gordura </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import {PropType} from "@vue/runtime-core";
export default defineComponent({
  name: "PatientResult",
  props: {
    patient: {
      type: Object as PropType<Patient>,
      required: true,
    }
  },
  methods: {
    getAnimationStyle(index: number, arrayLength: number){
      if(index === 0 && arrayLength > 1){
        return 'animation: none;'
      }

      if(index > 0 && index === arrayLength){
        return 'animation-delay: 0s'
      }else{
        const delay = (index + 1 )* 2;
        return 'animation-delay: ' + delay + 's';
      }
    }
  }
});
</script>

<style>
.result__container {
  @apply relative w-1/2 h-[26rem];
}

.cf4a img {
  -webkit-animation-name: cf4FadeInOut;
  -webkit-animation-timing-function: ease-in-out;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-duration: 8s;
  -moz-animation-name: cf4FadeInOut;
  -moz-animation-timing-function: ease-in-out;
  -moz-animation-iteration-count: infinite;
  -moz-animation-duration: 8s;
  -o-animation-name: cf4FadeInOut;
  -o-animation-timing-function: ease-in-out;
  -o-animation-iteration-count: infinite;
  -o-animation-duration: 8s;
  animation-name: cf4FadeInOut;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite;
  animation-duration: 8s;
}

@keyframes cf4FadeInOut {
  0% {
    opacity:1;
  }
  17% {
    opacity:1;
  }
  25% {
    opacity:0;
  }
  92% {
    opacity:0;
  }
  100% {
    opacity:1;
  }
}

</style>
