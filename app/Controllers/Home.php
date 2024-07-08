<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   echo view('templates/header');
        echo view('templates/navbar');
        echo view('authentification');
        echo view('templates/footer');
    }
}
