<template>
  <main class="h-screen w-full inset-0 relative text-slim-200">
    <teleport to="body">
      <h1 class="hidden">Protocolo SLIM</h1>
      <header>
        <client-only><navigation-bar/></client-only>
      </header>
    </teleport>
    <gradient-layer/>
    <social-bar class="hidden lg:block"/>
    <Section background-image="1">
      <presentation/>
    </Section>
    <Section id="protocol"  background-image="2" class="!h-fit pb-24">
      <div class="lg:ml-96">
        <header>
          <h1 class="text-5xl mb-12 reveal fade-left">
            <span>UM PROGRAMA</span><br/> <span class="ml-9">FEITO PARA VOCÊ</span>
          </h1>
        </header>
        <article>
          <h2 class="ml-12 mb-12 text-2xl reveal fade-left">
            O Protocolo Slim é <br/>
            totalmente individualizado, <br/>
            respeitando as necessidades <br/>
            de cada paciente.
          </h2>
          <p class="ml-36 flex flex-col gap-4 reveal fade-left">
            <span  class="text-3xl">DURAÇÃO</span>
            <span class="text-4xl ml-8 font-extrabold">48 DIAS</span>
          </p>
          <p class="ml-56 flex flex-col gap-4 reveal fade-left">
            <span class="text-3xl">DIVIDIDOS EM</span>
            <span class="text-4xl ml-8 font-extrabold">4 FASES</span>
          </p>
        </article>
      </div>
      <div class="mt-44 mx-2 lg:mx-24 flex flex-row gap-x-32 justify-center flex-wrap">
      <article>
        <h2 class="text-5xl mb-12 flex flex-col gap-4 w-fit reveal fade-left">
          <span>EMAGRECIMENTO</span>
          <span class="ml-16">RÁPIDO E CONSISTENTE</span>
        </h2>
        <p class="ml-28 my-32 flex flex-col text-2xl w-fit reveal fade-left">
          <span>PROTOCOLO BASEADO NOS</span>
          <span class="font-bold">PILARES DE UMA VIDA SAUDÁVEL</span>
        </p>
        <div class="mx-auto w-fit reveal fade-left">
          <ul class="flex flex-col gap-8 text-3xl font-black">
            <li class="flex flex-row items-center gap-2 reveal fade-left">
              <nuxt-icon name="arrow"/>
              <span>EQUILÍBRIO HORMONAL</span>
            </li>
            <li class="flex flex-row items-center gap-2 reveal fade-left">
              <nuxt-icon name="arrow"/>
              <span>ALIMENTAÇÃO SAUDÁVEL</span>
            </li>
            <li class="flex flex-row items-center gap-2 reveal fade-left">
              <nuxt-icon name="arrow"/>
              <span>PRÁTICA DE EXERCÍClO FÍSICO</span></li>
            <li class="flex flex-row items-center gap-2 reveal fade-left">
              <nuxt-icon name="arrow"/>
              <span>SONO DE QUALIDADE</span></li>
          </ul>
        </div>
      </article>
      <article class="relative mt-44">
        <h2 class="text-5xl mb-12 flex flex-col gap-4 w-fit reveal fade-right">O QUE ESTÁ INCLUSO</h2>
        <ol class="mr-12 w-fit flex flex-col gap-8 lg:gap-28 text-2xl lg:text-3xl font-black list-decimal">
          <li class="reveal fade-right">
            Consulta médica, para acompanhamento clínico,<br/>
            análise de exames laboratoriais e ajustes hormonais,<br/>
            quando necessário.<br/>
          </li>
          <li class="reveal fade-right">
            Cinco avaliações físicas completas, para análise<br/>
            da composição corporal e capacidade aeróbica.<br/>
            Necessário para troca de fases<br/>
          </li>
          <li class="reveal fade-right">
            Orientação nutricional e de exercício aeróbico.<br/>
          </li>
          <li class="reveal fade-right">Uma consulta com a médica psiquiatra.</li>
          <li class="reveal fade-right">
            Conexão direta com a equipe do Protocolo Slim,<br/>
            através de suporte diário via WhatsApp.
          </li>
        </ol>
        <div class="!absolute -right-9 lg:-right-16 -bottom-22 lg:bottom-0 z-40 reveal fade-bottom">
          <span> <span class="text-2xl"><span class="text-4xl">+</span> Bônus</span><br/>
            <span class="font-extrabold text-xl">
                  E-book com<br/>
              receitas especiais<br/>
              </span>
          </span>
          <img class="w-24" src="/img/ebook.png">
        </div>
      </article>
      </div>
    </Section>
    <Section background-image="3" class="!h-fit py-10">
      <header class="ml-auto mr-10 lg:mr-[30rem] text-4xl lg:text-5xl mb-12 w-fit reveal fade-left">
        <h1 class="flex flex-col gap-2 font-medium">
          <span>ESTAREMOS</span>
          <span class="ml-16"> AO SEU LADO</span>
          <span> DURANTE TODO</span>
          <span class="ml-16"> O PROCESSO</span>
        </h1>
      </header>
      <article class="mx-auto w-fit flex flex-col gap-12">
        <h2 class="text-2xl lg:text-3xl reveal fade-left">
          <span>O QUE VOCÊ VAI</span><br/>
          <span>PRECISAR PARA COMEÇAR</span>
        </h2>
        <div class="ml-16 lg:ml-28 pt-24 flex flex-col lg:flex-row gap-28 items-center justify-start w-fit">
          <div class="w-32 relative reveal fade-bottom">
            <div class="relative bg-current w-full rounded-xl p-2 z-20">
              <img class="w-full" src="/img/balanca.png">
            </div>
            <p class="!absolute -top-16 font-extrabold whitespace-nowrap reveal fade-bottom  z-10">
                    Balança digital<br/> de peso corporal
            </p>
          </div>
          <div class="w-32 relative reveal fade-bottom">
            <div class="relative bg-current w-full rounded-xl p-2 z-20">
              <img class="w-full" src="/img/balanca2.png">
            </div>
            <p class="!absolute -top-20 font-extrabold whitespace-nowrap reveal fade-bottom  z-10">
              Balança digital <br/> para pesar os<br/> alimentos
            </p>
          </div>
          <div class="w-48 relative reveal fade-bottom">
            <div class="relative bg-current w-full rounded-xl p-2 z-20">
              <img class="w-full" src="/img/relogio.png">
            </div>
            <p class="!absolute -top-20 font-extrabold whitespace-nowrap reveal fade-bottom  z-10">
              Frequencímetro para <br/> monitorar a frequência cardíaca<br/>  durante o exercício aeróbico
            </p>
          </div>
        </div>
      </article>
    </Section>
    <Section class="!min-h-[unset] !h-fit !pt-[unset] !px-[unset]">
      <header class="mx-auto text-5xl mb-12 w-fit reveal fade-left hidden">
          <h1 class="flex flex-col gap-2 font-medium">
            RESULTADOS
          </h1>
      </header>
      <ResultPresentation/>
    </Section>
    <Section id="contactForm" background-image="3"  class="!min-h-[unset] !h-fit pb-24" >
      <header class="mx-auto text-5xl mb-12 w-fit reveal fade-left">
        <h1 class="flex flex-col gap-2 font-medium">Contato</h1>
      </header>
      <contact-form class="reveal fade-left"/>
    </Section>
  </main>
