<script setup>
  import { Link } from '@inertiajs/vue3'

  
  function dropDown(){
        document.querySelector('#submenu').classList.toggle('hidden')
    }
</script>
<template>
    <div class="bg-gray-100 w-full h-[102vh] -mt-5 p-3">
        <div class="m-5 flex p-4 w-[85%] text-black mx-auto shadow-md rounded relative bg-white">
            <div class="flex-1">
                <span>Logo</span>
                <!-- <iframe width="115" height="160" src="https://www.youtube.com/embed/YyNz4--6fro" title="World’s Smartest Dog" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
            </div>
            <div>
               
                <div class="flex">
                    <Link href="landing" class="-ml-10 mr-3" :class="{'border-b border-blue-400 transition ease-linear duration-150' : $page.component == 'LandingPage'}">Home</Link>
                    <Link href="list" class=" ml-1 mr-7" :class="{'border-b border-blue-400 transition ease-linear duration-150' : $page.component == 'List'}">List</Link>
                    <div class="absolute top-4 -right-2 mr-4">
                        <div @click="dropDown()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div class="text-md bg-gray-200 rounded w-[100px] p-2 right-36 top-14 hover:bg-gray-300 ml-1 fixed hidden"  id="submenu">
                            <Link class="" :href="route('logout')" method="post">Log out</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-10">
            <Transition  name="transition" mode="out-in">
                <slot/>
            </Transition>
        </div>
    </div>
</template>

<style>

@keyframes zoom-in {
    0% {
        opacity: 0.2;
    }
    100% {
        opacity: 1;
    }
}

@keyframes zoom-out {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0.2;
    }
}

.fade-enter-active, .fade-leave-active {
    animation: ease 1s;
}

.fade-enter-from {
    opacity: 0.2;
    animation-name: zoom-in;
}

.fade-leave-to {
    opacity: 0.2;
    animation-name: zoom-out;
}

</style>