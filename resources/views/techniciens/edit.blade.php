@extends('layouts.app')

@section('title')
    Modifier un technicien
@endsection

@section('main')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-1">
                        <h1 class="h2">Modifier un technicien</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form action="{{ route('techniciens.update', $technicien->ID_technicien) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">CIN</label>
                                        <input class="form-control form-control-lg" type="text" name="cin"
                                            value="{{ old('cin', $technicien->cin) }}"
                                            placeholder="Entrez CIN" />
                                        @error('cin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nom</label>
                                        <input class="form-control form-control-lg" type="text" name="Nom"
                                            value="{{ old('Nom', $technicien->Nom) }}"
                                            placeholder="Entrez le nom" />
                                        @error('Nom')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Prenom</label>
                                        <input class="form-control form-control-lg" type="text" name="Prenom"
                                            value="{{ old('Prenom', $technicien->Prenom) }}"
                                            placeholder="Entrez le prenom" />
                                        @error('Prenom')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid gap-2 mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
