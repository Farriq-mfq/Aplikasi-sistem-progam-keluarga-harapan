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
                    <h4>Form Edit User</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
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
                        <label>Username</label>
                        <input
                            type="text"
                            :class="`form-control ${
                                form.errors.username && `is-invalid`
                            } `"
                            v-model="form.username"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="form.errors.username"
                        >
                            {{ form.errors.username }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email ( Optional )</label>
                        <input type="email" class="form-control" />
                    </div>
                    <div class="form-group mb-0">
                        <label>Password</label>
                        <input
                            type="text"
                            :class="`form-control ${
                                form.errors.password && `is-invalid`
                            } `"
                            v-model="form.password"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="form.errors.password"
                        >
                            {{ form.errors.password }}
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
        user: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.user.name,
                email: this.user.email,
                username: this.user.username,
                password: null,
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        handleSubmit() {
            return this.form.put(this.$route("users.update"), {
                onSuccess: () => {
                    Swal.fire("Users", "Berhasil Menambahkan User", "success");
                    this.form.reset("name", "email", "username", "password");
                },
            });
        },
    },
};
</script>

<style></style>
