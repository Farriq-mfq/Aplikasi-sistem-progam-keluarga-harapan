<template>
    <div class="row">
        <Head title="Setting" />
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Setting nilai</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="handleSubmit" method="POST">
                        <div class="form-group">
                            <label>Setting</label>
                            <input
                                type="text"
                                :class="`form-control ${
                                    form.errors.setting ? `is-invalid` : ``
                                }`"
                                v-model="form.setting"
                            />
                            <div
                                class="invalid-feedback"
                                v-if="form.errors.setting"
                            >
                                {{ form.errors.setting }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Keluar</label>
                            <input
                                type="date"
                                :class="`form-control ${
                                    form.errors.tanggal_keluar
                                        ? `is-invalid`
                                        : ``
                                }`"
                                v-model="form.tanggal_keluar"
                            />
                            <div
                                class="invalid-feedback"
                                v-if="form.errors.tanggal_keluar"
                            >
                                {{ form.errors.tanggal_keluar }}
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue";
import Swal from "sweetalert2";
import defaultVue from "../../Layouts/default.vue";

export default {
    layout: defaultVue,
    props: {
        nilai: Object,
    },
    components: {
        Head,
    },
    data() {
        return {
            form: this.$inertia.form({
                setting: this.nilai ? this.nilai.nilai_minim : null,
                tanggal_keluar: this.nilai ? this.nilai.tanggal_keluar : null,
            }),
        };
    },
    methods: {
        handleSubmit() {
            return this.form.post(this.$route("setting.post"), {
                onSuccess: () => {
                    Swal.fire("Success", "Setting success", "success");
                },
            });
        },
    },
};
</script>

<style></style>
