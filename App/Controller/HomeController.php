<?php

namespace App\Controller;

class HomeController
{
    public function home()
    {
        $name = $_GET['name'] ?? 'Invité';
        include "App/View/viewHome.php";
    }
}