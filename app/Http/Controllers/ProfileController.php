<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{

    public function index()
    {
        $user = User::find('1');
        return view('profile.index')->with('user', $user);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('profile.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }

}
