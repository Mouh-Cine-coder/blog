<script >
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link,
    },
    props: {
        href: {
            type: String,
            required: true
        },
        active: {
            type: Boolean,
        }
    },
    computed: {
        classes() {
            return this.active 
                ? 'p-3 block font-semibold bg-gray-200 border-l-8 border-slate-500'
                : 'p-3 block font-semibold hover:bg-gray-200 bg-gray-50';
        }
    }

}
</script>


<template>
    <Link
        :href="href"
        :class="classes"
        >
            <slot />
    </Link>
</template>
