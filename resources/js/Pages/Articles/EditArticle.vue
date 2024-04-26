<script>
import { Head, Link } from '@inertiajs/vue3';
import UserSpaceLayout from '@/Layouts/UserSpaceLayout.vue';

export default {
    components: {
        Link,
        UserSpaceLayout,
        Head,
    },
    props: {
        article: Object
    },
    computed: {
        user() {
            return this.$page.props.auth.user;
        }
    },
    methods: {
        
    },
    mounted() {
        
    }
}   
</script>


<template>
    <UserSpaceLayout>
        <Head title="articles" />
       
    </UserSpaceLayout>
</template>