<template>
    <div class="row">
        <Head title="Create Criteria" />
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
                    <h4>Form Tambahkan Criteria</h4>
                </div>
                <div class="card-body">
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
                        <label>Attribute</label>
                        <select
                            type="text"
                            :class="`form-control ${
                                form.errors.attribute && `is-invalid`
                            } `"
                            v-model="form.attribute"
                        >
                            <option value="">Pilih Criteria</option>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                        <div
                            class="invalid-feedback"
                            v-if="form.errors.attribute"
                        >
                            {{ form.errors.attribute }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Type ( Optional )</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="form.type"
                        />
                    </div>
                    <div class="form-group mb-0">
                        <label>Weight / Bobot (ex : 1.5)</label>
                        <input
                            type="text"
                            :class="`form-control ${
                                form.errors.weight && `is-invalid`
                            } `"
                            v-model="form.weight"
                        />
                        <div class="invalid-feedback" v-if="form.errors.weight">
                            {{ form.errors.weight }}
                        </div>
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
import Swal from "sweetalert2";
import { Head } from "@inertiajs/inertia-vue";
export default {
    layout: defaultVue,
    components: {
        Head,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                attribute: null,
                type: null,
                weight: null,
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        handleSubmit() {
            return this.form.post(this.$route("criteria.store"), {
                onSuccess: () => {
                    Swal.fire(
                        "Criteria",
                        "Berhasil Menambahkan Criteria",
                        "success"
                    );
                    this.form.reset("name", "attribute", "type", "weight");
                },
            });
        },
    },
};
</script>

<style></style>
