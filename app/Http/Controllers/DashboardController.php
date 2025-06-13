<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index() {
        $user = Auth::user();
        if(!$user || !isset($user->role)) {
            abort(403, 'Anda tidak diizinkan mengakses halaman ini');
        }
        return $user->role==='admin'? view('dashboard.admin'): view('dashboard.user');
    }
}
