@extends('layouts.app')

@section('content')
    <h1>Liste des supports</h1>
    <form action="{{ route('search.simple') }}" method="GET">
        <input type="text" name="query" placeholder="Recherche simple">
        <button type="submit">Rechercher</button>
    </form>

    <a href="{{ route('search.advanced') }}">Recherche avancée</a>

    <table>
        <thead>
            <tr>
                <th>ID Support</th>
                <th>Num Support</th>
                <th>Type Support</th>
                <th>Titre</th>
                <th>Genre</th>
                <th>Duree</th>
                <th>Date Num</th>
                <th>Technicien</th>
            </tr>
        </thead>
        {{-- <tbody>
            @foreach($supports as $support)
                <tr>
                    <td>{{ $support->ID_support }}</td>
                    <td>{{ $support->Num_support }}</td>
                    <td>{{ $support->typeDeSupport->Type_support }}</td>
                    <td>{{ $support->Titre }}</td>
                    <td>{{ $support->genre->Genre }}</td>
                    <td>{{ $support->Duree }}</td>
                    <td>{{ $support->Date_num }}</td>
                    <td>{{ $support->technicien->Nom }} {{ $support->technicien->Prenom }}</td>
                </tr>
            @endforeach
        </tbody> --}}
    </table>
@endsection
