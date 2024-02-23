<script>
import { Head, Link } from '@inertiajs/vue3';


    export default {
        components: {
            Link,
        },
        props: {
            
        },
        computed: {
            user() {
                return this.$page.props.auth.user;
            }
    }
    }
</script>


<template>
    <main class="flex flex-row">
        <aside class="w-1/5 border-r h-screen sticky top-0">
            <Link :href="route('userspace', [ user.name ])">
                <figure class="pt-4 text-center">
                    <img src="../../images/person1.jpg" alt="blogger personal picture" class="h-20 w-20 rounded-full object-cover m-auto">
                    <figcaption class="">{{ user.name }}</figcaption>
                </figure>
            </Link>

            <!-- navigation through the usespace -->
            <ul class="mt-16 w-full">
                <li class="">
                    <Link :href="route('profile.edit')" class="p-3 ml-3 hover:bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        <span class="">
                            profile edit
                        </span>
                    </Link>
                </li>
            </ul>
        </aside>
        <slot /> 
    </main>
</template>