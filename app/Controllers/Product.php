<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Product extends BaseController
{
    public function index()
    {

        $data['title'] = 'Product';
        $data['cart'] =\Config\Services::cart();

        return view('product', $data);
    }

    public function read()
    {
        $data['cart'] =\Config\Services::cart();
        $productModel = new \App\Models\Product();
        $products = $productModel->getDataForBootstrapTable($this->request);        
        return $this->response->setJSON($products);
    }

    private function _post_product($is_update = false)
    {

        // validate input text
        $validationRule = [
            'product_code' => [
                'rules' => 'required'
            ],
            'name' => [
                'rules' => 'required'
            ],
            'price' => [
                'rules' => 'required'
            ],
            'currency' => [
                'rules' => 'required'
            ],
            'discount' => [
                'rules' => 'required'
            ],
            'dimension' => [
                'rules' => 'required'
            ],
            'unit' => [
                'rules' => 'required'
            ]            
        ];

        if (!$this->validate($validationRule)) {
            $error = $this->validator->getErrors();
            $error_val = array_values($error);
            die(json_encode([
                'status' => false,
                'response' => $error_val[0]
            ])); 
        }           

        $data['product_code'] = $this->request->getPost('product_code');
        $data['name'] = $this->request->getPost('name');
        $data['price'] = $this->request->getPost('price');
        $data['currency'] = $this->request->getPost('currency');
        $data['discount'] = $this->request->getPost('discount');
        $data['dimension'] = $this->request->getPost('dimension');
        $data['unit'] = $this->request->getPost('unit');    
        return $data;        
    }

    public function create()
    {

        $data = $this->_post_product();

        $productModel = new \App\Models\Product();
        $productModel->insert($data);

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success create data '.$data['name']
        ]);
    }

    public function edit()
    {

        $id = $this->request->getPost('hash');

        $productModel = new \App\Models\Product();
        $product = $productModel->select('product_code,name,price,currency,discount,dimension,unit')->find($id);

        // build hash
        $product['hash'] = $id;

        return $this->response->setJSON([
            'status' => true,
            'response' => $product
        ]);
    }

    public function update()
    {

        $id = $this->request->getPost('hash');

        $data = $this->_post_product($id);

        $productModel = new \App\Models\Product();
        $productModel->update($id, $data);

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success update data '.$data['name']
        ]);
    }        

    public function delete()
    {

        $id = $this->request->getPost('hash');

        $productModel = new \App\Models\Product();
        // read first
        $product = $productModel->select('photo')->find($id);
        // then delete
        if ($productModel->delete($id) ){
            // AND file_exists('./uploads/'.$product['photo'])) {
            // delete photo
            // unlink('./uploads/'.$product['photo']);
        }

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success delete data '.$id
        ]);
    }

    public function delete_batch()
    {
        $ids = $this->request->getPost('ids');
        $ids_array = explode("','", $ids);
        $count = count($ids_array);

        $productModel = new \App\Models\Product();
        // read first
        $products = $productModel->select('id')->find($ids_array);

        // then delete one by one
        foreach ($products as $product) {
            if ($productModel->delete($product['id'])){
            // AND file_exists('./uploads/'.$product['photo'])) {
                // Menghapus foto dari direktory:
                // unlink('./uploads/'.$product['photo']);
            }
        }

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success '. $count .' delete data '
        ]);
    }

    // public function cek()
    // {
    //     $cart = \Config\Services::cart();
    //     // $cart =
    //     $response = $cart->contents();
    //     $data = json_encode($response);
    //     echo '<pre>';
    //     print_r($data);
    //     echo '<pre>';
    // }
}