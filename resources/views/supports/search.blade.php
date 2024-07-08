@extends('layouts.app')

@section('title', 'Recherch')

@section('style')
    <link href="{{ asset('css/DataTables/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('css/DataTables/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <!-- Recherche Simple -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Recherche Simple</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('search.simple') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="query" placeholder="Recherche simple">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Chercher</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Recherche Avancée -->
                <div class="card">
                    <div class="card-header">
                        <h5>Recherche Avancée</h5>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary " id="add-field" type="button"><b>+</b> Container</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('search.advanced') }}" method="GET">
                            <div id="advanced-search-fields">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <select class="form-control field-select" name="fields[]">
                                            <option value="Num_support">Numéro</option>
                                            <option value="type_support">Type</option>
                                            <option value="genre">Genre</option>
                                            <option value="Titre">Titre</option>
                                            <option value="Duree">Durée</option>
                                            <option value="Date_num">Date de Numérisation</option>
                                            <option value="technicien">Technicien</option>
                                        </select>
                                        <select class="form-control operator-select" name="operators[]">
                                            <option value="contains">contient</option>
                                            <option value="equals">égale</option>
                                            <option value="not_equals">n'est pas égal à</option>
                                            <option value="starts_with">commence par</option>
                                            <option value="ends_with">se termine par</option>
                                            <option value="greater_than">supérieur à</option>
                                            <option value="less_than">inférieur à</option>
                                            <option value="greater_than_or_equal">supérieur ou égal à</option>
                                            <option value="less_than_or_equal">inférieur ou égal à</option>
                                            <option value="between">entre</option>
                                        </select>

                                        <input type="text" class="form-control search-value" name="values[]"
                                            placeholder="Valeur">
                                        <div class="input-group-append">
                                            <button class="btn btn-danger remove-field" type="button">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success" type="submit">Chercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Résultats de la recherche -->
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="result">
                                <thead>
                                    <tr>
                                        <th>Numéro de support</th>
                                        <th>Type de support</th>
                                        <th>Titre</th>
                                        <th>Genre</th>
                                        <th>Durée</th>
                                        <th>Date de numérisation</th>
                                        <th>Technicien</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Les résultats de la recherche seront affichés ici -->
                                    @if (!empty($supports))
                                        @foreach ($supports as $support)
                                            <tr>
                                                <td>{{ $support->Num_support }}</td>
                                                <td>{{ $support->typeDeSupport->Type_support }}</td>
                                                <td>{{ $support->Titre }}</td>
                                                <td>{{ $support->genre->Genre }}</td>
                                                <td>{{ $support->Duree }}</td>
                                                <td>{{ $support->Date_num }}</td>
                                                <td>{{ $support->technicien->Nom }} {{ $support->technicien->Prenom }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Template pour les nouveaux champs de recherche -->
    <template id="search-field-template">
        <div class="form-group">
            <div class="input-group mb-3">
                <select class="form-control field-select" name="fields[]">
                    <option value="Num_support">Numéro</option>
                    <option value="type_support">Type</option>
                    <option value="genre">Genre</option>
                    <option value="Titre">Titre</option>
                    <option value="Duree">Durée</option>
                    <option value="Date_num">Date de Numérisation</option>
                    <option value="technicien">Technicien</option>
                </select>
                <select class="form-control" name="operators[]">
                    <option value="contains">contient</option>
                    <option value="equals">égale</option>
                    <option value="not_equals">n'est pas égal à</option>
                    <option value="starts_with">commence par</option>
                    <option value="ends_with">se termine par</option>
                    <option value="greater_than">supérieur à</option>
                    <option value="less_than">inférieur à</option>
                    <option value="greater_than_or_equal">supérieur ou égal à</option>
                    <option value="less_than_or_equal">inférieur ou égal à</option>
                    <option value="between">entre</option>
                </select>

                <input type="text" class="form-control search-value" name="values[]" placeholder="Valeur">
                <div class="input-group-append">
                    <button class="btn btn-danger remove-field" type="button">-</button>
                </div>
            </div>
        </div>
    </template>
@endsection

@section('script')
    <x-script :id="'result'" />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fonction pour changer le type d'input en fonction de la sélection du champ et de l'opérateur
            function toggleFields($select) {
                var selectedField = $select.val();
                var $parent = $select.closest('.form-group');
                var $input = $parent.find('.search-value');

                if (selectedField === 'Date_num') {
                    $input.attr('type', 'date');
                    $input.attr('placeholder', 'Date');
                } else if (selectedField === 'Duree') {
                    $input.attr('type', 'text');
                    $input.attr('placeholder', 'Durée');
                } else {
                    $input.attr('type', 'text');
                    $input.attr('placeholder', 'Valeur');
                }
            }

            // Fonction pour gérer les opérateurs supplémentaires
            function toggleOperator($select) {
                var selectedOperator = $select.val();
                var $parent = $select.closest('.form-group');
                var $input = $parent.find('.search-value');
                var $secondInput = $parent.find('.second-search-value');

                if (selectedOperator === 'between') {
                    if ($secondInput.length === 0) {
                        $parent.append(
                            '<input type="text" class="form-control second-search-value" name="second_values[]" placeholder="Valeur 2">'
                        );
                    }
                } else {
                    $secondInput.remove();
                }
            }

            // Appliquer la fonction aux champs existants
            $('.field-select').each(function() {
                toggleFields($(this));
            });

            $('.operator-select').each(function() {
                toggleOperator($(this));
            });

            // Ajouter un nouveau champ de recherche avancée
            document.getElementById('add-field').addEventListener('click', function() {
                var template = document.getElementById('search-field-template').content.cloneNode(true);
                document.getElementById('advanced-search-fields').appendChild(template);
                var $newSelect = $(template).find('.field-select');
                toggleFields($newSelect);
                $newSelect.on('change', function() {
                    toggleFields($(this));
                });
                var $newOperatorSelect = $(template).find('.operator-select');
                toggleOperator($newOperatorSelect);
                $newOperatorSelect.on('change', function() {
                    toggleOperator($(this));
                });
            });

            // Supprimer un champ de recherche avancée
            document.getElementById('advanced-search-fields').addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-field')) {
                    event.target.closest('.form-group').remove();
                }
            });

            // Appliquer les fonctions de bascule aux sélections modifiées
            $(document).on('change', '.field-select', function() {
                toggleFields($(this));
            });

            $(document).on('change', '.operator-select', function() {
                toggleOperator($(this));
            });
        });
    </script>
@endsection
