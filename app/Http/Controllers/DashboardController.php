<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Tableau de bord";



        return view('backend.dashboard', compact(['title']));

       


    }
}
