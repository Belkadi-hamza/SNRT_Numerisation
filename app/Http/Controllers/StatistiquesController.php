<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\Genre;
use App\Models\Technicien;
use App\Models\TypeDeSupport;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatistiquesController extends Controller
{
    public function index()
    {
        // Statistiques
        $nombreSupportsAnnee = Support::whereYear('created_at', Carbon::now()->year)->count();
        $nombreSupportsMois = Support::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $dureeTotaleSemainef = Support::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('Duree');

        // Formatez la durée totale de la semaine en hh:mm:ss
        $dureeTotaleSemaine = $this->formatDuration($dureeTotaleSemainef);

        $totalTechniciens = Technicien::count();
        $techniciensAvecNumerisations = Technicien::whereHas('supports')->distinct()->count();
        $pourcentageTechniciensAvecNumerisations = ($techniciensAvecNumerisations / $totalTechniciens) * 100;

        return view('index', compact(
            'nombreSupportsAnnee',
            'nombreSupportsMois',
            'dureeTotaleSemaine',
            'pourcentageTechniciensAvecNumerisations'
        )
        );
    }

    private function formatDuration($seconds)
    {
        $lengthA = strlen($seconds) - 4;
        $h = substr($seconds, 0, $lengthA);
        $m = substr($seconds, $lengthA, 2);
        $s = substr($seconds, -2);
        return sprintf('%02d:%02d:%02d', $h, $m, $s);
    }

    private function countDigits($var)
    {
        return strlen((string) $var);
    }
    public function dureeParGenre(Request $request)
    {
        $data = Support::selectRaw('genres.Genre, SUM(TIME_TO_SEC(Duree)) as DureeTotale')
            ->join('genres', 'supports.ID_genre', '=', 'genres.ID_genre')
            ->when($request->from, function ($query) use ($request) {
                return $query->whereDate('supports.Date_num', '>=', $request->from);
            })
            ->when($request->to, function ($query) use ($request) {
                return $query->whereDate('supports.Date_num', '<=', $request->to);
            })
            ->groupBy('genres.Genre')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function dureeParType(Request $request)
    {
        $data = Support::selectRaw('type_de_supports.Type_support, SUM(TIME_TO_SEC(Duree)) as DureeTotale')
            ->join('type_de_supports', 'supports.ID_type_support', '=', 'type_de_supports.ID_type_support')
            ->when($request->technicien, function ($query) use ($request) {
                return $query->where('supports.ID_technicien', $request->technicien);
            })
            ->when($request->from, function ($query) use ($request) {
                return $query->whereDate('supports.Date_num', '>=', $request->from);
            })
            ->when($request->to, function ($query) use ($request) {
                return $query->whereDate('supports.Date_num', '<=', $request->to);
            })
            ->groupBy('type_de_supports.Type_support')
            ->get();

        return response()->json($data);
    }

    public function dureeParTechnicien(Request $request)
    {
        $data = Support::selectRaw('techniciens.Nom, techniciens.Prenom, SUM(TIME_TO_SEC(Duree)) as DureeTotale')
            ->join('techniciens', 'supports.ID_technicien', '=', 'techniciens.ID_technicien')
            ->when($request->genre, function ($query) use ($request) {
                return $query->where('supports.ID_genre', $request->genre);
            })
            ->when($request->from, function ($query) use ($request) {
                return $query->whereDate('supports.Date_num', '>=', $request->from);
            })
            ->when($request->to, function ($query) use ($request) {
                return $query->whereDate('supports.Date_num', '<=', $request->to);
            })
            ->groupBy('techniciens.Nom', 'techniciens.Prenom')
            ->get();

        return response()->json($data);
    }

    public function nombreSupports()
    {
        $nombreSupports = Support::count();
        return response()->json(['nombre_supports' => $nombreSupports]);
    }

}
