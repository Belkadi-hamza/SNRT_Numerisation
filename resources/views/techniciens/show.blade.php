@extends('layouts.app')

@section('title')
    Profile du Technicien
@endsection

@section('main')
    <main class="container">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Profile</h1>
            </div>
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Details</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('img\OIP.jpeg') }}" alt="{{ $technicien->Nom }} {{ $technicien->Prenom }}"
                                class="img-fluid rounded-circle mb-2" width="128" height="128" />
                            <h5 class="card-title mb-0">{{ $technicien->Nom }} {{ $technicien->Prenom }}</h5>
                            <div class="text-muted mb-2">Technicien</div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">CIN</h5>
                            <p>{{ $technicien->cin }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Supports Traitements</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>Numéro de Support</th>
                                            <th>Type de Support</th>
                                            <th>Titre</th>
                                            <th>Genre</th>
                                            <th>Durée</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($supports as $support)
                                            <tr>
                                                <td>{{ $support->Num_support }}</td>
                                                <td>{{ $support->TypeDeSupport->Type_support }}</td>
                                                <td>{{ $support->Titre }}</td>
                                                <td>{{ $support->genre->Genre }}</td>
                                                <td>{{ $support->Duree }}</td>
                                                <td>{{ $support->Date_num }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
