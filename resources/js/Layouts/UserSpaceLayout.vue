<script>
import { Head, Link } from '@inertiajs/vue3';
import UserSpaceLink from '@/Components/UserSpaceLink.vue'

export default {
    data() {
        return {
            show: true,
        }
    },
    components: {
        Link,
        UserSpaceLink,
    },
    props: {
    },
    computed: {
        userId() {
            return this.$page.props.auth.user.id;
        },
    },
    methods: {
    }
}
</script>


<template>
    <main class="flex flex-row relative">
        <Transition name="fade">
            <button 
                    class="absolute top-3 left-3"
                    @click="show = !show"
                    v-show="!show"
                    
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
            </button>
        </Transition>
        <Transition name="slide-fade">
            <aside 
                class="w-1/5 border-r h-screen sticky top-0" 
                v-if="show"
            >
            <button 
                class="absolute right-5"
                @click="show = !show"
                
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
                
                <Link>
                    <figure class="mt-4 text-center">
                        <img src="../../images/person1.jpg" alt="blogger personal picture"
                            class="h-20 w-20 rounded-full object-cover m-auto">
                        <figcaption class="">
                            <slot name="username"></slot>
                        </figcaption>
                    </figure>
                </Link>
                
                 <!-- navigation through the usespace -->
                <ul class="mt-16 w-full box-border">
                    <li class="box-border">
                        <UserSpaceLink
                            v-if="$page.props.authorization.edit_profile_authorization"
                            :href="route('userArticles', [ userId ])"
                            :active="route().current('userArticles', [ userId ])"
                            class="mt-1"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                class="inline w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                                <span class="cursor-default">
                                    Posts
                                </span>
                        </UserSpaceLink>

                        <UserSpaceLink
                            v-if="$page.props.authorization.edit_profile_authorization"
                            :href="route('profile.edit', [ userId ])"
                            :active="route().current('profile.edit', [ userId ])"
                        >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="inline w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                <span class="cursor-default">
                                    profile edit
                                </span>
                        </UserSpaceLink>
                    </li>
                </ul>	
            </aside>
        </Transition>
        <slot />
</main>
</template>

<style>
    /* we will explain what these classes do next! */
.slide-fade-enter-active {
  transition: all 0.2s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.5s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(-20px);
  opacity: 0;
}

</style>