</template>
<script setup lang="ts">
import SocialBar from "~/components/SocialBar.vue";
import GradientLayer from "~/components/GradientLayer.vue";
import NavigationBar from "~/components/NavigationBar.vue";
import ResultPresentation from "~/components/ResultPresentation.vue";

onMounted(() => {
  function reveal() {
    document.documentElement.style.setProperty('--scroll',(window.scrollY / document.body.offsetHeight).toString());

    const reveals = document.querySelectorAll('.reveal');
/*
    const revealsElements = (scrollTop) => {
      reveals.forEach(reveal => {
        if(scrollTop + window.innerHeight > reveal.offsetTop - reveal.offsetHeight){
          reveal.classList.add('active');
        }else{
          reveal.classList.remove('active')
        }
      })
    }

    window.addEventListener('scroll', () => {
      const scrollTop = window.scrollY;
      revealsElements(scrollTop);
    });
  }*/

    reveals.forEach( reveal => {
      const bodyHeight = document.body.offsetHeight;
      const elementTop = reveal.getBoundingClientRect().top;
      const elementVisible = 150;

      if(elementTop < bodyHeight - elementVisible){
        reveal.classList.add("active");
      }else{
        reveal.classList.remove("active");
      }
    });
  }
  window.addEventListener("scroll", reveal);
})

</script>
