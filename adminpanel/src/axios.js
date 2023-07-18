import axios from 'axios';
import store from './store/index.js';
import router from './router/index.js';

const axiosClient = axios.create({
    baseURL: 'http://localhost:8000'
});

const extractCSRFToken = async () => {
    await axios.get('http://localhost:8000/sanctum/csrf-cookie');
};

axiosClient.interceptors.request.use(async (config) => {
    await extractCSRFToken();
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log('CSRF Token:', csrfToken);
  
    const token = sessionStorage.getItem("TOKEN");
    console.log('LocalStorage Token:', token);
    if (csrfToken) {
      config.headers['X-CSRF-TOKEN'] = csrfToken;
    }
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  });

axiosClient.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response && error.response.status === 401) {
            router.push({ name: "login" });
        }
        return Promise.reject(error);
    }
);

export default axiosClient;
