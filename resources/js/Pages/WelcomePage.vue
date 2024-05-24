<script setup>
import { Head, Link } from '@inertiajs/vue3';

  
</script>
<template>
    <main>
        <Head title="Welcome"/>
        <div class="background-image">
            <div class="p-5 flex justify-between items-start w-full">
               <div class="flex flex-col w-[50%] items-start mt-[5%] ml-10 gap-6">
                   <h1 class="text-5xl font-bold tracking-widest text-red-300">Welcome</h1>
                   <p class="text-lg text-justify">
                    Technology, the practical application of scientific knowledge, has revolutionized our lives by enhancing communication, information access, and automation. Innovations like the internet, mobile devices, and artificial intelligence drive productivity and create new opportunities. Despite its many benefits, technology also presents challenges such as cybersecurity threats and ethical concerns, requiring a balanced approach to manage its impact.
                   </p>
                   <button class="mt-10 bg-blue-600 px-4 py-2 rounded tracking-wider font-bold">Learn More</button>
               </div>
               <div class="flex gap-2 text-lg">
                   <Link href="loginPage" class="bg-blue-600 px-3 py-2 rounded text-white tracking-wide hover:opacity-85 transition ease-linear duration-125">Login</Link>
                   <!-- <Link href="registerPage" class="bg-blue-600 px-3 py-2 rounded text-white tracking-wide hover:opacity-85 transition ease-linear duration-125">Register</Link> -->
               </div>
           </div>
        </div>
    </main>
</template>

<style scoped>
.background-image {
    background-image: url('img.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh; /* Adjust as needed */
    /* display: flex;
    justify-content: center;
    align-items: center; */
    color: white;
}
</style>