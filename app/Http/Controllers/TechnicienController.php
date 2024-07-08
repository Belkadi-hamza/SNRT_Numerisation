<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\Technicien;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreTechnicienRequest;
use App\Http\Requests\UpdateTechnicienRequest;
use App\Http\Controllers\Api\TechnicienController as ApiTechnicienController;

class TechnicienController extends Controller
{
    protected $apiTechnicienController;

    public function __construct(ApiTechnicienController $apiTechnicienController)
    {
        $this->apiTechnicienController = $apiTechnicienController;
    }

    public function index()
    {
        $techniciens = $this->apiTechnicienController->index();
        return view('techniciens.index', ['techniciens' => $techniciens]);
    }

    public function create()
    {
        return view('techniciens.create');
    }

    public function store(StoreTechnicienRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $technicien = Technicien::create($validatedData);
            return redirect()->route('techniciens.index')->with('success', 'Technicien ajouté avec succès.');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Une erreur s\'est produite lors de l\'ajout du technicien. Veuillez réessayer.']);
        }
    }

    public function show($id)
    {
        $technicien = $this->apiTechnicienController->show($id);
        $supports = Support::where('ID_technicien', $id)->get();

        return view('techniciens.show', compact('technicien', 'supports'));
    }

    public function edit($id)
    {
        $technicien = $this->apiTechnicienController->show($id);
        return view('techniciens.edit', ['technicien' => $technicien]);
    }

    public function update(UpdateTechnicienRequest $request, $id)
    {
        $this->apiTechnicienController->update($request, $id);
        return redirect()->route('techniciens.index')->with('success', 'Technicien mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->apiTechnicienController->destroy($id);
        return redirect()->route('techniciens.index')->with('success', 'Technicien supprimé avec succès.');
    }
}
