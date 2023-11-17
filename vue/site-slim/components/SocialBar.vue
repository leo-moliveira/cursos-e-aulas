<template>
  <ul class="social__container">
    <li class="text-[3rem] cursor-pointer">
      <a :href="$config.public.mediaURLs.instagram" target="_blank" ><nuxt-icon name="instagram"/></a>
    </li>
    <li class="text-[2.5rem] cursor-pointer">
      <a :href="$config.public.mediaURLs.facebook" target="_blank" >
        <nuxt-icon name="facebook"/>
      </a>
    </li>
    <li class="text-[2.4rem] cursor-pointer">
      <a :href="$config.public.mediaURLs.whatsapp" target="_blank" >
        <nuxt-icon name="whatsapp"/>
      </a>
    </li>
  </ul>
</template>

<script lang="ts">
export default defineComponent({
  name: "SocialBar",
});
</script>

<style scoped>
.social__container {
  @apply fixed top-1/2 right-8 z-50 flex-col items-center justify-center gap-4
}
</style>
