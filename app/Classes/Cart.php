<?php

class Cart extends Base
{
    private $db;
    private $help;

    public function __construct()
    {
        $this->db = new DB();
        $this->help = new Custom();
    }

    public function addToCart($product_id)
    {
        $this->db->connect();
        $this->db->single = true;
        $this->db->select('products', '*', null, "id=$product_id"); // Table name
        $result = $this->db->getResult();
        if($this->db->numRows() > 0){
            $this->help->addItemCart($result, $product_id);
        }
        return $result;
    }
}