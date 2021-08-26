<?php

namespace App\Http\Controllers;

use App\Model_Companies;
use App\Model_Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getHome()
    {
        // dd($website);
        $host = request()->getHttpHost(); 
        $first_word = explode('.',trim($host))[0];
        // dd($first_word);
        $company = Auth::guard('employe')->user()->company_id;
        $companies = DB::table('companies')->where('id', Auth::guard('employe')->user()->company_id)->get();
        $employe = DB::table('employees')->where('company_id', Auth::guard('employe')->user()->company_id)->get();
        return view('content.home', compact('employe','company','companies'));
    }

    public function dash()
    {
        $company = DB::table('companies')->get();
        return view('dashboard', compact('company'));
    }
    
}
