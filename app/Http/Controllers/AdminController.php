<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;

class AdminController extends Controller
{
    
    public function dashboard(Request $request): Response
    {
        $users = User::where('usertype', '!=',1)->get();
        return Inertia::render('Admin/Dashboard', [
            'users' => $users,
        ]);
    }
}
