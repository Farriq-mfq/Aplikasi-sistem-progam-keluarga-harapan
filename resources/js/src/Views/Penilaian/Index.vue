<template>
    <div class="row">
        <Head title="Penilaian" />

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <form
                        method="POST"
                        @submit.prevent="handleNik"
                        v-if="!$page.props.session.data_alternative"
                    >
                        <div class="form-group">
                            <label>Masukan NIK alternative</label>
                            <input
                                type="text"
                                :class="`form-control ${
                                    form.errors.NIK && `is-invalid`
                                } `"
                                v-model="form.NIK"
                            />
                            <div
                                class="invalid-feedback"
                                v-if="form.errors.NIK"
                            >
                                {{ form.errors.NIK }}
                            </div>
                        </div>
                        <div class="form-group">
                            <button
                                class="btn btn-primary me-2"
                                :disabled="form.processing"
                                type="submit"
                            >
                                {{
                                    form.processing ? "Processing..." : "Survey"
                                }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Penilaian</h4>
                            <div class="card-header-action">
                                <form>
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Search"
                                            v-model="search"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th
                                                v-for="criteria in penilaian.criteria"
                                                :key="criteria.id"
                                            >
                                                {{ criteria.name }} -{{
                                                    criteria.attribute
                                                }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="penilaian.alternative">
                                        <tr
                                            v-for="pn in penilaian.alternative"
                                            :key="pn.id"
                                        >
                                            <td>
                                                {{ pn.name }}
                                            </td>
                                            <td
                                                v-for="(nilai, idx) in pn.nilai"
                                                :key="idx"
                                            >
                                                {{ nilai.value }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div v-if="!penilaian.alternative">
                                    <p class="text-center">Not found</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Normalisasi Penilaian</h4>
                            <div class="card-header-action d-flex">
                                <button class="btn btn-danger ml-2">
                                    Cetak Pdf
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th
                                                v-for="criteria in penilaian.criteria"
                                                :key="criteria.id"
                                            >
                                                {{ criteria.name }} -
                                                {{ criteria.weight }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="penilaian.alternative">
                                        <tr
                                            v-for="pn in penilaian.alternative"
                                            :key="pn.id"
                                        >
                                            <td>
                                                {{ pn.name }} - {{ pn.NIK }}
                                            </td>
                                            <td
                                                v-for="(nilai, idx) in pn.nilai"
                                                :key="idx"
                                            >
                                                <span
                                                    v-if="
                                                        nilai.criteria
                                                            .attribute ==
                                                        'benefit'
                                                    "
                                                >
                                                    {{
                                                        parseFloat(
                                                            nilai.value /
                                                                penilaian.nilai[
                                                                    nilai
                                                                        .criteria
                                                                        .id
                                                                ]
                                                        ).toFixed(2)
                                                    }}
                                                </span>
                                                <span
                                                    v-if="
                                                        nilai.criteria
                                                            .attribute == 'cost'
                                                    "
                                                    >{{
                                                        parseFloat(
                                                            penilaian.nilai[
                                                                nilai.criteria
                                                                    .id
                                                            ] / nilai.value
                                                        ).toFixed(2)
                                                    }}</span
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div v-if="!penilaian.alternative">
                                    <p class="text-center">Not found</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Data Nilai Akhir dari
                                {{ penilaian.alternative.length }} Alternative
                            </h4>
                            <div class="card-header-action d-flex">
                                <form>
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Search name"
                                            v-model="search_total"
                                        />
                                    </div>
                                </form>
                                <button class="btn btn-danger ml-2">
                                    Cetak Pdf
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="penilaian.alternative">
                                        <tr
                                            v-for="rank in rangking"
                                            :key="rank.NIK"
                                        >
                                            <td>
                                                {{ rank.name }}
                                            </td>
                                            <td>
                                                {{ rank.nik }}
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-primary"
                                                >
                                                    {{ rank.total }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div v-if="!penilaian.alternative">
                                    <p class="text-center">Not found</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import defaultVue from "../../Layouts/default.vue";
import { Head } from "@inertiajs/inertia-vue";

export default {
    layout: defaultVue,
    props: {
        penilaian: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                NIK: null,
                _token: this.$page.props.csrf_token,
            }),
            search: null,
            search_total: null,
            bobot: [],
            rangking: [],
        };
    },
    methods: {
        handleNik() {
            return this.form.post(this.$route("penilaian.check"));
        },
        getNilai() {
            this.bobot = [];
            for (let criteria in this.penilaian.criteria) {
                let data = this.penilaian.criteria[criteria];
                this.bobot.push({
                    [data.id]: parseFloat(data.weight).toFixed(2),
                });
            }
            for (let pn in this.penilaian.alternative) {
                let pnData = this.penilaian.alternative[pn];
                let total = 0;
                for (let nilai in pnData.nilai) {
                    let nilaiData = pnData.nilai[nilai];
                    let normalisasi = 0;
                    if (nilaiData.criteria.attribute == "cost") {
                        normalisasi =
                            this.penilaian.nilai[nilaiData.criteria.id] /
                            nilaiData.value;
                    } else if (nilaiData.criteria.attribute == "benefit") {
                        normalisasi =
                            nilaiData.value /
                            this.penilaian.nilai[nilaiData.criteria.id];
                    }
                    total =
                        total +
                        nilaiData.criteria.weight * parseFloat(normalisasi);
                }
                this.rangking.push({
                    id: pnData.id,
                    name: pnData.name,
                    nik: pnData.NIK,
                    total: total.toFixed(2),
                });
            }
            this.rangking = this.rangking.sort(function (a, b) {
                return b["total"] - a["total"];
            });
        },
    },
    components: { Head },
    watch: {
        search_total(val) {
            let hasil = this.rangking.filter((el) => {
                return el.name.toUpperCase().indexOf(val.toUpperCase()) > -1;
            });
            this.rangking = [];
            if (val == "" || val == null) {
                this.getNilai();
            } else {
                this.rangking = hasil;
            }
        },
        search(val) {
            return this.$inertia.get(
                this.$route("penilaian.index"),
                { search: val },
                { preserveState: true, replace: true }
            );
        },
    },
    mounted() {
        this.getNilai();
        return this.$inertia.post(
            this.$route("penilaian.res"),
            {
                data: this.rangking,
            },
            { preserveScroll: true, preserveState: true, replace: true }
        );
    },
};
</script>

<style></style>
