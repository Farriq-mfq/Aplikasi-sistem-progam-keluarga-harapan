<template>
    <div class="row">
        <Head title="Alternative" />

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Alternative</h4>
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
                        <Link
                            :href="$route('alternative.create')"
                            class="btn btn-primary mb-4"
                            >Tambahkan Alternative <i class="fa fa-plus"></i
                        ></Link>
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>Name & NIK</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Penginput data</th>
                                    <th>Tanggal</th>
                                    <th v-if="$page.props.auth.role == 'admin'">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-if="alternatives.data.length">
                                <tr
                                    v-for="alternative in alternatives.data"
                                    :key="alternative.id"
                                >
                                    <td>
                                        <tr>
                                            <td>{{ alternative.name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-secondary">
                                                NIK : {{ alternative.NIK }}
                                            </td>
                                        </tr>
                                    </td>
                                    <td>{{ alternative.address }}</td>
                                    <td>{{ alternative.gender }}</td>
                                    <td>{{ alternative.penginput }}</td>
                                    <td>{{ alternative.created_at }}</td>
                                    <td v-if="$page.props.auth.role == 'admin'">
                                        <button
                                            @click.prevent="
                                                handleDelete(alternative.id)
                                            "
                                            class="btn btn-danger"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="alternatives.data.length == 0">
                            <p class="text-center">Not found</p>
                        </div>
                    </div>
                </div>
                <PaginationVue
                    v-if="alternatives.data.length"
                    :links="alternatives.links"
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
        alternatives: Object,
    },
    data() {
        return {
            search: null,
        };
    },
    watch: {
        search(value) {
            return this.$inertia.get(
                this.$route("alternative.index"),
                { search: value },
                { replace: true, preserveState: true }
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
                        this.$route("users.destroy", id),
                        {
                            preserveScroll: true,
                            preserveState: true,
                            replace: true,
                            onSuccess: () => {
                                Swal.fire(
                                    "Deleted!",
                                    "Berhasil Menghapus User.",
                                    "success"
                                );
                            },
                        }
                    );
                }
            });
        },
    },
};
</script>

<style></style>
