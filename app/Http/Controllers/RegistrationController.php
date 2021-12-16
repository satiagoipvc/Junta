<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function create(){
        return view('registar');
    }

    public function store(){
       
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $utilizador = User::create(request(['name', 'email', 'password']));

        auth()->login($utilizador);

        return redirect()->to('/backoffice');
    }
}
