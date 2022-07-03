<template>
    <div class="row">
        <Head title="Option Criteria" />

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambahkan Options</h4>
                </div>
                <div class="card-body">
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
                        <div class="form-group">
                            <label>Name</label>
                            <input
                                type="text"
                                :class="`form-control ${
                                    form.errors.name && `is-invalid`
                                } `"
                                v-model="form.name"
                            />
                            <div
                                class="invalid-feedback"
                                v-if="form.errors.name"
                            >
                                {{ form.errors.name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Klasifikasi</label>
                            <select
                                :class="`form-control ${
                                    form.errors.klasifikasi && `is-invalid`
                                } `"
                                v-model="form.klasifikasi"
                            >
                                <option value="">Pilih Klasifikasi</option>
                                <option value="sangat rendah">
                                    Sangat Rendah
                                </option>
                                <option value="rendah">Rendah</option>
                                <option value="sedang">Sedang</option>
                                <option value="tinggi">Tinggi</option>
                                <option value="sangat tinggi">
                                    Sangat Tinggi
                                </option>
                            </select>
                            <div
                                class="invalid-feedback"
                                v-if="form.errors.klasifikasi"
                            >
                                {{ form.errors.klasifikasi }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Value (ex : 1.5)</label>
                            <input
                                type="text"
                                :class="`form-control ${
                                    form.errors.value && `is-invalid`
                                } `"
                                v-model="form.value"
                            />
                            <div
                                class="invalid-feedback"
                                v-if="form.errors.value"
                            >
                                {{ form.errors.value }}
                            </div>
                        </div>
                        <div class="form-group">
                            <button
                                class="btn btn-primary"
                                :disabled="form.processing"
                            >
                                {{ form.processing ? "Loading..." : "Submit" }}
                            </button>
                            <button class="btn btn-danger" v-if="edit">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ criteria.name }} Option</h4>
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
                                    <th>Name</th>
                                    <th>Klasifikasi</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody v-if="options.data.length">
                                <tr
                                    v-for="option in options.data"
                                    :key="option.id"
                                >
                                    <td>{{ option.name }}</td>
                                    <td>
                                        {{
                                            option.klasifikasi
                                                .charAt(0)
                                                .toUpperCase() +
                                            option.klasifikasi.slice(1)
                                        }}
                                    </td>
                                    <td>{{ option.value }}</td>
                                    <td>
                                        <button
                                            @click.prevent="
                                                handleDelete(option.id)
                                            "
                                            class="btn btn-danger"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="options.data.length == 0">
                            <p class="text-center">Not found</p>
                        </div>
                    </div>
                </div>
                <PaginationVue
                    v-if="options.data.length"
                    :links="options.links"
                />
            </div>
        </div>
    </div>
</template>

<script>
import Default from "../../Layouts/default.vue";
import PaginationVue from "../../Components/Pagination.vue";
import { Link, Head } from "@inertiajs/inertia-vue";
import Swal from "sweetalert2";

export default {
    layout: Default,
    components: { PaginationVue, Link, Head },
    props: {
        options: Object,
        criteria: Object,
    },
    data() {
        return {
            search: null,
            edit: false,
            form: this.$inertia.form({
                criteria_id: this.criteria.id,
                name: null,
                klasifikasi: null,
                value: null,
            }),
        };
    },
    watch: {
        search(value) {
            return this.$inertia.get(
                this.$route("criteria.option", this.criteria.id),
                { search: value },
                { replace: true, preserveState: true, preserveScroll: true }
            );
        },
    },
    methods: {
        handleDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    return this.$inertia.delete(
                        this.$route("criteria.option.delete", id),
                        {
                            preserveState: true,
                            replace: true,
                            preserveScroll: true,
                            onSuccess: () => {
                                Swal.fire(
                                    "Deleted!",
                                    "Berhasil Menghapus Criteria.",
                                    "success"
                                );
                            },
                        }
                    );
                }
            });
        },
        handleSubmit() {
            return this.form.post(this.$route("criteria.option.store"), {
                preserveState: true,
                replace: true,
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire(
                        "Options!",
                        "Berhasil Menambahkan Options .",
                        "success"
                    );
                    this.form.reset("name", "klasifikasi", "value");
                },
            });
        },
    },
};
</script>

<style></style>
