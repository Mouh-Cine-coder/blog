<script>
import { Head, Link } from '@inertiajs/vue3';
import Blog from '@/Components/Blog.vue';
import UserSpaceLayout from '@/Layouts/UserSpaceLayout.vue';

export default {
    components: {
        Link,
        UserSpaceLayout
    },
    props: {
       
    },
    computed: {
        user() {
            return this.$page.props.auth.user;
        }
    },
    mounted() {
        // console.log(this.articles);
    }
}

</script>


<template>
    <UserSpaceLayout>
        <template #username>
            {{  user.name  }}
        </template>
        
    </UserSpaceLayout>
</template>