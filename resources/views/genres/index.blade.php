@extends('layouts.app')

@section('title', 'Genres')

@section('style')
    <link href="{{ asset('css/DataTables/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('css/DataTables/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('main')
    <div class="container">
        <h1>Liste des genres</h1>
        {{-- <a href="{{ route('genres.create') }}" class="btn btn-primary">Créer un nouveau genre</a> --}}
        <table id="genres" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Numero de genre</th>
                    <th>Genre</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $index => $genre)
                    <tr>
                        <td><b>N°{{ $index + 1 }}</b></td>
                        <td>{{ $genre->Genre }}</td>
                        <td class="text-center">
                            <a href="{{ route('genres.edit', $genre->ID_genre) }}" class="btn btn-warning mx-4">
                                {{-- Modifier --}}
                                <i class="align-middle" data-feather="edit"></i>
                            </a>

                            <form class="delete-form" action="{{ route('genres.destroy', $genre->ID_genre) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger mx-4 delete-btn" data-bs-toggle="modal"
                                    data-bs-target="#confirmModal">
                                    {{-- Supprimer --}}
                                    <i class="align-middle" data-feather="trash-2"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection

@section('script')
    <x-script :id="'genres'" />
@endsection


