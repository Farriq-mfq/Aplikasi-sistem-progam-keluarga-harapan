<template>
    <div class="row">
        <Head title="Survey" />
        <div class="col-md-12" v-for="creteria in criterias" :key="creteria.id">
            <card-survey
                :id_alternative="data_alternative.id"
                :data="creteria"
            />
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue";
import CardSurvey from "../../Components/CardSurvey.vue";
import defaultVue from "../../Layouts/default.vue";
export default {
    components: { CardSurvey, Head },
    layout: defaultVue,
    props: {
        criterias: Array,
        data_alternative: Object,
    },
};
</script>

<style></style>
