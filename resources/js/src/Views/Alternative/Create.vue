<template>
    <div class="row">
        <Head title="Alternative Create" />

        <div class="col-12">
            <div
                :class="`alert ${
                    $page.props.session.alert['type'] == 'success'
                        ? 'alert-success'
                        : 'alert-danger'
                }`"
                v-if="$page.props.session.alert"
            >
                {{ $page.props.session.alert["message"] }}
            </div>
            <form method="POST" @submit.prevent="handleSubmit">
                <div class="card-header">
                    <h4>Form Tambahkan Penduduk atau Alternative</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input
                            type="number"
                            :class="`form-control ${
                                form.errors.NIK && `is-invalid`
                            } `"
                            v-model="form.NIK"
                        />
                        <div class="invalid-feedback" v-if="form.errors.NIK">
                            {{ form.errors.NIK }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input
                            type="text"
                            :class="`form-control ${
                                form.errors.name && `is-invalid`
                            } `"
                            v-model="form.name"
                        />
                        <div class="invalid-feedback" v-if="form.errors.name">
                            {{ form.errors.name }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input
                            type="text"
                            :class="`form-control form-control-lg ${
                                form.errors.address && `is-invalid`
                            } `"
                            v-model="form.address"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="form.errors.address"
                        >
                            {{ form.errors.address }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select
                            v-model="form.gender"
                            :class="`form-control ${
                                form.errors.gender && `is-invalid`
                            } `"
                        >
                            <option value="">Pilih Gender</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                        <div class="invalid-feedback" v-if="form.errors.gender">
                            {{ form.errors.gender }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input
                            type="file"
                            :class="`form-control ${
                                form.errors.foto && `is-invalid`
                            } `"
                            @input="form.foto = $event.target.files[0]"
                            @change="previewImage"
                        />
                        <div class="invalid-feedback" v-if="form.errors.foto">
                            {{ form.errors.foto }}
                        </div>
                        <div class="progress mt-2" v-if="form.progress">
                            <div
                                class="progress-bar"
                                role="progressbar"
                                data-width="50%"
                                aria-valuenow="50"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                :style="`width: ${form.progress.percentage}%`"
                            >
                                {{ form.progress.percentage }}%
                            </div>
                        </div>
                        <img
                            v-show="preview"
                            :src="preview"
                            class="img-thumbnail"
                        />
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" :disabled="form.processing">
                        {{ form.processing ? "Loading..." : "Submit" }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import defaultVue from "../../Layouts/default.vue";
import { Head } from "@inertiajs/inertia-vue";
export default {
    layout: defaultVue,
    components: {
        Head,
    },
    data() {
        return {
            form: this.$inertia.form({
                NIK: null,
                name: null,
                address: null,
                gender: null,
                foto: null,
                _token: this.$page.props.csrf_token,
            }),
            preview: null,
        };
    },
    methods: {
        handleSubmit() {
            return this.form.post(this.$route("alternative.store"), {
                onSuccess: () => {
                    this.form.reset("NIK", "name", "address", "gender", "foto");
                },
            });
        },
        previewImage(e) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.preview = e.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        },
    },
};
</script>

<style></style>
