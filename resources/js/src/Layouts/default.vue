<template>
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a
                        href="#"
                        data-toggle="sidebar"
                        class="nav-link nav-link-lg"
                        ><i class="fas fa-bars"></i
                    ></a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
                    <a
                        href="#"
                        data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"
                    >
                        <img
                            alt="image"
                            src="assets/img/avatar/avatar-1.png"
                            class="rounded-circle mr-1"
                        />
                        <div class="d-sm-none d-lg-inline-block">
                            Hi, {{ $page.props.auth.name }}
                        </div></a
                    >
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <form action="POST" @submit.prevent="handleLogout">
                            <button
                                type="submit"
                                class="dropdown-item has-icon text-danger align-items-center d-flex"
                            >
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <SidebarVue />
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <!-- <h1>Default Layout</h1> -->
                    <BreadCrumbsVue />
                </div>

                <div class="section-body">
                    <Transition name="fade">
                        <slot></slot>
                    </Transition>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import BreadCrumbsVue from "../Components/BreadCrumbs.vue";
import SidebarVue from "../Components/Sidebar.vue";

export default {
    components: {
        SidebarVue,
        BreadCrumbsVue,
    },
    data() {
        return {
            logoutForm: this.$inertia.form({
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    methods: {
        handleLogout() {
            return this.logoutForm.post(this.$route("auth.logout"));
        },
    },
};
</script>

<style></style>
