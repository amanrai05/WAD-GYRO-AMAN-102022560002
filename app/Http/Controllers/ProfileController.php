<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  # 1. Import User model

class ProfileController extends Controller
{
    public function index()
    {
        # 2. Get one student record
        $mahasiswa = User::first();

        # 3. Send data to view
        return view('Profile', compact('mahasiswa'));
    }
}

