<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function __construct(){
        helper('number');
        helper('form');
    }

    public function index()
    {

        $data['title'] = 'Homepage';
        $data['cart'] =\Config\Services::cart();
        $productModel = new \App\Models\Product();
        $data['products'] = $productModel->getData();

        return view('homepage', $data);
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        // $cart =
        $response = $cart->contents();
        $data = json_encode($response);
        echo '<pre>';
        print_r($data);
        echo '<pre>';
    }

    public function add()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'    => $this->request->getPost('id'),
            'qty'   => 1,
            'kode'  => $this->request->getPost('kode'),
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ));
        session()->setFlashdata('pesan', 'Berhasil menambah ke Keranjang');
        return redirect()->to(base_url('/'));
    }

    public function clear()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
    }
}