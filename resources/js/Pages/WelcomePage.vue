<script setup>
import { Head, Link } from '@inertiajs/vue3';

  
</script>
<template>
    <main>
        <Head title="Welcome"/>
         <div class="p-5 flex items-center">
            <div class="flex-1 text-5xl font-bold tracking-widest">
                <h1>Welcome</h1>
            </div>
            <div class="flex gap-2 text-lg">
                <Link href="loginPage" class="bg-blue-600 px-3 py-2 rounded text-white tracking-wide hover:opacity-85 transition ease-linear duration-125">Login</Link>
                <Link href="registerPage" class="bg-blue-600 px-3 py-2 rounded text-white tracking-wide hover:opacity-85 transition ease-linear duration-125">Register</Link>
            </div>
        </div>
    </main>
</template>