<?php


class Order extends Base
{
    private $db;
    private $email;

    public function __construct()
    {
        $this->db = new DB();
        $this->email = new Email();
    }

    public function store($data)
    {
        try {
            $this->db->connect();
            $this->db->begin();

            $customer = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
            ];
            $customer_id = $this->db->insert('customers', $customer);
            foreach ($data['item'] as $k => $each) {
                $product = [
                    'product_id' => $k,
                    'customer_id' => $customer_id,
                    'qty' => $each['item_qty'],
                    'price' => $each['item_price'],
                    'tax_price' => $each['item_tax'],
                    'total' => $this->getTotal($each),
                    'create_date' => date('Y-m-d H:i:s'),
                ];
                $this->db->insert('orders', $product);
            }
            // send mail to customer
            $this->email->sendmail($data);
            $this->db->commit();

            // unset session data
            unset($_SESSION['cart']);
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function getTotal($data)
    {
        return ($data['item_qty'] * $data['item_price']) + $data['item_tax'];
    }


}