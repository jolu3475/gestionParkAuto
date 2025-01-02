<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'matricule' => ['required', 'string', Rule::unique('users')->ignore($user->id), 'regex:/[A-Z]{4}(-)[0-9]{5}/', 'max:11'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
        $user->username = $request->username;
        $user->matricule = $request->matricule;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('dash.profile', $user)->with('success', 'Utilisateur modifier avec succès');
    }

    public function maintenance (Request $request) {
        $maintenances = Maintenance::all();
        if($maintenances->isEmpty()){
            $maintenances= ['vide' => true];
        }else{
            $maintenances= ['vide' => false];
        }
        return view('Dashboard.maintenance', compact('maintenances'));
    }

    public function intitule (Request $request) {
        return view('Dashboard.intitule');
    }
}
