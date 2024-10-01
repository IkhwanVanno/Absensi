<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    public function login(Request $request)
    {
        $form = [
            'nim' => $request->nim,
            'password' => $request->password
        ];
        if (Auth::attempt($form)) {
            $cookie = cookie('nim', $request->nim, 100000);
            return Response(redirect("/"))->cookie($cookie);
        } else {
            return redirect("login");
        }

    }

    public function logout() {
        Auth::logout();
        Cookie::forget("nim");
        return redirect("login");
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('welcome');
        } else {
            return redirect('/login');
        }
    }

    public function riwayat()
    {
        if (Auth::check()) {
            $nim = request()->cookie("nim");
            return view("riwayat", ["riwayats" => riwayat::all()]);
        } else {
            return redirect('/login');
        }
    }

    public function absen()
    {
        if (Auth::check()) {
            return view('absen',);
        } else {
            return redirect('/login');
        }
    }

    public function profil()
    {
        if (Auth::check()) {
            $nim = request()->cookie('nim');
            $data = mahasiswa::where("NIM", "like", $nim, "or")->first();
            return view('profil', ['user'=>$data]);
            // dd($data);
        } else {
            return redirect('/login');
        }
    }
}
