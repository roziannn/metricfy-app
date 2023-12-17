<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Module;
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

    public function adminDashboardDataUser(){ //view
         $data_user = User::all();
        
         return view('admin.dashboard-admin.dataUser.index', compact('data_user'));
    }

    public function adminDashboardDataModule(){ //view
        $data_module = Module::orderBy('created_at', 'asc')->get();
        
         return view('admin.dashboard-admin.dataModule.index', compact('data_module'));
    }

    public function adminDashboardDataBlog(){ //view
        $data_blog = Blog::orderBy('created_at', 'asc')->get();
        
         return view('admin.dashboard-admin.dataBlog.index', compact('data_blog'));
    }

    public function adminDashboardDataBanksoal(){ //view
        $data_banksoal = Blog::orderBy('created_at', 'asc')->get();
        
         return view('admin.dashboard-admin.dataBanksoal.index', compact('data_banksoal'));
    }
}
