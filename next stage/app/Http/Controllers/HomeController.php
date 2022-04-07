<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $Employee=Employee::count();
        $Company=Company::count();
        $User=User::count();

        return view('dashboard',compact('Employee','Company','User'));
    }
}
