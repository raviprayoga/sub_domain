<?php

namespace App\Http\Controllers;

use App\Model_Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model_Employees;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class SubDomain_AuthController extends Controller
{
    public function login()
    {
        $users = \App\Model_Employees::all();
        // $company = DB::table('companies')->find('id', $id);
        return view('auth.login')->with('users', $users);
    }
    public function loginpost(Request $request)
    {
        if(Auth::guard('employe')->attempt(['email' => $request->email, 'password' => $request->password])){
            $cek_employe = Auth::guard('employe')->user()->companies->website;
            $host = request()->getHttpHost(); 
            $first_word = explode('.',trim($host))[0];
            // dd($cek_employe);
            if($cek_employe != $first_word){
                return response("anda bukan pegawai perusahaan ini");
            }
                return redirect('/home');
        }
        return response('login gagal');
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('login');
    }
}
