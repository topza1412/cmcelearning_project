<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Course;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('session_login_admin');
    }


    public function index()
    {   

        return view('page.admin.index');
    }
}
