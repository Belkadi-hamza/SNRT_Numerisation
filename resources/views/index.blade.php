@extends('layouts.app')

@section('title', 'Home')

@section('main')
<div class="container-fluid p-0">
    <!-- <h1 class="h3 mb-3">Tableaux de bord <strong> d'analyse</strong></h1> -->
    <x-charts.index :nombreSupportsAnnee="$nombreSupportsAnnee" :nombreSupportsMois="$nombreSupportsMois"
        :dureeTotaleSemaine="$dureeTotaleSemaine" :pourcentageTechniciensAvecNumerisations="$pourcentageTechniciensAvecNumerisations"/>

    <x-charts.duree-par-chart />
</div>
@endsection