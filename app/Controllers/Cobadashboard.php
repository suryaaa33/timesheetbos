<?php

namespace App\Controllers;

class Cobadashboard extends BaseController
{
    public function index()
    {
        helper('url');
        return view('CobadashboardView');
    }
}
