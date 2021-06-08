<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function create(User $user)
    {
        return $user->form();
    }

    public function store(UserRequest $request, User $user)
    {
        $novoUsuario = $user->createNewUser($request->all());

        if($novoUsuario && $novoUsuario->id) {
            session()->flash('message','User created successfully.');
            session()->flash('style','success');
            return redirect()->back();
        }

        session()->flash('message','Something wrong happened.');
        session()->flash('style','danger');
        return redirect()->back()->withInput();
    }
}
