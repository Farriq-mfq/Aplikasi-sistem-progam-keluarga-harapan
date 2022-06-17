<template>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html">Stisla</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">St</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="dropdown">
                    <Link :href="$route('home.index')" class="nav-link"
                        ><i class="fas fa-fire"></i><span>Dashboard</span></Link
                    >
                </li>
                <li class="menu-header">FITUR</li>
                <li>
                    <Link class="nav-link" :href="$route('users.index')"
                        ><i class="fa fa-user"></i> <span>Users</span></Link
                    >
                </li>
                <li>
                    <a class="nav-link" href="blank.html"
                        ><i class="fa fa-list"></i> <span>Kriteria</span></a
                    >
                </li>
                <li>
                    <a class="nav-link" href="blank.html"
                        ><i class="fa fa-users"></i>
                        <span>Data Penduduk</span></a
                    >
                </li>
                <li>
                    <a class="nav-link" href="blank.html"
                        ><i class="fa fa-rocket"></i> <span>Penilaian</span></a
                    >
                </li>
                <li>
                    <a class="nav-link" href="blank.html"
                        ><i class="fa fa-cog"></i> <span>Settings</span></a
                    >
                </li>
            </ul>
        </aside>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
    components: {
        Link,
    },
    watch: {
        "$page.url"() {
            const matchMedia = window.matchMedia("(max-width:1025px)").matches;
            if (matchMedia) {
                document.body.classList.remove("sidebar-show");
                document.body.classList.add("sidebar-gone");
            }
        },
    },
};
</script>

<style></style>
