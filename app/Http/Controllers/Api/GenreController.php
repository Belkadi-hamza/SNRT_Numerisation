<?php

namespace App\Http\Controllers\Api;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

class GenreController extends Controller
{
    public function index()
    {
        return GenreResource::collection(Genre::all());
    }

    public function store(StoreGenreRequest $request)
    {
        $genre = Genre::create($request->validated());
        return new GenreResource($genre);
    }

    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return new GenreResource($genre);
    }

    public function update(UpdateGenreRequest $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->update($request->validated());
        return new GenreResource($genre);
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return response()->json(null, 204);
    }
}
