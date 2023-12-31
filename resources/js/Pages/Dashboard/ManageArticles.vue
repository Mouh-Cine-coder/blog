<script>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Icon from '@/Components/icon.vue'

export default {
    components: {
        Head,
        Link,
        Icon,
        DashboardLayout
    },
    props: {
        articles: Object
    },
}

</script>

<template>
    <DashboardLayout>
        <Head title="Articles" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Articles</h2>
        </template>

        <div class="flex items-center  justify-between mb-6">
            <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 ml-9 mt-3 px-4 rounded" :href="route('articles.create')">
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;article</span>
            </Link>
        </div>

        <!-- Display all articles for the login user -->
        <div class="bg-slate-500 rounded-md shadow overflow-x-auto mt-8 mx-9 text-white">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">#</th>
                    <th class="pb-4 pt-6 px-6">title</th>
                    <th class="pb-4 pt-6 px-6">category</th>
                </tr>
                <tr v-for="article in articles" :key="article.id"  class="hover:bg-slate-700 focus-within:bg-slate-700">
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`articles/${article.id}/edit`">
                            {{ article.id }}
                        </Link>
                    </td>
                    <td class="border-t"> 
                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`articles/${article.id}/edit`">
                            {{ article.title }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`articles/${article.id}/edit`">
                            {{ article.category.name }}
                        </Link>
                    </td>
                    <td class="w-px border-t">
                        <Link class="flex items-center px-4" :href="`articles/${article.id}/edit`">
                            <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                        </Link>
                    </td>
                </tr>
                <tr v-if="articles.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">No articles found.</td>
                </tr>
            </table>
        </div>

    </DashboardLayout>
</template>