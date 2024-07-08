@extends('layouts.app')

@section('title', 'Supports')

@section('style')
    <link href="{{ asset('css/DataTables/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('css/DataTables/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('main')
    <div class="container">
        <h1>Liste des supports</h1>
        <table id="supports" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Numéro de support</th>
                    <th>Type de support</th>
                    <th>Titre</th>
                    <th>Genre</th>
                    <th>Durée</th>
                    <th>Date de numérisation</th>
                    <th>Technicien</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supports as $support)
                    <tr>
                        <td>{{ $support->Num_support }}</td>
                        <td>{{ $support->typeDeSupport->Type_support }}</td>
                        <td>{{ $support->Titre }}</td>
                        <td>{{ $support->genre->Genre }}</td>
                        <td>{{ $support->Duree }}</td>
                        <td>{{ $support->Date_num }}</td>
                        <td>{{ $support->technicien->Nom }} {{ $support->technicien->Prenom }}</td>
                        <td class="text-center">
                            <a href="{{ route('supports.edit', $support->ID_support) }}" class="btn btn-warning">
                                {{-- Modifier --}}
                                <i class="align-middle" data-feather="edit"></i>
                            </a>

                            <form class="delete-form" action="{{ route('supports.destroy', $support->ID_support) }}"
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
    <x-script :id="'supports'"/>
@endsection
