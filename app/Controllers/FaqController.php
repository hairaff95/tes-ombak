<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FaqController extends BaseController
{
    public function index()
    {
        return view('a_faq');
    }
}
