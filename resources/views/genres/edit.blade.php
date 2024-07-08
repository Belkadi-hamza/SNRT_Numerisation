@extends('layouts.app')

@section('title', 'Modifier le genre')

@section('main')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-1">
                        <h1 class="h2">Modifier le genre</h1>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form action="{{ route('genres.update', $genre->ID_genre) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Nom du genre</label>
                                        <input class="form-control form-control-lg" type="text" name="Genre"
                                            value="{{ $genre->Genre }}" />
                                        @error('Genre')
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
