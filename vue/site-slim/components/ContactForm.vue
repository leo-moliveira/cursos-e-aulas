<template>
  <form class="shadow-2xl w-full lg:max-w-6xl mx-auto px-2 lg:px-24 py-10 rounded-xl font-bold flex flex-col justify-center gap-8">
    <div class="from__group">
      <label for="name">Nome</label>
      <input type="text" name="name"/>
    </div>
    <div class="from__group">
      <label for="mail">Email</label>
      <input type="email" name="mail"/>
    </div>
    <div class="from__group">
      <label for="phone">Telefone</label>
      <input type="text" name="phone"/>
    </div>
    <div class="from__group--message">
      <label for="message">Mensagem</label>
      <textarea name="message"></textarea>
    </div>
    <div class="from__group mx-auto">
      <button class="bg-slim-200 text-slim-100 rounded-xl px-8 py-2" type="submit">ENVIAR</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "ContactForm"
}
</script>

<style scoped>
.from__group {
  @apply flex flex-col lg:flex-row gap-8 justify-between items-center text-2xl;
}
.from__group label {
  @apply  basis-1/6;
}
.from__group input {
  @apply rounded-xl p-2 lg:p-4 flex-grow;
}

.from__group--message {
  @apply flex flex-row gap-4 lg:gap-8 flex-col justify-center text-2xl;
}

.from__group--message textarea {
  @apply rounded-xl p-4;
}
</style>
