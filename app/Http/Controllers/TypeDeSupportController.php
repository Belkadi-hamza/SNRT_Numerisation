<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeDeSupportRequest;
use App\Http\Requests\UpdateTypeDeSupportRequest;
use App\Http\Controllers\Api\TypeDeSupportController as ApiTypeDeSupportController;

class TypeDeSupportController extends Controller
{
    protected $apiTypeDeSupportController;

    public function __construct(ApiTypeDeSupportController $apiTypeDeSupportController)
    {
        $this->apiTypeDeSupportController = $apiTypeDeSupportController;
    }

    public function index()
    {
        $types_de_support = $this->apiTypeDeSupportController->index();
        return view('types_de_support.index', ['types_de_support' => $types_de_support]);
    }

    public function create()
    {
        return view('types_de_support.create');
    }

    public function store(StoreTypeDeSupportRequest $request)
    {
        $this->apiTypeDeSupportController->store($request);
        return redirect()->route('types_de_support.index');
    }

    public function show($ID_type_support)
    {
        $type_de_support = $this->apiTypeDeSupportController->show($ID_type_support);
        return view('types_de_support.show', ['type_de_support' => $type_de_support]);
    }

    public function edit($ID_type_support)
    {
        $type_de_support = $this->apiTypeDeSupportController->show($ID_type_support);
        return view('types_de_support.edit', ['type_de_support' => $type_de_support]);
    }

    public function update(UpdateTypeDeSupportRequest $request, $ID_type_support)
    {
        $this->apiTypeDeSupportController->update($request, $ID_type_support);
        return redirect()->route('types_de_support.index');
    }

    public function destroy($ID_type_support)
    {
        $this->apiTypeDeSupportController->destroy($ID_type_support);
        return redirect()->route('types_de_support.index');
    }
}
