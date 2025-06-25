<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Affiche la page À Propos
     */
    public function index()
    {
        return view('about');
    }
}