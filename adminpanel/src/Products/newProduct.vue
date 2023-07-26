<script setup>

import { computed, ref, onMounted, onUnmounted } from 'vue';
import AppLayout from '../Layouts/AppLayout.vue'
import { useRoute } from 'vue-router';
import router from '../router/index.js'
import store from '../store/index.js'
const isloading = ref(false);
const route = useRoute();
const slug = ref('')
const form = ref({})
onMounted(async () => {
    slug.value = route.params.slug;
    if (route.name === 'editproduct') {
        await store.dispatch('GetProductBySlug', slug)
        form.value.title = Product.value.title,
            form.value.description = Product.value.description,
            form.value.price = Product.value.price,
            form.value.slidder = Product.value.slidder,
            form.value.category = Product.value.category.name,
            form.value.quantity = Product.value.quantity;
            imagesurlforview.value = Product.value.images
            images.value = Product.value.images
    }
    else {

        form.value.title = '',
            form.value.description = '',
            form.value.price = '',
            form.value.slidder = false,
            form.value.category = '',
            form.value.quantity = ''

    }


})
onUnmounted(async () => {
    store.commit('setProduct', {})
})
const Product = computed(() => store.getters.Product);


const imagesurlforview = ref([
]);
const images = ref([
]);
const acceptedImageTypes = ['image/jpeg', 'image/png',];
const isDragging = ref(false);
const SelectFiles = () => {
    const fileInput = document.getElementById('fileInput');
    fileInput.click();
}
const onFileInput = async (event) => {
    const files = [...event.target.files];
    if (files.length === 0) {
        return
    }
    const selectedFiles = files.slice(0, 4);

    for (let i = 0; i < selectedFiles.length; i++) {
        const file = selectedFiles[i];

        if (acceptedImageTypes.includes(file.type)) {
            const imageUrl = URL.createObjectURL(file);
            const title = file.name.split('.').slice(0, -1).join('.');
            images.value.push(file);
            imagesurlforview.value.push({ url: imageUrl, title: title });
        }
        else {
            ImagesError.value = 'Image is not in Jpeg or Png format.'
        }
    }
}


const onDragover = (event) => {
    event.preventDefault()
    isDragging.value = true;
    event.dataTransfer.dropEffect = "copy";

}

const onDrop = async (event) => {
    event.preventDefault();
    isDragging.value = false;
    const files = [...event.dataTransfer.files];
    if (files.length === 0) {
        return;
    }
    const selectedFiles = files.slice(0, 4);
    for (let i = 0; i < selectedFiles.length; i++) {
        const file = selectedFiles[i];
        if (acceptedImageTypes.includes(file.type)) {
            const imageUrl = URL.createObjectURL(file);
            const title = file.name.split('.').slice(0, -1).join('.'); // Extract filename without extension
            images.value.push(file);
            imagesurlforview.value.push({ url: imageUrl, title: title });

        }
        else {
            ImagesError.value = 'Image is not in Jpeg or Png format.'
        }
    }
};
const deleteUploaded = (image) => {
    const imageIndex = imagesurlforview.value.indexOf(image);
    if (imageIndex !== -1) {
        imagesurlforview.value.splice(imageIndex, 1);
    }
};


const validationErrors = ref()
const ImagesError = ref()
const resetform = () => {
    form.value.title = '';
    form.value.description = '';
    form.value.price = '';
    form.value.slidder = false;
    form.value.category = '';
    form.value.quantity = '';
    images.value = [];
    imagesurlforview.value = [];
}
const AddNewProduct = async () => {

    try {
        const formData = {
            title: form.value.title,
            description: form.value.description,
            price: form.value.price,
            slidder: form.value.slidder,
            category: form.value.category,
            quantity: form.value.quantity,
            photos: images.value,
        };
        isloading.value = true;
        await store.dispatch('newProduct', formData);
        isloading.value = false
        resetform();
        router.push({ name: 'app.products' });

    } catch (error) {
        if (error.response && error.response.data && error.response.data.errors) {
            validationErrors.value = error.response.data.errors;
            console.log(validationErrors.value);
        } else {
            alert('An error occurred while adding the product.');
        }
    }
}
const EditProduct = async () => {
    try {
        const formData = {
            title: form.value.title,
            description: form.value.description,
            price: form.value.price,
            slidder: form.value.slidder,
            category: form.value.category,
            quantity: form.value.quantity,
            photos: images.value,
        };
        isloading.value = true;
        await store.dispatch('editProduct', formData);
        isloading.value = false
        resetform();
        router.push({ name: 'app.products' });

    } catch (error) {
        if (error.response && error.response.data && error.response.data.errors) {
            validationErrors.value = error.response.data.errors;
            console.log(validationErrors.value);
        } else {
            alert('An error occurred while adding the product.');
        }
    }

}
const SubmitRequest = () => {
    if (route.name === 'editproduct') {
        EditProduct()
    }
    else if (route.name === 'newproduct') {
        AddNewProduct()
    }
}

