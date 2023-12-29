<template>
    <div class="m-2 shadow bg-custom-bg-light  rounded h-fit w-full sm:w-2/5">
        <div class="">
            <h2 class="text-2xl m-2 text-white font-semibold text-center">{{ header }}</h2>

            <form @submit.prevent="onFormSubmit" class="text-white h-auto">

                <!-- First Name -->

                <div v-if="props.formMode == 'update'" class="relative m-2">
                    <input v-model="formData.id.content" type="text" id="id"
                        class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-1  border-custom-bg appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-custom-accent peer"
                        placeholder=" " />
                    <label for="id"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                        Customer ID
                    </label>
                    <span class="text-red-400 text-xs"> {{ formData.id.errorMessage }} </span>
                </div>

                <div class="flex flex-row m-0 p-0">

                    <div class="relative m-2 w-1/2">
                        <input v-model="formData.first_name.content" type="text" id="first_name"
                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-0  border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="first_name"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            First Name
                        </label>
                        <span class="text-red-400 text-xs"> {{ formData.first_name.errorMessage }} </span>
                    </div>

                    <div class="relative m-2 w-1/2">
                        <input v-model="formData.last_name.content" type="text" id="last_name"
                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-0  border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="last_name"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Last Name
                        </label>
                        <span class="text-red-400 text-xs"> {{ formData.last_name.errorMessage }} </span>
                    </div>
                </div>
                <!-- Email -->
                <div class="relative m-2">
                    <input v-model="formData.email.content" type="text" id="email"
                        class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-0  border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="email"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                        Email Address
                    </label>
                    <span class="text-red-400 text-xs"> {{ formData.email.errorMessage }} </span>
                </div>

                <!-- Phone Number -->
                <div class="relative m-2">
                    <input v-model="formData.phone_no.content" type="text" id="phone_no"
                        class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-0  border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="phone_no"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                        Phone Number
                    </label>
                    <span class="text-red-400 text-xs"> {{ formData.phone_no.errorMessage }} </span>
                </div>



                <div class="flex flex-row m-0">
                    <!-- Address Line One -->
                    <div class="relative m-2 w-1/2">
                        <input v-model="formData.address_line_one.content" type="text" id="address_line_one"
                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-0  border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="address_line_one"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Address Line One
                        </label>
                        <span class="text-red-400 text-xs"> {{ formData.address_line_one.errorMessage }} </span>
                    </div>

                    <!-- Address Line Two -->
                    <div class="relative m-2 w-1/2">
                        <input v-model="formData.address_line_two.content" type="text" id="address_line_two"
                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-0  border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="address_line_two"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Address Line Two
                        </label>
                        <span class="text-red-400 text-xs"> {{ formData.address_line_two.errorMessage }} </span>
                    </div>
                </div>

                <div class="relative m-0">
                    <!-- Postal Code -->
                    <div class="relative m-2">
                        <input v-model="formData.postal_code.content" type="text" id="post_code"
                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-0  border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="post_code"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Postal Code
                        </label>
                        <span class="text-red-400 text-xs"> {{ formData.postal_code.errorMessage }} </span>

                    </div>
                    <!-- City -->


                    <div class="relative m-2">
                        <input v-model="formData.city.content" type="text" id="city"
                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-custom-bg-light border-0  border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-custom-accent focus:border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="city"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            City
                        </label>
                        <span class="text-red-400 text-xs"> {{ formData.city.errorMessage }} </span>
                    </div>




                </div>


                <div class="m-2">
                    <span v-if="requestInfo.error" class=" text-xs text-red-400">{{ requestInfo.message }}</span>
                    <span v-else-if="requestInfo.info" class=" text-xs text-green-400">{{ requestInfo.message }}</span>
                </div>
                <div class="m-4">
                    <button v-if="props.formMode == 'create'" type="submit"
                        class="w-full bg-custom-accent text-white p-2 border border-custom-accent-light rounded-md hover:bg-custom-accent-light">Create</button>
                    <button v-else-if="props.formMode == 'update'" type="submit"
                        class="w-full bg-custom-accent text-white p-2 border border-custom-accent-light rounded-md hover:bg-custom-accent-light">Update</button>
                </div>
                <!-- Submit Button -->

            </form>
        </div>
    </div>
</template>

<style scoped>

</style>

<script setup>

import { onMounted } from 'vue';
import { ref } from 'vue';
import axiosInstance from '../../axiosUtil';

const formData = ref({
    id: {
        content: '',
        errorMessage: ''
    },
    first_name: {
        content: '',
        errorMessage: ''
    },
    last_name: {
        content: '',
        errorMessage: ''
    },
    email: {
        content: '',
        errorMessage: ''
    },
    phone_no: {
        content: '',
        errorMessage: ''
    },
    address_line_one: {
        content: '',
        errorMessage: ''
    },
    address_line_two: {
        content: '',
        errorMessage: ''
    },
    postal_code: {
        content: '',
        errorMessage: ''
    },
    city: {
        content: '',
        errorMessage: ''
    },
})

const requestInfo = ref({
    error: false,
    info: false,
    message: ""
})
const props = defineProps({

    addNewCustomerData: {
        type: Function
    },
    header: {
        type: String
    },
    formMode: {
        type: String,
    }
})

// resets all error messages 
const resetErrorMessages = () => {
    for (const key in formData.value) {
        formData.value[key].errorMessage = "";
    }
}

// handle errors when customers create / update request fails 
const handleErrors = (errors, errorMessage) => {
    
    if (typeof (errors) == 'object') {

        for (const key in errors) {
            formData.value[key].errorMessage = errors[key][0];
        }
    }

    else {
        requestInfo.value.error = true;
        requestInfo.value.info = false;
        requestInfo.value.message = errorMessage;
    }
}


const onFormSubmit = async (event) => {

    event.preventDefault();
    let data = {};

    for (const key in formData.value) {

        const value = formData.value[key];
        data[key] = formData.value[key].content;

    }

    console.log("formdata", data);    
    resetErrorMessages();
    
    try {
        let res;

        if (props.formMode == 'create'){
            res = await axiosInstance.post('/api/user/', data)
            // props.addCustomerData(res.data);
            res.data.id = parseInt(res.data.id)
            props.addNewCustomerData(res.data);
        }
        else{
            if (data.id == '') data.id = -1;
            res = await axiosInstance.put('/api/user/' + data.id, data)
            // props.modifyCustomerData(res.data);
            res.data.id = parseInt(res.data.id)
            props.addNewCustomerData(res.data);
        }
        requestInfo.value.error = false;
        requestInfo.value.info = true;
        requestInfo.value.message = props.formMode == 'create' ? 'Added new customer' : 'Customer data updated';

    }
    catch (err) {
        console.log("err", err);
        
        if (err.response.status == 422) {
            handleErrors(err.response.data.errors);
        }
        else{
            handleErrors(undefined, err.response.data.error);
        }
    }

}




// props.onFormSubmit();

</script>