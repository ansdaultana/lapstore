import './bootstrap';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.csrf_token;
