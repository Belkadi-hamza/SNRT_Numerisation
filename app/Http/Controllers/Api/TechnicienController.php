<?php

namespace App\Http\Controllers\Api;

use App\Models\Technicien;
use App\Http\Controllers\Controller;
use App\Http\Resources\TechnicienResource;
use App\Http\Requests\StoreTechnicienRequest;
use App\Http\Requests\UpdateTechnicienRequest;

class TechnicienController extends Controller
{
    public function index()
    {
        return TechnicienResource::collection(Technicien::all());
    }

    public function store(StoreTechnicienRequest $request)
    {
        $technicien = Technicien::create($request->validated());
        return new TechnicienResource($technicien);
    }

    public function show($id)
    {
        $technicien = Technicien::findOrFail($id);
        return new TechnicienResource($technicien);
    }

    public function update(UpdateTechnicienRequest $request, $id)
    {
        $technicien = Technicien::findOrFail($id);
        $technicien->update($request->validated());
        return new TechnicienResource($technicien);
    }

    public function destroy($id)
    {
        $technicien = Technicien::findOrFail($id);
        $technicien->delete();
        return response()->json(null, 204);
    }
}
