<template>
    <div class="card-footer text-right" v-if="links.length">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <li
                    :class="`page-item  ${link.active ? `active` : ``}`"
                    v-for="link in links"
                    :key="link.id"
                >
                    <Link
                        class="page-link"
                        :href="link.url"
                        v-html="link.label"
                        replace
                        preserve-state
                    ></Link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
    components: {
        Link,
    },
    props: {
        links: Array,
    },
};
</script>

<style></style>
