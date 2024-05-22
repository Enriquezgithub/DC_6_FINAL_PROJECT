<script setup>
  import Layout from '../Layouts/MyLayout.vue'
  import {Head} from '@inertiajs/vue3'
  import {router} from '@inertiajs/vue3'


  const props = defineProps({
    users: Array
  })

  function edit(id){
        router.get('/users/'+id+'/edit')
  }

  function deleteUser(id){
    if(confirm('Are you sure you want to delete this user?')){
        router.delete('/users/'+id)
    }
      
  }

  defineOptions({
    layout: Layout
  })


</script>
<template>
    <main>
        <Head title="List"/>

            <div class="ml-20">
                <h1 class="mb-5 text-3xl font-bold tracking-wide">Users</h1>
        
                <div
                    v-if="$page.props.edit.message"
                    class="p-3  text-md text-green-800 rounded w-[95%] mb-3 border-green-700 bg-green-300"
                    role="alert"
                >
                    <span class="font-medium">
                        {{ $page.props.edit.message }}
                    </span>
                </div>
                <div class="flex gap-2">
                    <div v-for="users in users" class="border shadow-md p-2 rounded bg-white">
                        <div class="mb-1 text-3xl tracking-wider">
                            {{ users.name }}
                        </div>
                        <div class="italic">
                            {{ users.email }}
                        </div>
        
                        <div class="justify-end mt-4 flex gap-1">
                            <button @click="edit(users.id)" class="text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
        
                            </button>
                            <button class="text-red-500" @click="deleteUser(users.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        
    
    </main>
</template>