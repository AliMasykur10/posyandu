<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

class AddNewUserController extends Controller
{
    public function index()
    {
        return view('content.dashboard.addNewUser');
    }
}


