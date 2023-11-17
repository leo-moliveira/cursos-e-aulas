// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    runtimeConfig: {
        public: {
            mediaURLs: {
                instagram: "https://www.instagram.com/",
                facebook: "https://www.facebook.com/",
                whatsapp: "https://api.whatsapp.com/send?phone=",
            }
        }
    },
    router: {
        base: '/site-slim/'
    },
    css: ['~/assets/css/main.css'],
    postcss: {
        plugins: {
            tailwindcss: {},
            autoprefixer: {},
        },
    },
    app: {
        head: {
            charset: 'utf-8',
            viewport: 'width=500, initial-scale=1',
            title: 'Protocolo Slim',
            meta: [
                // <meta name="description" content="My amazing site">
                { name: 'description', content: 'My amazing site.' }
            ],
        }
    },
    modules: [
        'nuxt-icons',
    ]
})
