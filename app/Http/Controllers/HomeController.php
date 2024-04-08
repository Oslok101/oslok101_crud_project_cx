<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function userIndex()
    {
        return view('user.dashboard');
    }
}