<template>
    <div class="main-bg pt-5 w-full bg-custom-bg">

        <div class="flex items-center mb-4 flex-row justify-center h-full w-full">
            
            <label class="relative inline-flex items-center cursor-pointer">
                <input v-model="toggleButtonState" type="checkbox" value="" class="sr-only peer">
                <div
                    class="w-11 h-6 bg-custom-accent peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ms-3 text-sm font-medium text-white dark:text-gray-300">Update customer ?</span>
            </label>

        </div>
        <div class="flex items-center flex-row justify-center h-full w-full">

            <CustomerForm v-if="!toggleButtonState"  formMode="create" :addNewCustomerData="addNewCustomerToTable" header="Enter Customer Data" :onFormSubmit="onCreateFormSubmit"/>
            <CustomerForm v-else="" formMode="update" :addNewCustomerData="addNewCustomerToTable" header="Update Existing Customer" :onFormSubmit="onUpdateFormSubmit"/>
            
        </div>
        <div class="flex m-2 items-center flex-row justify-center">
            <ListCustomer :newCustomerData="newCustomerData"></ListCustomer>
        </div> 
    </div>
</template>

<script>

</script>

<script setup>

import CustomerForm from '../components/CustomerForm.vue'
import ListCustomer from '../components/ListCustomer.vue'
import { onBeforeMount, ref } from 'vue'

const toggleButtonState = ref(false);
const newCustomerData = ref({});

const addNewCustomerToTable = (data) => {
    console.log("running this shit", data)
    newCustomerData.value = data;

}

</script>

<style scoped>

.input-container {
    position: relative;
}
</style>