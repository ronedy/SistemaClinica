<?php

namespace App\Http\Controllers;

use App\cita;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $citas = cita::where('estado', '=', 1)
                ->get();

        return view('pages.dashboard', compact('citas'));
    }
}
