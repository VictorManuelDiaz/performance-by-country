<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rendimiento por país</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <main>
        <div class="container mt-5">
            <div class="row mb-4">
                <h4 class="col-md-6">Rendimiento por país</h4>
                <div class="col-md-3 offset-md-3">
                    <select class="form-select" id="country-select" aria-label="Country select">
                        <option selected>País</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-3">
                    <select class="form-select" id="device-select" aria-label="Device select">
                        <option selected>Dispositivo</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="tag-select" aria-label="Tag select">
                        <option selected>Etiqueta</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="card-title">Clics</h6>
                                <button type="button" class="btn btn-light">
                                    <i class="bi bi-arrow-up-right"></i> Objetivos
                                </button>
                            </div>
                            <canvas id="clicksChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="card-title">Impresiones</h6>
                                <button type="button" class="btn btn-light">
                                    <i class="bi bi-arrow-up-right"></i> Objetivos
                                </button>
                            </div>
                            <canvas id="impressionsChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="card-title">Top Cambios</h6>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane">URLs</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane">Keywords</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="row pt-4">
                                    <div class="col-md-3">
                                        <select class="form-select" id="device-select" aria-label="Device select">
                                            <option selected>Dispositivo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select" id="tag-select" aria-label="Tag select">
                                            <option selected>Etiqueta</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select" id="country-select" aria-label="Country select">
                                            <option selected>País</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">Top Ganadores</h6>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">URLs</th>
                                                            <th scope="col">Clics</th>
                                                            <th scope="col"><i class="bi bi-graph-up"></i></th>
                                                            <th scope="col">%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">Top Pérdidas</h6>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">URLs</th>
                                                            <th scope="col">Clics</th>
                                                            <th scope="col"><i class="bi bi-graph-up"></i></th>
                                                            <th scope="col">%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">...</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="card-title">Mejor rendimiento</h6>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="card-title">Evolución de etiquetas de keywords</h6>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="card-title">SEO Índice de visibilidad</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
