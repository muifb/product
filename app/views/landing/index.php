<!-- Page content-->
<main class="main py-4">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                        </svg>
                        AVAILIBILITY
                    </h4>
                    <hr>
                    <span class="fs-6 text-muted">Shift 1</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 39.3%" aria-valuenow="39.3" aria-valuemin="0" aria-valuemax="100">39.3%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 2</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 49.1%" aria-valuenow="49.1" aria-valuemin="0" aria-valuemax="100">49.1%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 3</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 11.6%" aria-valuenow="11.6" aria-valuemin="0" aria-valuemax="100">11.6%</div>
                    </div>
                    <span class="fs-6 text-muted">All Shift</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="mt-3" id="availibility"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#availibility"), {
                                series: [44, 55, 13],
                                chart: {
                                    height: 380,
                                    type: 'pie',
                                    // toolbar: {
                                    //     show: true
                                    // }
                                },
                                labels: ['Shift 1', 'Shift 2', 'Shift 3']
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                        </svg>
                        PERFORMANCE
                    </h4>
                    <hr>
                    <span class="fs-6 text-muted">Shift 1</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 49.1%" aria-valuenow="49.1" aria-valuemin="0" aria-valuemax="100">49.1%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 2</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 39.3%" aria-valuenow="39.3" aria-valuemin="0" aria-valuemax="100">39.3%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 3</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 11.6%" aria-valuenow="11.6" aria-valuemin="0" aria-valuemax="100">11.6%</div>
                    </div>
                    <span class="fs-6 text-muted">All Shift</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="mt-3" id="performance"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#performance"), {
                                series: [55, 44, 13],
                                chart: {
                                    height: 380,
                                    type: 'pie',
                                    // toolbar: {
                                    //     show: true
                                    // }
                                },
                                labels: ['Shift 1', 'Shift 2', 'Shift 3']
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                        </svg>
                        QUALITY
                    </h4>
                    <hr>
                    <span class="fs-6 text-muted">Shift 1</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 39.3%" aria-valuenow="39.3" aria-valuemin="0" aria-valuemax="100">39.3%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 2</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 11.6%" aria-valuenow="11.6" aria-valuemin="0" aria-valuemax="100">11.6%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 3</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 49.1%" aria-valuenow="49.1" aria-valuemin="0" aria-valuemax="100">49.1%</div>
                    </div>
                    <span class="fs-6 text-muted">All Shift</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="mt-3" id="quality"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#quality"), {
                                series: [44, 13, 55],
                                chart: {
                                    height: 380,
                                    type: 'pie',
                                    // toolbar: {
                                    //     show: true
                                    // }
                                },
                                labels: ['Shift 1', 'Shift 2', 'Shift 3']
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
    </div>
</main>