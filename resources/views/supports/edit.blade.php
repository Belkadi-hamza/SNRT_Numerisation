@extends('layouts.app')

@section('title')
    Modifier un support
@endsection

@section('style')
    <script src="{{ asset('js/DataTables/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/DataTables/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('main')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-1">
                        <h1 class="h2">Modifier un support</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form action="{{ route('supports.update', $support->ID_support) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    {{-- Numéro de support --}}
                                    <div class="mb-3">
                                        <label class="form-label">Numéro de support</label>
                                        <input class="form-control form-control-lg" type="text" name="Num_support"
                                            placeholder="Entrez le numéro de support" value="{{ $support->Num_support }}" />
                                        @error('Num_support')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Titre --}}
                                    <div class="mb-3">
                                        <label class="form-label">Titre</label>
                                        <input class="form-control form-control-lg" type="text" name="Titre"
                                            placeholder="Entrez le titre" value="{{ $support->Titre }}" />
                                        @error('Titre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Type de support --}}
                                    <div class="mb-3">
                                        <label class="form-label">Type de support</label>
                                        <select class="form-select form-control-lg" name="ID_type_support"
                                            id="type_support">
                                            @foreach ($typesDeSupport as $type)
                                                <option value="{{ $type->ID_type_support }}"
                                                    @if ($support->ID_type_support == $type->ID_type_support) selected @endif>
                                                    {{ $type->Type_support }}</option>
                                            @endforeach
                                        </select>
                                        @error('ID_type_support')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Genre --}}
                                    <div class="mb-3">
                                        <label class="form-label">Genre</label>
                                        <select class="form-select form-control-lg" name="ID_genre" id="genre">
                                            @foreach ($genres as $genre)
                                                <option value="{{ $genre->ID_genre }}"
                                                    @if ($support->ID_genre == $genre->ID_genre) selected @endif>{{ $genre->Genre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ID_genre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Durée --}}
                                    <div class="mb-3">
                                        <label class="form-label">Durée</label>
                                        <div class="d-flex">
                                            <div class="input-group me-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text h-100">H</div>
                                                </div>
                                                <input class="form-control form-control-lg" type="number"
                                                    name="Duree_hours"
                                                    value="{{ old('Duree_hours', substr($support->Duree, 0, 2)) }}"
                                                    min="0" />
                                            </div>
                                            <div class="input-group me-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text h-100">M</div>
                                                </div>
                                                <input class="form-control form-control-lg" type="number"
                                                    name="Duree_minutes"
                                                    value="{{ old('Duree_minutes', substr($support->Duree, 3, 2)) }}"
                                                    min="0" max="59" />

                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text h-100">S</div>
                                                </div>
                                                <input class="form-control form-control-lg" type="number"
                                                    name="Duree_seconds"
                                                    value="{{ old('Duree_seconds', substr($support->Duree, 6, 2)) }}"
                                                    min="0" max="59" />
                                            </div>
                                        </div>
                                        <ul class="text-danger">
                                            @error('Duree_hours')
                                                <li>{{ $message }}</li>
                                            @enderror
                                            @error('Duree_minutes')
                                                <li>{{ $message }}</li>
                                            @enderror
                                            @error('Duree_seconds')
                                                <li>{{ $message }}</li>
                                            @enderror
                                        </ul>
                                    </div>
                                    {{-- Date de numérisation --}}
                                    <div class="mb-3">
                                        <label class="form-label">Date de numérisation</label>
                                        <input class="form-control form-control-lg" type="date" name="Date_num"
                                            placeholder="Entrez la date de numérisation"
                                            value="{{ $support->Date_num }}" />
                                        @error('Date_num')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Technicien --}}
                                    <div class="mb-3">
                                        <label class="form-label">Technicien</label>
                                        <select class="form-select form-control-lg" name="ID_technicien" id="technicien">
                                            @foreach ($techniciens as $technicien)
                                                <option value="{{ $technicien->ID_technicien }}"
                                                    @if ($support->ID_technicien == $technicien->ID_technicien) selected @endif>
                                                    {{ $technicien->Nom }} {{ $technicien->Prenom }}</option>
                                            @endforeach
                                        </select>
                                        @error('ID_technicien')
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#type_support').select2();
        });
        $(document).ready(function() {
            $('#genre').select2();
        });
        $(document).ready(function() {
            $('#technicien').select2();
        });
    </script>
@endsection
