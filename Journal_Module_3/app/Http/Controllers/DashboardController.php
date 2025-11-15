<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  # 1. Import the User model

class DashboardController extends Controller
{
    public function index()
    {
        # 2. Retrieve student record
        $mahasiswa = User::first();

        # 3. Determine greeting message
        $hours = date('H');
        $salam = match (true) {
            $hours >= 5 && $hours <= 11 => 'Good Morning',
            $hours >= 12 && $hours <= 14 => 'Good Afternoon',
            $hours >= 15 && $hours <= 17 => 'Good Evening',
            default => 'Good Night',
        };

        # 4. Access time (H format)
        $accessTime = date('H:i:s');

        # 5. Current date (via private method)
        $tanggal = $this->getTanggal();

        # 6. Send data to the view
        return view('Dashboard', compact('mahasiswa', 'salam', 'accessTime', 'tanggal'));
    }

    # 7. Private method for date format
    private function getTanggal()
    {
        return date('d-m-Y');
    }
}
