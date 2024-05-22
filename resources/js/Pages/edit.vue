<script setup>
//   import Layout from '@/Layouts/MyLayout.vue'
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

  const props = defineProps({
    users: Object
  })

  const form = useForm({
    name: props.users.name,
    email: props.users.email,
    password: props.users.password
  })


  const submit = ()=> {
    form.submit('put', `/users/${props.users.id}`)
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

        <Head title="Edit"/>

        <div class="ml-20 mt-10">
            <h1 class="mb-5 text-xl font-bold tracking-wide">Edit User</h1>

            <div class="w-[30%]">
                <form @submit.prevent="submit">
                    <div class="mb-2">
                        <label for="">Username</label>
                        <input type="text" class="w-full" v-model="form.name">
                    </div>
                    <div class="mb-2">
                        <label for="">Email</label>
                        <input type="email" class="w-full" v-model="form.email">
                    </div>
                    <div class="mb-2">
                        <label for="">New Password</label>
                        <!-- <input type="text" class="w-full" v-model="form.password"> -->
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
                    </div>

                    <div class="flex gap-2 items-center">
                        <button type="submit" class="bg-blue-600 mt-4 p-2 text-white rounded-md">Save changes</button>
                        <a href="/list" class="bg-slate-300 mt-4 rounded px-4 py-2">
                            Cancel
                        </a>
                    </div>

                    
                </form>
            </div>
        </div>
  

</template>