import axios from 'axios';
import store from './store/index.js';
import router from './router/index.js';
const extractCSRFToken = async () => {
    await axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie');
}
const axiosClient = axios.create({
    baseURL: 'http://localhost:8000'
});
axiosClient.interceptors.request.use(config => {
    const csrfToken = extractCSRFToken();
    if (csrfToken) {
        config.headers['X-CSRF-TOKEN'] = csrfToken;
    }
    const token = localStorage.getItem("TOKEN"); // Fix the typo here, change "TOEKN" to "TOKEN"
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});
axiosClient.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response.status === 401) {
            router.push({ name: "login" });
        }
        return Promise.reject(error);
    }
);

export default axiosClient;
