<?php
 
 namespace App\Models;
 
 use CodeIgniter\Model;
  
 class Cart extends Model{

    protected $table            = 'product';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function get_all_product()
    {

        $products = $this->orderBy('id','DESC')->findAll();

        // load helper
        helper('number');        

        // build data
        $data = [];
        foreach ($products as $product) {
            $data[] = array(
                'hash' => $product['id'],
                'id' => $product['id'],
                'product_code' => $product['product_code'],
                'name' => $product['name'],
                'price' => number_to_currency($product['price'], "IDR", "id", 0),
                'currency' => $product['currency'],
                'discount' => $product['discount'],
                'dimension' => $product['dimension'],
                'unit' => $product['unit'],
            );
        }   

        return $data;     
    }
      
 }