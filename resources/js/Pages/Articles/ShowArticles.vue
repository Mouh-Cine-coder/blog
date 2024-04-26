<script>
import { Head, Link } from '@inertiajs/vue3';
import UserSpaceLayout from '@/Layouts/UserSpaceLayout.vue';
import SearchFilter from '@/Components/SearchFilter.vue';

export default {
    components: {
        Link,
        UserSpaceLayout,
        Head,
        SearchFilter
    },
    props: {
        articles: Object
    },
    computed: {
        user() {
            return this.$page.props.auth.user;
        }
    },
    methods: {
        
    },
    mounted() {
        console.log(this.articles);
    }
}   
</script>


<template>
    <UserSpaceLayout>
        <Head title="articles" />
        
        <template #username>
            {{  user.name  }}
        </template>

        <main class="p-12 w-full">
            <h1 class="mb-8 text-3xl font-bold">Articles</h1>
            <div class="flex items-center justify-between mb-3">
                <SearchFilter>
                    <select>
                        
                    </select>
                </SearchFilter>
                <Link class="bg-lime-500 p-3 rounded text-slate-50 " href="">
                    <span>Create</span>
                    <span class="hidden md:inline">&nbsp;Organization</span>
                </Link>
            </div>
            <div class="bg-white rounded-md shadow overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr class="text-left font-bold">
                            <th scope="row" class="border-t px-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th class="border-t pb-4 pt-6">Title</th>
                            <th class="border-t pb-4 pt-6" colspan="2">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="" v-for="article in articles">
                            <th scope="row" class="border-t px-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <td class="border-t py-4 ">{{ article.title }}</td>
                            <td class="border-t py-4">{{ article.category.name }}</td>
                            <td class="border-t flex  px-6 py-4 ">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </UserSpaceLayout>
</template>