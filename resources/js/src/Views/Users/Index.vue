<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data User</h4>
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
                            :href="$route('users.create')"
                            class="btn btn-primary mb-4"
                            >Tambahkan User <i class="fa fa-plus"></i
                        ></Link>
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody v-if="users.data.length">
                                <tr v-for="user in users.data" :key="user.id">
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.username }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.role }}</td>
                                    <td>
                                        <Link
                                            :href="
                                                $route('users.edit', user.id)
                                            "
                                            class="btn btn-primary"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </Link>
                                        <button
                                            @click.prevent="
                                                handleDelete(user.id)
                                            "
                                            class="btn btn-danger"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="users.data.length == 0">
                            <p class="text-center">Not found</p>
                        </div>
                    </div>
                </div>
                <PaginationVue v-if="users.data.length" :links="users.links" />
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
        users: Object,
    },
    data() {
        return {
            search: null,
        };
    },
    watch: {
        search(value) {
            return this.$inertia.get(
                this.$route("users.index"),
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
                            onSuccess: () => {
                                Swal.fire(
                                    "Deleted!",
                                    "Your file has been deleted.",
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
