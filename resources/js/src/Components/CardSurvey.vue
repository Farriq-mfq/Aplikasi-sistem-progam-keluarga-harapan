<template>
    <div class="card shadow">
        <div
            :class="`card-header ${
                data.alternative_value ? `bg-success` : `bg-primary`
            } text-white`"
        >
            <h4>{{ data.criteria.name }}</h4>
        </div>
        <div class="card-body">
            <form
                @submit.prevent="handlePenilaian"
                v-if="!data.alternative_value"
            >
                <div class="form-group">
                    <label class="form-label"
                        >Pilih Opsi {{ data.criteria.name }}</label
                    >
                    <div class="selectgroup selectgroup-pills">
                        <label
                            class="selectgroup-item"
                            v-for="criteria_options in data.criteria_options"
                            :key="criteria_options.id"
                        >
                            <input
                                type="radio"
                                :name="data.criteria.name"
                                :value="criteria_options.id"
                                class="selectgroup-input"
                                v-model="form.criteria_option_id"
                            />
                            <span class="selectgroup-button">
                                {{ criteria_options.name }} -
                                {{ criteria_options.klasifikasi }}
                            </span>
                        </label>
                        <div
                            class="text-danger"
                            v-if="form.errors.criteria_option_id"
                        >
                            {{ form.errors.criteria_option_id }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary me-2" type="submit">
                        Simpan
                    </button>
                </div>
            </form>
            <span v-if="data.alternative_value" class="badge badge-success"
                ><i class="fa fa-check"></i> Terisi</span
            >
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
    data() {
        return {
            form: this.$inertia.form({
                alternative_id: this.id_alternative,
                criteria_id: this.data.criteria.id,
                criteria_option_id: null,
                _token: this.$page.props.csrf_token,
            }),
        };
    },
    props: {
        data: Object,
        id_alternative: Number,
    },
    methods: {
        handlePenilaian() {
            Swal.fire({
                title: "Yakin ?",
                text: "Aksi ini tidak bisa mengubah penilaian dari alternative",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Lakukan saja",
            }).then((result) => {
                if (result.isConfirmed) {
                    return this.form.post(
                        this.$route("penilaian.post"),
                        {
                            onSuccess: () => {},
                        },
                        { preserveState: true, replace: true }
                    );
                }
            });
        },
    },
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    opacity: 1;
    transition: all 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transition: all 0.3s ease;
}
</style>
