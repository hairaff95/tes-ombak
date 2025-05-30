<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NewFilController extends BaseController
{
    public function index()
    {
        return view('new_fil');
    }
}
