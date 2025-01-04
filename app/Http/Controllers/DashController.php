<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voiture;
use App\Models\Reparation;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\addVoiture;

class DashController extends Controller
{
    //
    public function index (Request $request) {
        return view('Dashboard.index');
    }

    public function profile (Request $request) {
        return view('Dashboard.users.profile');
    }

    public function users (Request $request) {
        $users = User::all();
        return view('Dashboard.users', compact('users'));
    }

    public function user (Request $request, User $user) {
        // dd($user);
        return view('Dashboard.users.user', compact('user'));
    }

    public function addSu ( Request $request, User $user ) {
        if ($user->su == 1) {
            $users = User::where('su', 1)->count();
            if ($users <= 1) {
                return redirect()->route('dash.users.user', $user)->with('error', 'Impossible de retirer le dernier super utilisateur');
            }
        }
        $user->su = !$user->su;
        $user->save();
        return redirect()->route('dash.users.user', $user)->with('success', $user->su == 1 ? 'Utilisateur ajouter en tant que super utilisateur' : 'Utilisateur retirer du groupe des super utilisateurs');
    }

    public function deleteUser ( Request $request, User $user ) {
        if ($user->su == 1) {
            return redirect()->route('dash.users.user', $user)->with('error', 'Impossible de supprimer le super utilisateur');
        }
        $user->delete();
        return redirect()->route('dash.users.users')->with('success', 'Utilisateur supprimer avec succès');
    }

    public function updateUser ( Request $request, User $user ) {
        $request->validate([
            'username' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'matricule' => ['required', 'string', Rule::unique('users')->ignore($user->id), 'regex:/[A-Z]{4}(-)[0-9]{5}/', 'max:11']
        ]);
        $user->username = $request->username;
        $user->matricule = $request->matricule;
        $user->save();
        return redirect()->route('dash.profile', $user)->with('success', 'Utilisateur modifier avec succès');
    }

    public function updatePass ( Request $request, user $user) {
        $request->validate([
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
        $user->password = $request->password;
        $user->save();
        return redirect()->route('dash.profile', $user)->with('success', 'Mots de passe modifier avec succès');
    }

    public function maintenance (Request $request) {
        $maintenances = Maintenance::all();
        return view('Dashboard.maintenance', compact('maintenances'));
    }

    public function voiture (Request $request) {
        $voiture = Voiture::get();
        return view('Dashboard.voiture', compact('voiture'));
    }

    public function ajoutVoiture (addVoiture $request){
        Voiture::create($request->validated());
        return redirect()->route('dash.voiture')->with('success', 'La voiture a été ajouter avec succes');
    }

    public function voi (Request $request, voiture $voiture){
        return view('Dashboard.voiture.voiture', compact('voiture'));
    }

    public function editVoiture (Request $request, voiture $voiture) {
        $request->validate([
            'plaque' => ['required', Rule::unique('voitures')->ignore($voiture->id)],
            'modele' => ['required'],
            'marque' => ['required']
        ]);
        $voiture->plaque = $request->plaque;
        $voiture->modele = $request->modele;
        $voiture->marque = $request->marque;
        $voiture->save();
        return redirect()->route('dash.voi', $voiture->id)->with('success', 'Voiture modifier avec succès');
    }

    public function intituler (Request $request) {
        $intituler = Reparation::all();
        return view('Dashboard.intituler', compact('intituler'));
    }

    public function addInt (Request $request) {
        $request->validate([
            'type' => ['required', 'string', 'unique:reparations']
        ]);
        Reparation::create($request->all());
        return redirect()->route('dash.intituler')->with('success', 'Intituler ajouter avec succès');
    }

    public function editInt (Request $request, Reparation $reparation) {
        return view('Dashboard.intituler.edit', compact('reparation'));
    }

    public function updateInt (Request $request, Reparation $reparation) {
        $request->validate([
            'type' => ['required', 'string', Rule::unique('reparations')->ignore($reparation->id)]
        ]);
        $reparation->type = $request->type;
        $reparation->save();
        return redirect()->route('dash.intituler')->with('success', 'Intituler modifier avec succès');
    }
}
