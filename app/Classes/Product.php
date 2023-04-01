<?php

class Product extends Base
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getProducts()
    {
        $this->db->connect();
        $this->db->select('products'); // Table name
        $result = $this->db->getResult();
        $rowcount = $this->db->numRows();
        return ['result' => $result, 'count' => $rowcount];
    }
}