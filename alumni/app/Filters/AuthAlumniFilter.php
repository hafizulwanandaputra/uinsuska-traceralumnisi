<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthAlumniFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('logalumni') != true) {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to(base_url('/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('logalumni') == true) {
            return redirect()->to(base_url('/home'));
        }
    }
}
