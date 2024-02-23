<script>
import { Head, Link } from '@inertiajs/vue3';
import  Blog  from '../Components/Blog.vue';
import UserCard from '../Components/UserCard.vue'
import Dropdown from '@/Components/Dropdown.vue';
import ThemeController from '@/Components/ThemeController.vue';



// const { system, store } = useColorMode();

export default {
    components: {
        Head,
        Link,
        ThemeController,
        Dropdown,
        Blog,
        UserCard
    },
    props: {
        users: Object,
        canLogin: Boolean
    },
    methods: {
        //
    },
};

</script>

<template>
    <Head title="Bloggy" />

    <div
        class="min-h-screen  bg-center bg-gray-100  dark:bg-gray-900  selection:text-white"
    >
        <nav class="flex justify-between items-center p-5 w-full dark:border-b-[0.1px] dark:border-slate-600 border-b-[0.1px] border-slate-300">
            <h1 class="text-gray-600 dark:text-white">This is blog</h1>

            <div v-if="canLogin" class="flex text-end">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Dashboard</Link
                >

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Log in</Link
                    >

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Register</Link
                    >
                </template>
                
                <div class="border-l border-slate-200 ml-6 pl-6 dark:border-slate-800">
                    <ThemeController />
                </div>
            </div>
        </nav>

        <main class="flex flex-row flex-wrap h-full  gap-x-5 gap-y-1.5 p-4 laptop:text-sm desktop:text-base"> 
            <UserCard v-for="user in users" :name="user.name" :key="user.id" />
        </main>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
