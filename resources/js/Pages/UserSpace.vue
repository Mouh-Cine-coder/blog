<script>
import { Head, Link } from '@inertiajs/vue3';
import Blog from '@/Components/Blog.vue';
import UserSpaceLayout from '@/Layouts/UserSpaceLayout.vue';

    export default {
        components: {
            Link,
            Blog,
            UserSpaceLayout
        },
        props: {
        }
    }
</script>


<template>
    <UserSpaceLayout>
        <main class="flex flex-row w-4/5">
            <section class=" p-4">
                <!-- Search bar  -->
                <form class="max-w-md mx-auto">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
    
                <!-- Category filter -->
                <form action="" class="p-2 my-6 overflow-x-scroll no-scrollbar">
                    <ul class="flex gap-3 ">
                        <li class="">
                            <Tag class="p-2 border rounded-full hover:bg-slate-100">
                                Front_end
                            </Tag>
                        </li>
                        <li>
                            <Tag class="p-2 border rounded-full hover:bg-slate-100">
                                Back_end
                            </Tag>
                        </li>
                        <li>
                            <Tag class="p-2 border rounded-full hover:bg-slate-100">
                                System_architecture
                            </Tag>
                        </li>
                        <li>
                            <Tag class="p-2 border rounded-full hover:bg-slate-100">
                                Coding_style
                            </Tag>
                        </li>
                        <li>
                            <Tag class="p-2 border rounded-full hover:bg-slate-100">
                                Coding_style
                            </Tag>
                        </li>
                       
                        <li>
                            <Tag class="p-2 border rounded-full hover:bg-slate-100">
                                Coding_style
                            </Tag>
                        </li>
                    </ul>
                </form>
                
                <!-- Main blogs -->
                <div class="">
                    <div class="flex flex-col gap-y-10 ">
                        <Blog />
                        <Blog />
                    </div>
                </div>
            </section>
        </main>
    </UserSpaceLayout>
</template>