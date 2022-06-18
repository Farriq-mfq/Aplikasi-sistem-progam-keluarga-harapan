<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Criteria</h4>
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
                            :href="$route('criteria.create')"
                            class="btn btn-primary mb-4"
                            >Tambahkan Criteria <i class="fa fa-plus"></i
                        ></Link>
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Attribute</th>
                                    <th>Type</th>
                                    <th>Bobot</th>
                                    <th>Options</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody v-if="criterias.data.length">
                                <tr
                                    v-for="criteria in criterias.data"
                                    :key="criteria.id"
                                >
                                    <td>{{ criteria.name }}</td>
                                    <td>{{ criteria.attribute }}</td>
                                    <td>{{ criteria.type }}</td>
                                    <td>{{ criteria.weight }}</td>
                                    <td>
                                        <Link
                                            :href="
                                                $route(
                                                    'criteria.option',
                                                    criteria.id
                                                )
                                            "
                                            class="btn btn-primary"
                                        >
                                            Option
                                            {{ criteria.total_option }}
                                            <i class="fa fa-plus"></i>
                                        </Link>
                                    </td>
                                    <td>
                                        <Link
                                            :href="
                                                $route(
                                                    'criteria.edit',
                                                    criteria.id
                                                )
                                            "
                                            class="btn btn-primary"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </Link>
                                        <button
                                            @click.prevent="
                                                handleDelete(criteria.id)
                                            "
                                            class="btn btn-danger"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="criterias.data.length == 0">
                            <p class="text-center">Not found</p>
                        </div>
                    </div>
                </div>
                <PaginationVue
                    v-if="criterias.data.length"
                    :links="criterias.links"
                />
            </div>
        </div>
    </div>
</template>

<script>
import Default from "../../Layouts/default.vue";
import PaginationVue from "../../Components/Pagination.vue";
import { Link } from "@inertiajs/inertia-vue";
import Swal from "sweetalert2";

export default {
    layout: Default,
    components: { PaginationVue, Link },
    props: {
        criterias: Object,
    },
    data() {
        return {
            search: null,
        };
    },
    watch: {
        search(value) {
            return this.$inertia.get(
                this.$route("criteria.index"),
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
                        this.$route("criteria.destroy", id),
                        {
                            preserveScroll: true,
                            preserveState: true,
                            replace: true,
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
    },
};
</script>

<style></style>
