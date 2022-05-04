<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;


class AdminController extends Controller
{

    public function index()
    {
        $users = AdminUser::all();
        return view('admin.home', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function edit($id)
    {
        $user = AdminUser::where('id', $id)->first();
        return view('admin.edit', compact('user'));
    }

}
