<?php
 
 namespace App\Models;
 
 use CodeIgniter\Model;
  
 class Cart extends Model{
    protected $table = 'product';

    public function getProduct(){
        return $this->findAll();
    }
 }