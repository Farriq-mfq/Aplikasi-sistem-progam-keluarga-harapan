<template>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">
            <Link href="/"> Dashboard </Link>
        </div>
        <div
            class="breadcrumb-item"
            v-for="breadcrumb in breadcrumbs"
            :key="breadcrumb"
        >
            <Link :href="`/${breadcrumb}`" v-if="breadcrumb != ''">
                {{ breadcrumb.charAt(0).toUpperCase() + breadcrumb.slice("1") }}
            </Link>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
    components: {
        Link,
    },
    data() {
        return {
            breadcrumbs: location.href
                .replace(/(\?.*)$/, "")
                .split("/")
                .slice(3),
        };
    },
    watch: {
        "$page.url"() {
            this.breadcrumbs = location.href
                .replace(/(\?.*)$/, "")
                .split("/")
                .slice(3);
        },
    },
};
</script>

<style></style>
