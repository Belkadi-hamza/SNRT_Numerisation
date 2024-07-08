<?php

namespace App\Http\Controllers\Api;

use App\Models\Support;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportResource;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;

class SupportController extends Controller
{
    public function index()
    {
        return SupportResource::collection(Support::all());
    }

    public function store(StoreSupportRequest $request)
    {
        $support = Support::create($request->validated());
        return new SupportResource($support);
    }

    public function show($id)
    {
        $support = Support::findOrFail($id);
        return new SupportResource($support);
    }

    public function update(UpdateSupportRequest $request, $id)
    {
        $support = Support::findOrFail($id);
        $support->update($request->validated());
        return new SupportResource($support);
    }

    public function destroy($id)
    {
        $support = Support::findOrFail($id);
        $support->delete();
        return response()->json(null, 204);
    }
}
