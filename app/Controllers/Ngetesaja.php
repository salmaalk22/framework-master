<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ngetesaja extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Coba Aja",
            "name" => "Salma"
        ];

        echo view('index', $data);
    }
}