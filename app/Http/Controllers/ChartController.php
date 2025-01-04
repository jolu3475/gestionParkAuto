<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Reparation;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function voiture (Request $request) {
        $total = Voiture::count();
        $reparation = Reparation::get();
        foreach ($reparation as $rep) {
            $data[] = $rep->maintenances->count();
        }
        $label = $reparation->pluck('type');
        $label = $label->merge(['Total']);
        $data = collect($data)->merge([$total]);
        return response()->json([
            'labels' => $label,
            'data' => $data,
        ]);
    }

}
