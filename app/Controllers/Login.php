<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        helper('url');
        return view('login');
    }
}