</script>
<template>
    <AppLayout>
        <div class="">
            <div class="m-2 text-orange-500 flex" v-if="!slug">

                Add New Product

            </div>
            <div class="m-2 text-orange-500 flex" v-if="slug">

                Edit {{ Product.title }}

            </div>
            <div class=" ml-2 mr-2 border-2 border-gray-200 h-[calc(100vh - 300px)]">
                <div class="w-auto divide-x-2 flex  shadow-md">
                    <div class="w-1/3">

                        <div @dragover.prevent="onDragover" @dragleave.prevent="onDragleave" @drop.prevent="onDrop"
                            class="

                            shadow-md rounded-md
                            transition-transform hover:scale-103 ease-in duration-200
                            m-2 md:ml-10 mt-5 py-5 md:px-12 md:py-24 md:w-60 items-center flex justify-center border-2 border-dashed border-orange-300">
                            <div class="flex-col items-center justify-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="ml-5 text-orange-300 w-12 md:w-24 h-24 md:-mt-10">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <div class="flex" v-if="isDragging === false">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-orange-500 m-2 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <p class="inline-block text-xs">Drag & Drop Your photo.or
                                        <span @click="SelectFiles" class="text-orange-500 cursor-pointer">Browse</span>
                                    </p>
                                    <input @change="onFileInput" id='fileInput' type="file" class="hidden" ref="FileInput"
                                        multiple>
                                </div>
                            </div>
                        </div>


                        <div v-if="ImagesError" class="text-red-400 text-sm ml-2">
                            {{ ImagesError.value }}
                        </div>
                        <div v-if="imagesurlforview.length > 0" name="pics " class="">

                            <div class="mt-2 " v-for="(image, index) in imagesurlforview" :key="index">

                                <div
                                    class="image border-dashed border-2 h-14 md:h-20 hover:shadow-lg hover:bg-slate-200  transition-transform hover:scale-103 ease-in-out  duration-300  m-1 bg-slate-100  flex justify-between">
                                    <div class="flex">
                                        <div class="md:w-24 w-14  m-2  items-center flex">
                                            <img class="md:h-16
                                    " :src="route.name === 'newproduct' ? image.url : image.image_url">

                                        </div>
                                        <div class="m-2 md:block hidden" v-if="route.name === 'newproduct'">
                                            {{ image.title }}
                                        </div>

                                    </div>
                                    <div @click="deleteUploaded(image)"
                                        class=" flex items-center justify-center  md:m-4 text-red-500 hover:text-red-700 rounded-full hover:bg-white md:px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="cursor-pointer w-6 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="bg-gray-100  w-full">
                            <form @submit.prevent="SubmitRequest" class="bg-white p-4 md:px-14 md:py-8  rounded-md"
                                enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="product-title" class="block text-gray-700 font-semibold mb-2">Product
                                        Title:</label>
                                    <input type="text" id="product-title" name="product_title" v-model="form.title"
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-orange-500"
                                        required>

                                    <p v-if="validationErrors && validationErrors.title" class="text-xs text-red-400 mt-1">
                                        {{ validationErrors.title[0] }}
                                    </p>
                                </div>

                                <div class="mb-2">
                                    <label for="product-price" class="block text-gray-700 font-semibold mb-2">Price:</label>
                                    <input type="number" id="product-price" name="product_price" step="1"
                                        v-model="form.price"
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-orange-500"
                                        required>
                                    <p v-if="validationErrors && validationErrors.price" class="text-xs text-red-400 mt-1">
                                        {{ validationErrors.price[0] }}
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <label for="slidder" class="text-gray-700 text-sm font-semibold mb-2 mr-3">Add To the
                                        slidder:</label>
                                    <input type="checkbox" v-model="form.slidder">
                                    <p v-if="validationErrors && validationErrors.slidder"
                                        class="text-xs text-red-400 mt-1">
                                        {{ validationErrors.slidder[0] }}
                                    </p>
                                </div>
                                <div class="">
                                    <label for="product-description"
                                        class="block text-gray-700 font-semibold mb-2">Description:</label>
                                    <textarea id="product-description" name="product_description" rows="4"
                                        v-model="form.description"
                                        class="w-full px-4 py-2 border rounded-md resize-none focus:outline-none focus:border-orange-500"
                                        required></textarea>
                                    <p v-if="validationErrors && validationErrors.description"
                                        class="text-xs text-red-400 mt-1">
                                        {{ validationErrors.description[0] }}
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <label for="product-category"
                                        class="block text-gray-700 font-semibold mb-2">Category:</label>
                                    <select id="product-category" name="product_category" v-model="form.category"
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-orange-500"
                                        required>
                                        <option value="">Select a category</option>
                                        <option value="Laptop"> Laptop</option>
                                        <option value="Accessories">Accessories</option>
                                        <option value="Others">Others</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <p v-if="validationErrors && validationErrors.category"
                                        class="text-xs text-red-400 mt-1">
                                        {{ validationErrors.category[0] }}
                                    </p>
                                </div>

                                <div class="mb-2">
                                    <label for="product-quantity"
                                        class="block text-gray-700 font-semibold mb-2">Quantity:</label>
                                    <input type="number" id="product-quantity" name="product_quantity" min="1"
                                        v-model="form.quantity"
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-orange-500"
                                        required>
                                    <p v-if="validationErrors && validationErrors.quantity"
                                        class="text-xs text-red-400 mt-1">
                                        {{ validationErrors.quantity[0] }}
                                    </p>
                                </div>

                                <button :disabled="isloading" :class="{ 'cursor-not-allowed': isloading, }" type="submit"
                                    class="mt-2 bg-orange-500 text-white py-2 px-4 rounded-md hover:bg-orange-600">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </AppLayout>
</template>
