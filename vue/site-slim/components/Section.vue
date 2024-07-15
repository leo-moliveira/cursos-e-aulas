<template>
  <section
      class="w-full min-h-[calc(100%-4rem)] bg-fixed bg-center bg-cover relative inset-0 h-full px-8 pt-32"
      :class="' bg-image-' + backgroundImage"
  >
    <div class="relative h-full w-full z-40 ">
      <slot></slot>
    </div>
  </section>
</template>

<script lang="ts">
export default defineComponent({
  name: "Section",
  props: {
    backgroundImage: String
  },
})
</script>

<style scoped></style>
