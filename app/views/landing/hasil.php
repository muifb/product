<!-- Page content-->
<style>
    table {
        border: 2px solid black;
        border-collapse: collapse;
    }

    .rounded-top {
        border-top-left-radius: 0.75rem !important;
        border-top-right-radius: 0.75rem !important;
    }

    .rounded-bottom {
        border-bottom-right-radius: 0.50rem !important;
        border-bottom-left-radius: 0.50rem !important;
    }

    .container-oee {
        width: 100%;
        padding-right: var(--bs-gutter-x, .25rem);
        padding-left: var(--bs-gutter-x, .25rem);
        margin-right: auto;
        margin-left: auto;
    }

    .container-cari {
        width: 100%;
        max-width: 70em !important;
        height: 85vh;
        padding-right: var(--bs-gutter-x, 9.5rem);
        padding-left: var(--bs-gutter-x, 9.5rem);
        margin-right: auto;
        margin-left: auto;
    }
</style>
<main class="main py-4">
    <?php
    var_dump($data['search']);
    ?>
    <div class="container-oee my-3">
        <div class="p-2 p-lg-3 bg-gray rounded-top text-center">
            <h1 class="text-light">OEE</h1>
        </div>
        <div class="p-2 p-lg-4 bg-light-gray rounded-bottom">
            <div class="row justify-content-center">
                <div class="col col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Description</th>
                                        <th scope="col">Shift 1</th>
                                        <th scope="col">Shift 2</th>
                                        <th scope="col">Shift 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Planned Operating Time</th>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Planned Shut Down</th>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Unplanned Shut Down</th>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Operating Time</th>
                                        <td>3.5%</td>
                                        <td>3.5%</td>
                                        <td>3.5%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product Ok</th>
                                        <td>20 BOB</td>
                                        <td>20 BOB</td>
                                        <td>20 BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product NC</th>
                                        <td>7 BOB</td>
                                        <td>7 BOB</td>
                                        <td>7 BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product Reject</th>
                                        <td>1 BOB</td>
                                        <td>1 BOB</td>
                                        <td>1 BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total Product</th>
                                        <td>87%</td>
                                        <td>87%</td>
                                        <td>87%</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <h4 class="card-title col-lg-6">Performance</h4>
                                <div class="col-lg-6">
                                    <span class="badge rounded-pill bg-danger px-3">100 %</span>
                                    <span class="badge rounded-pill bg-warning text-dark px-3">100 %</span>
                                    <span class="badge rounded-pill bg-success px-3">100 %</span>
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="card-title col-lg-6">Quality</h4>
                                <div class="col-lg-6">
                                    <span class="badge rounded-pill bg-danger px-3">100 %</span>
                                    <span class="badge rounded-pill bg-warning text-dark px-3">100 %</span>
                                    <span class="badge rounded-pill bg-success px-3">100 %</span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <h4 class="card-title col-lg-6">OEE</h4>
                                <div class="col-lg-6">
                                    <span class="badge rounded-pill bg-danger px-3">100 %</span>
                                    <span class="badge rounded-pill bg-warning text-dark px-3">100 %</span>
                                    <span class="badge rounded-pill bg-success px-3">100 %</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                    <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                                </svg>
                                OEE
                            </h4>
                            <hr>
                            <span class="fs-6 text-muted">Shift 1</span>
                            <div class="progress mb-1" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 39.3%" aria-valuenow="39.3" aria-valuemin="0" aria-valuemax="100">39.3%</div>
                            </div>
                            <span class="fs-6 text-muted">Shift 2</span>
                            <div class="progress mb-1" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 49.1%" aria-valuenow="49.1" aria-valuemin="0" aria-valuemax="100">49.1%</div>
                            </div>
                            <span class="fs-6 text-muted">Shift 3</span>
                            <div class="progress mb-1" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 11.6%" aria-valuenow="11.6" aria-valuemin="0" aria-valuemax="100">11.6%</div>
                            </div>
                            <span class="fs-6 text-muted">All Shift</span>
                            <div class="progress mb-1" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                            </div>
                            <!-- Pie Chart -->
                            <div class="mt-4" id="availibility"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>