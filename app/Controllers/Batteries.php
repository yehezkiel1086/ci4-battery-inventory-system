<?php

namespace App\Controllers;

use Config\View;

class Batteries extends BaseController
{
    public function index()
    {
      return View("batteries.php");
    }
}
