<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    errors: Object,
})

const form = useForm({
    email: '',
    password: '',
    remember: false
})

const submit = () => {
    form.submit('post', 'loginPage')
}

let inputType = ref("password");

let show = ()=> {
   inputType.value = 'text'
}

let hide = ()=>{
    inputType.value = 'password'
}
</script>
<template>
    <main>
        <Head title="Login"/>
        <div class="w-full">
            <div class="border border-gray-400 w-[30%] p-4 min-h-[45vh] rounded mx-auto mt-40">
                <div
                v-if="$page.props.flash.message"
                class="p-3  text-md text-green-800 rounded  border-green-700 bg-green-300"
                role="alert"
            >
                <span class="font-medium">
                    {{ $page.props.flash.message }}
                </span>
            </div>
            <div v-if="$page.props.logout.message"     class="p-3  text-md text-green-800 rounded  border-green-700 bg-green-300"
                role="alert">
               <span class="font-medium">
                    {{ $page.props.logout.message }}
               </span>
            </div>
    
            <div v-if="$page.props.delete.message"     class="p-3  text-md text-green-800 rounded  border-green-700 bg-green-300"
                role="alert">
               <span class="font-medium">
                    {{ $page.props.delete.message }}
               </span>
            </div>
    
            <div v-if="errors.email || errors.password" class="p-3 text-md text-red-800 rounded border-red-700 bg-red-300" role="alert">
                <span class="font-medium">Login failed. Please check your email and password.</span>
            </div>

                <div>
                    <a href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </a>
                 
                </div>
                <form @submit.prevent="submit"> 
                    <div class="mt-3">
                       <label for="">Email</label>
                       <input type="email" v-model="form.email" class="w-full rounded">
                       <div class="text-red-700" v-if="errors.email">{{ errors.email }}</div>
                    </div> 
                    <div class="mt-3">
                       <label for="">Password</label>
                       
                       <div class="relative">
                           <input :type="inputType" class="w-full rounded" v-model="form.password">
        
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  absolute top-2 right-2 cursor-pointer" @click="show" v-if="inputType == 'password'">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
        
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-2 right-2 cursor-pointer" @click="hide" v-if="inputType == 'text'">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                       </div>
    
                        <div class="text-red-700" v-if="errors.password">{{ errors.password }}</div>
                    </div>
                    <div class="mt-1 flex gap-2 items-center">
                       <input type="checkbox" v-model="form.remember">
                       <span>Remember me</span>
                    </div>
                    <div class="text-center mt-10">
                       <button type="submit" class="bg-blue-600 px-44 py-3 text-xl text-white tracking-wider text-bold rounded">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</template>