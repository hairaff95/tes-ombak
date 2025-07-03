<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (!session()->has('isLoggedIn')) {
            return redirect()->to(site_url('login'));
        }

        //Pengecekan untuk role admin
         if (is_array($arguments) && in_array('admin', $arguments)) {
            if (session()->get('role') !== 'admin') {
                return redirect()->to('/')->with('error', 'Akses hanya untuk admin.');
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
