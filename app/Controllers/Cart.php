<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cart extends BaseController
{
    public function __construct(){
        helper('number');
        helper('form');
    }
      
    function index(){
        
        $data['title'] = 'Cart';
        $data['cart'] =\Config\Services::cart();
        // $productModel = new \App\Models\Cart();
        // $data['data'] = $productModel->get_all_product();

        return view('v_cart', $data);
    }
 
    function add_to_cart(){ //fungsi Add To Cart
        
        $data['id'] = $this->request->getPost('id');
        $data['name'] = $this->request->getPost('name');
        $data['price'] = $this->request->getPost('price');
        $data['qty'] = $this->request->getPost('quantity');
        // $data = array(
        //     'id' => $this->input->post('id'), 
        //     'name' => $this->input->post('name'), 
        //     'price' => $this->input->post('price'), 
        //     'qty' => $this->input->post('quantity'), 
        // );
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }
 
    function show_cart(){ //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
            </tr>
        ';
        return $output;
    }
 
    function load_cart(){ //load data cart
        echo $this->show_cart();
    }
 
    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
}