<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function getLogin()
  {
    return view('login');
  }

  public function postLogin(Request $request)
  {
    $users = \App\User::all()->where('roles_id','1');
    if(Auth::attempt(
      [
        'namaAwal' => $request->user,
        'password' => $request->pass,
      ]))
      {
        if(Auth::user()->roles_id == 2)
         {
           return view ('tu.dashboard', compact('users'));
         }
         else
         {
           return view('guru.dashboard', compact('users'));
         }
      }
      else
      {
        return view('login');
      }
  }

}
