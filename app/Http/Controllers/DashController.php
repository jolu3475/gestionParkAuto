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
    /* Acceil de la dashboard */
    public function index (Request $request) {
        $maintenances = Maintenance::all();
        return view('Dashboard.index', compact('maintenances'));
    }

    /* Parametre du compte utilisateur */
    public function profile (Request $request) {
        return view('Dashboard.users.profile');
    }

    /* Gestion des utilisateurs */
    public function users (Request $request) {
        $users = User::all();
        return view('Dashboard.users', compact('users'));
    }

    /* Visualiser l'utilisateur */
    public function user (Request $request, User $user) {
        return view('Dashboard.users.user', compact('user'));
    }

    /* Ajouter en temps que su ou la retirer */
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

    /* Supprimer l'utilisateur */
    public function deleteUser ( Request $request, User $user ) {
        if ($user->su == 1) {
            return redirect()->route('dash.users.user', $user)->with('error', 'Impossible de supprimer le super utilisateur');
        }
        $user->delete();
        return redirect()->route('dash.users.users')->with('success', 'Utilisateur supprimer avec succès');
    }

    /* Modifier l'utilisateur */
    public function updateUser ( Request $request, User $user ) {
        $request->validate([
            'username' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'matricule' => ['required', 'string', Rule::unique('users')->ignore($user->id), 'max:7']
        ]);
        $user->username = $request->username;
        $user->matricule = $request->matricule;
        $user->save();
        return redirect()->route('dash.profile', $user)->with('success', 'Utilisateur modifier avec succès');
    }

    /* Modifier le mot de passe */
    public function updatePass ( Request $request, user $user) {
        $request->validate([
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
        $user->password = $request->password;
        $user->save();
        return redirect()->route('dash.profile', $user)->with('success', 'Mots de passe modifier avec succès');
    }

    /* Visualiser les maintances */
    public function maintenance (Request $request) {
        $maintenances = Maintenance::with('voiture', 'reparation')->get();
        $voitures = Voiture::all();
        $reparations = Reparation::all();
        // dd($maintenances->first()->reparation());
        return view('Dashboard.maintenance', compact('maintenances', 'voitures', 'reparations'));
    }

    /* Ajouter une maintenance */
    public function addMain (Request $request) {
        $request->validate([
            'voiture_id' => ['required', 'exists:voitures,id'],
            'reparation_id' => ['required', 'exists:reparations,id'],
        ]);
        $request->merge(['debut' => date('Y-m-d')]);
        Maintenance::create($request->all());
        return redirect()->route('dash.maintenance')->with('success', 'Maintenance ajouter avec succès');
    }

    /* Visualiser la maintenance */
    public function main (Request $request, Maintenance $maintenance) {
        return view('Dashboard.maintenance.main', compact('maintenance'));
    }

    /* Visualiser les voitures */
    public function voiture (Request $request) {
        $voiture = Voiture::get();
        return view('Dashboard.voiture', compact('voiture'));
    }

    /* Ajouter une voiture */
    public function ajoutVoiture (addVoiture $request){
        Voiture::create($request->validated());
        return redirect()->route('dash.voiture')->with('success', 'La voiture a été ajouter avec succes');
    }

    /* Visualiser la voiture */
    public function voi (Request $request, voiture $voiture){
        return view('Dashboard.voiture.voiture', compact('voiture'));
    }

    /* Modifier la voiture */
    public function editVoiture (Request $request, voiture $voiture) {
        $request->validate([
            'plaque' => ['required', Rule::unique('voitures')->ignore($voiture->id)],
            'modele' => ['required'],
            'marque' => ['required'],
            'utilisateur' => ['required'],
            'etat' => ['required']
        ]);
        $voiture->plaque = $request->plaque;
        $voiture->modele = $request->modele;
        $voiture->marque = $request->marque;
        $voiture->utilisateur = $request->utilisateur;
        $voiture->etat = $request->etat;
        $voiture->save();
        return redirect()->route('dash.voi', $voiture->id)->with('success', 'Voiture modifier avec succès');
    }

    /* Visualiser les intituler */
    public function intituler (Request $request) {
        $intituler = Reparation::all();
        return view('Dashboard.intituler', compact('intituler'));
    }

    /* Ajout d'une intituler */
    public function addInt (Request $request) {
        $request->validate([
            'type' => ['required', 'string', 'unique:reparations']
        ]);
        Reparation::create($request->all());
        return redirect()->route('dash.intituler')->with('success', 'Intituler ajouter avec succès');
    }

    /* Visualiser l'intituler */
    public function editInt (Request $request, Reparation $reparation) {
        return view('Dashboard.intituler.edit', compact('reparation'));
    }

    /* Modifier l'intituler */
    public function updateInt (Request $request, Reparation $reparation) {
        $request->validate([
            'type' => ['required', 'string', Rule::unique('reparations')->ignore($reparation->id)]
        ]);
        $reparation->type = $request->type;
        $reparation->save();
        return redirect()->route('dash.intituler')->with('success', 'Intituler modifier avec succès');
    }
}
