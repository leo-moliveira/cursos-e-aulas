<template>
  <div>
    <nav ref="navBar" class="nav__bar hidden">
      <h2 class="hidden">Menu Protocolo Slim</h2>
      <ul>
        <li @click.prevent="[goToProtocol(), toggleNavBar()]">O Protocolo</li>
        <li @click.prevent="[goToContactForm(), toggleNavBar()]">Contato</li>
        <li>Area do paciente</li>
        <client-only><li class="self-end lg:hidden"><social-bar class="!relative !top-[unset] !right-[unset] !h-fit "/></li></client-only>
      </ul>
    </nav>
    <div ref="navMenu" class="nav__bar__menu_container">
      <nuxt-icon name="menu" class="text-2xl text-slim-100 lg:hidden cursor-pointer" @click.prevent="toggleNavBar"/>
    </div>
  </div>
</template>

<script>
export default defineComponent({
  name: "NavigationBar",
  data(){
    return {}
  },
  methods: {
    toggleNavBar(){
      if(this.$refs.navBar.classList.contains('hidden')){
        this.$refs.navBar.classList.remove('hidden')
        this.$refs.navBar.classList.add('block')
      }else{
        this.$refs.navBar.classList.remove('block')
        this.$refs.navBar.classList.add('hidden')
      }
    },
    goToProtocol(){
      document.getElementsByTagName('html')[0].scrollTop = document.getElementById('protocol').offsetTop
    },
    goToContactForm(){
      document.getElementsByTagName('html')[0].scrollTop = document.getElementById('contactForm').offsetTop
    }
  }
});
</script>

<style scoped>
.nav__bar {
  @apply w-72 right-1 py-8 px-2 absolute z-50 bg-gray-300 bg-opacity-60
}

.nav__bar ul {
  @apply w-full flex flex-col items-center h-screen gap-4 font-black text-2xl pt-24 text-white
}

.nav__bar ul li {
  @apply cursor-pointer;
}

.nav__bar__menu_container {
  @apply w-fit absolute right-4 top-4 z-50 bg-gray-300 bg-opacity-60 rounded-lg px-1 py-1
}

@screen lg {
  .nav__bar {
    @apply w-full right-[unset] px-24 block px-24;
  }
  .nav__bar ul {
    @apply flex-row items-center justify-between h-fit pt-0
  }
}
</style>
