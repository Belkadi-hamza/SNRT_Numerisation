@extends('layouts.app')

@section('title', 'Techniciens')

@section('style')
    <link href="{{ asset('css/DataTables/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('css/DataTables/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('main')
    <div class="container">
        <h1>Liste des technicien</h1>
        <table id="technicien" class="table table-striped" style="width:100%">
            <thead>
                <tr >
                    <th>CIN </th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($techniciens as $technicie)
                    <tr>
                        <td><b>{{ $technicie->cin }}</b></td>
                        <td>{{ $technicie->Nom }}</td>
                        <td>{{ $technicie->Prenom }}</td>
                        <td class="text-center">
                            <a href="{{ route('techniciens.show', $technicie->ID_technicien) }}" class="btn btn-info mx-4">
                                {{-- Voir plus --}}
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                        
                            <a href="{{ route('techniciens.edit', $technicie->ID_technicien ) }}" class="btn btn-warning mx-4">
                                {{-- Modifier --}}
                                <i class="align-middle" data-feather="edit"></i>
                            </a>
                        
                            <form class="delete-form" action="{{ route('techniciens.destroy', $technicie->ID_technicien ) }}"
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
    <x-script :id="'technicien'"/>
@endsection


