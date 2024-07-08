<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateGenreRequest;
use App\Http\Controllers\Api\GenreController as ApiGenreController;

class GenreController extends Controller
{
    protected $apiGenreController;

    public function __construct(ApiGenreController $apiGenreController)
    {
        $this->apiGenreController = $apiGenreController;
    }

    public function index()
    {
        $genres = $this->apiGenreController->index();
        return view('genres.index', ['genres' => $genres]);
    }


    public function create()
    {
        return view('genres.create');
    }

    public function store(StoreGenreRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $genre = Genre::create($validatedData);
            return redirect()->route('genres.index')->with('success', 'Genre ajouté avec succès.');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Une erreur s\'est produite lors de l\'ajout du genre. Veuillez réessayer.']);
        }
    }


    public function show($id)
    {
        $genre = $this->apiGenreController->show($id);
        return view('genres.show', ['genre' => $genre]);
    }

    public function edit($id)
    {
        $genre = $this->apiGenreController->show($id);
        return view('genres.edit', ['genre' => $genre]);
    }


    public function update(UpdateGenreRequest $request, $id)
    {
        $this->apiGenreController->update($request, $id);
        return redirect()->route('genres.index');
    }

    public function destroy($id)
    {
        $this->apiGenreController->destroy($id);
        return redirect()->route('genres.index');
    }
}
