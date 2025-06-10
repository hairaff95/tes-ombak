<?php

namespace App\Controllers;

use App\Models\ProductModel; 
use App\Models\UserModel;

class Home extends BaseController
{
    protected $product;
    protected $user;

    function __construct()
    {
        helper('form');
        helper('number');
        $this->product = new ProductModel();
        $this->user = new UserModel(); 
        // <!--tambahan sendiri-->
    }

    public function index()
    {
        $product = $this->product->findAll();
        $users = $this->user->findAll();
        $data['product'] = $product;
        $data['users'] = $users;
        return view('a_home', $data);
    }
    // public function index(): string
    // {
    //     return view('a_home');
    // }
}
