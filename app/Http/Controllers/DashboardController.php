<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Blog;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DashboardController extends Controller
{
    public function adminDashboard()
    {

        $userCount = User::all()->count();
        $moduleCount = Module::all()->count();
        $blogCount = Blog::all()->count();
        $banksoalCount = Banksoal::all()->count();

        return view('admin.dashboard-admin.mainDashboard-admin', compact(
            'userCount',
            'banksoalCount',
            'moduleCount',
            'blogCount'
        ));
    }

    public function adminDashboardDataUser()
    { //view
        $data_user = User::all();

        return view('admin.dashboard-admin.dataUser.index', compact('data_user'));
    }

    public function adminDashboardDataModule()
    { //view
        $data_module = Module::orderBy('created_at', 'asc')->get();

        return view('admin.dashboard-admin.dataModule.index', compact('data_module'));
    }

    public function adminDashboardDataBlog()
    { //view
        $data_blog = Blog::orderBy('created_at', 'asc')->get();

        return view('admin.dashboard-admin.dataBlog.index', compact('data_blog'));
    }

    public function adminDashboardDataBanksoal()
    { //view
        $data_banksoal = Banksoal::orderBy('created_at', 'asc')->get();

        return view('admin.dashboard-admin.dataBanksoal.index', compact('data_banksoal'));
    }
}
