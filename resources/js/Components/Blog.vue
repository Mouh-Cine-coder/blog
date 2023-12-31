<template>
   <article class="p-6 rounded w-1/6 bg-slate-300">
        <header>
            <figure class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <div class="flex flex-col ml-3">
                    <figcaption class=" text-sm ">{{ article.user.name }}</figcaption>
                    <span class="text-xs text-neutral-600 inline">12-4-2023</span>
                </div>
            </figure>
            <!-- <img src="" alt="author avatar"> -->
        </header>
        <main>
            <p class="p-3">
                {{article.title}}
            </p>
            <div class="flex" v-for="tag in article.tags">
                <!-- tags section  -->
                <Tag>
                    {{ tag.name }}
                </Tag>
            </div>
        </main>
        <!-- link to read more about the blog -->
        <footer class="mt-2 text-blue-700">
            <Link :href="route('Home')">Read More &rarr;</Link>
        </footer>
   </article>
</template>


<script>
import  {Link}  from '@inertiajs/vue3';
import Tag from './Tag.vue';


export default {
    components: {
        Tag,
        Link
    },
    props: {
        article: Object
    },
    mounted() {
        // Log the value of myProperty to the console
        // console.log(this.article);
    }
};
</script>