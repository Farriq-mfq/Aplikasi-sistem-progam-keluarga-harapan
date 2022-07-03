<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Alternative</h4>
                            </div>
                            <div class="card-body">
                                {{ info["total_alternative"] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fa fa-users text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Survey</h4>
                            </div>
                            <div class="card-body">
                                {{ info["total_survey"] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Criteria</h4>
                            </div>
                            <div class="card-body">
                                {{ info["total_criteria"] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Penerimaan</h4>
                            </div>
                            <div class="card-body">
                                {{ info["total_lulus"] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>Nama Alternative</th>
                                    <th>Total Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(res, index) in info['result']"
                                    :key="res.id"
                                >
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ res.name }}</td>
                                    <td>
                                        <span class="badge badge-primary">
                                            {{ res.total }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Default from "../Layouts/default.vue";
export default {
    layout: Default,
    props: {
        info: Array,
    },
};
</script>

<style></style>
