<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DashboardController extends Controller
{
    public function adminDashboard(){

        $data_user = User::all();
        $userCount = $data_user->count();
        
        return view('admin.dashboard-admin.mainDashboard-admin', compact('data_user', 'userCount'));
    }

    public function adminDashboardDataUser(){
         $data_user = User::all();
        
         return view('admin.dashboard-admin.dataUser.index', compact('data_user'));
    }

    public function adminDashboardDataModule(){
         $data_user = User::all();
        
         return view('admin.dashboard-admin.dataModule.index', compact('data_user'));
    }
}
