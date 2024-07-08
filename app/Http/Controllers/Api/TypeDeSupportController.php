<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeDeSupport;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeDeSupportResource;
use App\Http\Requests\StoreTypeDeSupportRequest;
use App\Http\Requests\UpdateTypeDeSupportRequest;

class TypeDeSupportController extends Controller
{
    public function index()
    {
        return TypeDeSupportResource::collection(TypeDeSupport::all());
    }

    public function store(StoreTypeDeSupportRequest $request)
    {
        $typeDeSupport = TypeDeSupport::create($request->validated());
        return new TypeDeSupportResource($typeDeSupport);
    }

    public function show($id)
    {
        $typeDeSupport = TypeDeSupport::findOrFail($id);
        return new TypeDeSupportResource($typeDeSupport);
    }

    public function update(UpdateTypeDeSupportRequest $request, $id)
    {
        $typeDeSupport = TypeDeSupport::findOrFail($id);
        $typeDeSupport->update($request->validated());
        return new TypeDeSupportResource($typeDeSupport);
    }

    public function destroy($id)
    {
        $typeDeSupport = TypeDeSupport::findOrFail($id);
        $typeDeSupport->delete();
        return response()->json(null, 204);
    }
}
