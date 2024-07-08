@extends('layouts.app')

@section('title', 'Types de support')

@section('style')
    <link href="{{ asset('css/DataTables/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('css/DataTables/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('main')
    <div class="container">
        <h1>Liste des types type de support</h1>
        {{-- <a href="{{ route('type_de_support.create') }}" class="btn btn-primary">Créer un nouveau genre</a> --}}
        <table id="type_de_support" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Type</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types_de_support as $index => $type_de_support)
                    <tr>
                        <td><b>N°{{ $index + 1 }}</b></td>
                        <td>{{ $type_de_support->Type_support }}</td>
                        <td class="text-center">
                            <a href="{{ route('types_de_support.edit', $type_de_support->ID_type_support) }}"
                                class="btn btn-warning mx-4">
                                {{-- Modifier --}}
                                <i class="align-middle" data-feather="edit"></i>
                            </a>
                   
                            <form class="delete-form" action="{{ route('types_de_support.destroy', $type_de_support->ID_type_support) }}"
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
    <x-script :id="'type_de_support'"/>
@endsection