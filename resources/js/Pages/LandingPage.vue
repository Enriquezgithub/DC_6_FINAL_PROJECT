<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from '../Layouts/MyLayout.vue'

defineOptions({
    layout: Layout
  })

</script>
<template>
    <main>
        <Head title="Dashboard"/>
 
           <div class="border p-5 bg-white w-[90%] ml-16 min-h-[20vh]">
            <div
                v-if="$page.props.success.message"
                class="p-3  text-md text-green-800 rounded  border-green-700 bg-green-300"
                role="alert"
            >
                <span class="font-medium">
                    {{ $page.props.success.message }}
                </span>
            </div>
    
            <div v-if="$page.props.delete.message"     class="p-3  text-md text-green-800 rounded  border-green-700 bg-green-300"
                role="alert">
               <span class="font-medium">
                    {{ $page.props.delete.message }}
               </span>
            </div>
    
    
                <div class="border-b border-black w-full">
                    <h1 class=" text-3xl font-bold tracking-wider">Dashboard</h1>
                </div>
                <div class="mt-5 text-lg">
                    <span class="text-red-600">Welcome</span> back <span v-if="$page.props.permissions.posts_manage"> admin </span>{{ $page.props.user.name }}
                </div>
           </div>
    

    </main>
</template>