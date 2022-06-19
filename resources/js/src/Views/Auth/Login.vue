<template>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4"
                >
                    <div class="login-brand">
                        <h1 class="text-dark">Login To Sistem PKH</h1>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Login</h4></div>

                        <div class="card-body">
                            <div
                                class="alert alert-danger"
                                v-if="errors.errorLogin"
                            >
                                {{ errors.errorLogin }}
                            </div>
                            <form method="POST" @submit.prevent="handleSubmit">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input
                                        id="username"
                                        type="username"
                                        :class="`form-control ${
                                            authForm.errors.username &&
                                            `is-invalid`
                                        } `"
                                        name="username"
                                        autofocus
                                        v-model="authForm.username"
                                    />
                                    <div
                                        class="invalid-feedback"
                                        v-if="authForm.errors.username"
                                    >
                                        {{ authForm.errors.username }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label
                                            for="password"
                                            class="control-label"
                                            >Password</label
                                        >
                                    </div>
                                    <input
                                        id="password"
                                        type="password"
                                        :class="`form-control ${
                                            authForm.errors.password &&
                                            `is-invalid`
                                        } `"
                                        name="password"
                                        v-model="authForm.password"
                                    />
                                    <div
                                        class="invalid-feedback"
                                        v-if="authForm.errors.password"
                                    >
                                        {{ authForm.errors.password }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button
                                        :disabled="authForm.processing"
                                        type="submit"
                                        class="btn btn-primary btn-lg btn-block"
                                        tabindex="4"
                                    >
                                        {{
                                            authForm.processing
                                                ? "Processing..."
                                                : "Login"
                                        }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        errors: Object,
    },
    data() {
        return {
            authForm: this.$inertia.form({
                username: null,
                password: null,
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        handleSubmit() {
            this.authForm.post(this.$route("auth.action"), {
                onSuccess: () => {
                    this.authForm.reset("username", "password");
                },
                onError: () => {
                    this.authForm.reset("username", "password");
                },
            });
        },
    },
};
</script>

<style></style>
