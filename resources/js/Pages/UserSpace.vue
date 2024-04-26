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
        blogger: Object,
        articles: Object,
        isAuthorized: Boolean,
    },
    mounted() {
        // console.log(this.articles);
    }
}

</script>


<template>
    <UserSpaceLayout>
        <template #username>
            {{  blogger.name  }}
        </template>

        <main class="p-12 w-full">
            <section class="flex flex-col">
                <!-- Main blogs -->
                <div class="flex flex-col gap-y-10  items-center">
                    <Blog v-for="article in articles" :article="article"/>                   
                </div>
            </section>
        </main>
    </UserSpaceLayout>
</template>