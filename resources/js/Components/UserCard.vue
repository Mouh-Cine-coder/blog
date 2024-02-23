<script>
import { Head, Link } from '@inertiajs/vue3';
    export default {
        components: {
            Link
        },
        props: {
            name: String,
            userImageURL: String,
            // rank
            // posts number
            // reviews
        }
    }    
</script>


<template>
    <Link :href="route('userspace', [ name ])">
        <article class="w-96 border bg-transparent border-gray-300 rounded-md dark:border-red-white">
            <header class="pt-5 pl-5">
                <figure class="flex items-center">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg> -->
                    <img src="../../images/person1.jpg" class="h-9 w-9 rounded-full object-cover" alt="user image">
                    <div class="flex flex-col ml-3">
                        <figcaption class="">{{ name }}</figcaption>
                    </div>
                </figure>
                <!-- <img src="" alt="author avatar"> -->
            </header>
            <blockquote class="p-5">
                <p class="py-2">
                    John Doe is a passionate blogger with a knack for storytelling and a keen eye for detail. His writing style
                    is engaging,
                    often drawing readers in with vivid descriptions and relatable anecdotes.
                </p>
                <div class="flex gap-x-3 flex-wrap">
                    <!-- tags section  -->
                    <Tag class="px-2 rounded bg-orange-500">
                        #tag
                    </Tag>
                    <Tag class="px-2 rounded bg-lime-500">
                        #tag
                    </Tag>
                    <Tag class="px-2 rounded bg-red-500">
                        #tag
                    </Tag>
                </div>
            </blockquote>
            <!-- link to read more about the blog -->
            <footer class="border-t border-gray-300">
                <ul class="flex flex-row">
                    <li class="p-2 border-r border-gray-300 text-center w-1/3">
                        Posts
                        <span class="block">78</span>
                    </li>
                    <li class="p-2 text-center w-1/3">
                        Review
                        <span class="block">4/5</span>
                    </li>
                    <li class="p-2 border-l border-gray-300 text-center w-1/3">
                        Review
                        <span class="block">#5</span>
                    </li>
                </ul>
            </footer>
        </article>
    </Link>
</template>

