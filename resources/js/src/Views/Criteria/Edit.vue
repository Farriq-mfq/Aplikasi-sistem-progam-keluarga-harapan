<template>
    <div class="row">
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
                    <h4>Form Edit Criteria</h4>
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
                        <label>Weight / Bobot</label>
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
export default {
    layout: defaultVue,
    props: {
        criteria: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.criteria.name,
                attribute: this.criteria.attribute,
                type: this.criteria.type,
                weight: this.criteria.weight,
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        handleSubmit() {
            return this.form.put(
                this.$route("criteria.update", this.criteria.id),
                {
                    onSuccess: () => {
                        Swal.fire(
                            "Criteria",
                            "Berhasil Mengedit Criteria",
                            "success"
                        );
                    },
                }
            );
        },
    },
};
</script>

<style></style>
