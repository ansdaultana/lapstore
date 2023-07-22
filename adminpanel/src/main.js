import { createApp } from 'vue'
import './index.css'
import App from './App.vue'
import store from './store/index.js';
import router from './router/index.js';
// import { Cloudinary } from "@cloudinary/url-gen";
// const cld = new Cloudinary({
//     cloud: {
//       cloudName: "ddrivhxfq",
//     },
//   });
createApp(App)
.use(store)
.use(router)
.mount('#app')
