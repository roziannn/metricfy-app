<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard(){

        $data_user = User::all();

        return view('admin.dashboard-admin.index', compact('data_user'));
    }
}
