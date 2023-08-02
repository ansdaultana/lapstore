import axiosClient from "../axios";
import router from "../router";
import axios from "../axios-interceptor";
import { setProducts } from "./mutations";
axios.defaults.withCredentials = true;

export async function login({ commit }, user) {

    try {
        await axios.get('http://localhost:8000/sanctum/csrf-cookie');
        const response = await axios.post('http://localhost:8000/api/login',
            {
                email: user.value.email,
                password: user.value.password,
                remember: user.value.remember
            });
        if (response.data && response.data.token) {
            commit('setUser', response.data.user);
            commit('setToken', response.data.token);
            router.push({ name: 'app.dashboard' });
        }
        return response.data;

    } catch (error) {

        throw error;
    }
}

export async function newProduct({ commit }, product) {
    console.log(product)
    try {
        const response = await axios.post('http://localhost:8000/api/new-product',
            {
                title: product.title,
                description: product.description,
                price: product.price,
                recommended:product.recommended,
                slidder: product.slidder,
                category: product.category,
                quantity: product.quantity,
                photos: product.photos, // Add the images directly to the form data

            },
            {
                headers: {
                    'Content-Type': 'multipart/form-data', // Important for handling files on the server
                },
            });
            console.log(response.data)
        return response.data;
    } catch (error) {
        throw error;
    }
}
export async function getProducts({ commit }, info) {

    try {
        const response = await axios.get('http://localhost:8000/api/get-Products', {
            params: {
                currentPage: info.value.currentPage,
                perPage: info.value.perPage,
                search: info.value.search
            },
        },
        );
        if (response.data && response.data.Products) {
            commit('setProducts', response.data.Products.data)
        }
        return response;
    } catch (error) {
        throw error;
    }
}
export async function GetProductBySlug({ commit }, slug) {
    try {
        const response = await axios.get(`http://localhost:8000/api/get-product/${slug.value}`, {
            params: {
                slug: slug.value
            }
        })
        if (response.data && response.data.Product) {
            commit('setProduct', response.data.Product);
        }
        return response;
    } catch (error) {
        throw error;
    }
}

export async function deleteProduct({ commit }, slug) {
    try {
        const response = await axios.post(`http://localhost:8000/api/delete-product/${slug}`,
        {
            params: {
                slug: slug
            }
        });
        return response;
    } catch (error) {
        throw error;
    }
}
export async function editProduct({ commit }, product) {
    try {
        const response = await axios.post(`http://localhost:8000/api/edit-product/${product.slug}`,
            {
                title: product.title,
                description: product.description,
                price: product.price,
                recommended:product.recommended,
                slidder: product.slidder,
                category: product.category,
                quantity: product.quantity,
                photos: product.photos,
                deletedImages:product.deletedImages 

            },
            {
                headers: {
                    'Content-Type': 'multipart/form-data', // Important for handling files on the server
                },
            });
        return response.data;
    } catch (error) {
        throw error;
    }
}
export async function logout({ commit }) {
    try {
        const response = await axios.post('http://localhost:8000/api/logout');
        if (response.data) {
            commit('setToken', '');
            commit('setUser', {});
            router.push({ name: 'login' });
        }
        return response;
    } catch (error) {
        console.error(error);
    }
}

export function getUser({ commit }, data) {
    return axiosClient.get('/getUser')
        .then(({ data }) => {
            commit('setUser', data);
            return data;

        })
}