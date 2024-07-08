@props(['nombreSupportsAnnee', 'nombreSupportsMois', 'dureeTotaleSemaine', 'pourcentageTechniciensAvecNumerisations'])

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <!-- Supports cette année -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Numérisations (Année)</h5>
                            <h1 class="mt-1 mb-3">{{ $nombreSupportsAnnee }}</h1>
                        </div>
                    </div>
                </div>
                <!-- Supports ce mois -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Numérisations (Mois en cours)</h5>
                            <h1 class="mt-1 mb-3">{{ $nombreSupportsMois }}</h1>
                        </div>
                    </div>
                </div>
                <!-- Durée totale cette semaine -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Durée Totale (Cette Semaine)</h5>
                            <h1 class="mt-1 mb-3">{{ $dureeTotaleSemaine }}</h1>
                        </div>
                    </div>
                </div>
                <!-- Pourcentage de techniciens avec numérisations -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Techniciens (Numérisations)</h5>
                            <h1 class="mt-1 mb-3">{{ round($pourcentageTechniciensAvecNumerisations, 2) }}%</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
