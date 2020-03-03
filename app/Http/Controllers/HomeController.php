<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $employees = [];
        $companies = Auth::user()->companies;
        if($companies->count() > 0){
            $data = $companies[0]->id;
            $company = Company::findOrFail($data);
            $employees = $company->users;

        }

        // $employees = $company->users;
        return view('pages.home', compact('employees'));
    }
}
