<div class="row">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <h5 class="card-title mb-0">Durée par type</h5>
        </div>
        <div class="card-body py-3">
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="fromtype">From</label>
                                <input type="date" id="fromtype" name="fromtype" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label for="totype">To</label>
                                <input type="date" id="totype" name="totype" class="form-control" />
                            </div>
                            <div class="col-md-3 align-self-end">
                                <button class="btn btn-success btn-block" onclick="getDataForType()">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <canvas id="dureeParType" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <h5 class="card-title mb-0">Durée par genre</h5>
        </div>
        <div class="card-body py-3">
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="fromgenre">From</label>
                                <input type="date" id="fromgenre" name="fromgenre" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label for="togenre">To</label>
                                <input type="date" id="togenre" name="togenre" class="form-control" />
                            </div>
                            <div class="col-md-3 align-self-end">
                                <button class="btn btn-success btn-block" onclick="getDataForGenre()">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <canvas id="dureeParGenre" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <h5 class="card-title mb-0">Durée par technicien</h5>
        </div>
        <div class="card-body py-3">
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="fromTechnicien">From</label>
                                <input type="date" id="fromTechnicien" name="fromTechnicien" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label for="toTechnicien">To</label>
                                <input type="date" id="toTechnicien" name="toTechnicien" class="form-control" />
                            </div>
                            <div class="col-md-3 align-self-end">
                                <button class="btn btn-success btn-block"
                                    onclick="getDataForTechnicien()">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <canvas id="dureeParTechnicien" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('script')
    <script src="{{ asset('js/charts/duree-par-charts.js') }}"></script>
@endsection
