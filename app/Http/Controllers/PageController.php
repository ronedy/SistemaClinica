<?php

namespace App\Http\Controllers;

use App\cita;
use Illuminate\Http\Request;

class PageController extends Controller
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
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        $citas = cita::where('estado', '=', 1)
                //->where('fecha_citada', '>=', now()->format('Y-m-d'))
                ->orderBy('fecha_citada', 'DESC')
                ->orderBy('hora_citada', 'DESC')
                ->get();

        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}", compact('citas'));
        }

        return abort(404);
    }
}
