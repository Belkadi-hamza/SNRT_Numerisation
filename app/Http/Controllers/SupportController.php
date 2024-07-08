<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\TypeDeSupport;
use App\Models\Genre;
use App\Models\Technicien;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;
use App\Http\Controllers\Api\SupportController as ApiSupportController;
use App\Http\Controllers\Api\GenreController as ApiGenreController;
use App\Http\Controllers\Api\TechnicienController as ApiTechnicienController;
use App\Http\Controllers\Api\TypeDeSupportController as ApiTypeDeSupportController;

class SupportController extends Controller
{
    protected $apiSupportController;
    protected $apiGenreController;
    protected $apiTechnicienController;
    protected $apiTypeDeSupportController;

    public function __construct(ApiSupportController $apiSupportController, ApiGenreController $apiGenreController, ApiTechnicienController $apiTechnicienController, ApiTypeDeSupportController $apiTypeDeSupportController)
    {
        $this->apiSupportController = $apiSupportController;
        $this->apiGenreController = $apiGenreController;
        $this->apiTechnicienController = $apiTechnicienController;
        $this->apiTypeDeSupportController = $apiTypeDeSupportController;
    }

    public function index()
    {
        $supports = $this->apiSupportController->index();
        return view('supports.index', ['supports' => $supports]);
    }

    public function create()
    {
        $typesDeSupport = $this->apiTypeDeSupportController->index();
        $genres = $this->apiGenreController->index();
        $techniciens = $this->apiTechnicienController->index();
        return view('supports.create', compact('typesDeSupport', 'genres', 'techniciens'));
    }

    public function store(StoreSupportRequest $request)
    {

        $validatedData = $request->validated();

        $duree = sprintf('%02d:%02d:%02d', $validatedData['Duree_hours'], $validatedData['Duree_minutes'], $validatedData['Duree_seconds']);
        $validatedData['Duree'] = $duree;

        unset($validatedData['Duree_hours'], $validatedData['Duree_minutes'], $validatedData['Duree_seconds']);

        try {
            $support = Support::create($validatedData);
            return redirect()->route('supports.index')->with('success', 'Support ajouté avec succès.');
        } catch (\Exception $e) {
            $errorMessage = 'Une erreur s\'est produite lors de l\'ajout du support. Veuillez réessayer.';
            return Redirect::back()->withErrors(['error' => $errorMessage]);
        }
    }

    public function show($Num_support)
    {
        // $support = Support::findOrFail($Num_support);
        $support = $this->apiSupportController->show($Num_support);
        return view('supports.show', ['support' => $support]);
    }

    public function edit($ID_support)
    {
        
        $support = $this->apiSupportController->show($ID_support);
        $typesDeSupport = $this->apiTypeDeSupportController->index();
        $genres = $this->apiGenreController->index();
        $techniciens = $this->apiTechnicienController->index();
        // $support = Support::findOrFail($ID_support);
        // $typesDeSupport = TypeDeSupport::all();
        // $genres = Genre::all();
        // $techniciens = Technicien::all();
        return view('supports.edit', compact('support', 'typesDeSupport', 'genres', 'techniciens'));
    }

    public function update(UpdateSupportRequest $request, $ID_support)
    {
        $validatedData = $request->validated();
        $duree = sprintf('%02d:%02d:%02d', $validatedData['Duree_hours'], $validatedData['Duree_minutes'], $validatedData['Duree_seconds']);
        $validatedData['Duree'] = $duree;

        unset($validatedData['Duree_hours'], $validatedData['Duree_minutes'], $validatedData['Duree_seconds']);

        // $support = Support::findOrFail($ID_support);
        // $support->update($validatedData);
        $support = $this->apiSupportController->update($request, $ID_support);
        return redirect()->route('supports.index')->with('success', 'Support mis à jour avec succès.');
    }


    public function destroy($ID_support)
    {
        // $support = Support::findOrFail($ID_support);
        // $support->delete();
        $support = $this->apiSupportController->destroy($ID_support);
        return redirect()->route('supports.index')->with('success', 'Support supprimé avec succès.');
    }
}
