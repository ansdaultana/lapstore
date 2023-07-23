import axios from "axios";

// Function to set the authorization header with the token
const setAuthHeader = (token) => {
  if (token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
  } else {
    delete axios.defaults.headers.common["Authorization"];
  }
};

axios.interceptors.request.use(
  (config) => {
    const token = sessionStorage.getItem("TOKEN"); 
    setAuthHeader(token);
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export default axios;
