<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
