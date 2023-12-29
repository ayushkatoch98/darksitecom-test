<template>
    <div class="container bg-custom-bg-light m-4 p-0 text-white shadow shadow-gray-700 rounded">
        <h2 class="text-2xl text-center font-semibold m-4 flex-wrap-">Customer Data</h2>

        <!-- Table -->
        <div class="relative overflow-x-auto">
        <table class="w-full table table-auto bg-custom-bg-light  text-left overflow-x-scrolldw border-gray-700">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-700">ID</th>
                    <th class="py-2 px-4 border-b border-gray-700">First Name</th>
                    <th class="py-2 px-4 border-b border-gray-700">Last Name</th>
                    <th class="py-2 px-4 border-b border-gray-700">Email</th>
                    <th class="py-2 px-4 border-b border-gray-700">Phone Number</th>
                    <th class="py-2 px-4 border-b border-gray-700">Address 1</th>
                    <th class="py-2 px-4 border-b border-gray-700">Address 2</th>
                    <th class="py-2 px-4 border-b border-gray-700">Postal Code</th>
                    <th class="py-2 px-4 border-b border-gray-700">City</th>
                </tr>
            </thead>    
            <tbody>
                <!-- Sample data rows go here -->


                <tr v-for="(item, index) in customerData" :key="index">
                    
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.id }}</td>
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.first_name }}</td>
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.last_name }}</td>
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.email }}</td>
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.phone_no }}</td>
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.address_line_one }}</td>
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.address_line_two }}</td>
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.postal_code }}</td>
                    <td class="py-2 px-4 border-b border-gray-700">{{ item.city }}</td>

                </tr>



                <!-- Add more rows as needed -->
            </tbody>
        </table>
        </div>
    </div>
</template>


<script setup>

// import Vue from 'vue';
import axiosInstance from '../../axiosUtil';
import { ref, onMounted, onBeforeMount, watch } from 'vue'

const customerData = ref();


const props = defineProps({
    newCustomerData: {
        type: Object
    }
})


watch(() => {
    console.log("NEW CUST PROP", props.newCustomerData);
    if (!customerData.value) return;
    console.log("Adding empty");
    for (let i = 0; i < customerData.value.length; i++) {
        if (customerData.value[i].id == props.newCustomerData.id) {
            customerData.value[i] = props.newCustomerData;
            return;
        }
    }

    customerData.value.push(props.newCustomerData);


})

onBeforeMount(async () => {
    axiosInstance.get("/api/user").then(res => {
        console.log("response", res);
        const temp = res.data;
        customerData.value = res.data;

    }).catch(err => {

        console.log("error", err);
    })
})

</script>