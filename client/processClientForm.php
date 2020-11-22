<?php

require_once "../databaseWeb/productDB.php";
require_once "../cart/Cart.php";

session_start();

class dataClientProcessor extends productDB
{
    protected $data_client = [];
    protected $cart = [];


    function setDataClient($dc)
    {
        $this->data_client = $dc;
    }

    function setCart($cart)
    {
        $this->cart = $cart;
    }

    function pushClientDataToDB()
    {
        if ($this->pushToCustomer($this->data_client)&&
        $this->pushToOrder($this->data_client)&&
        $this->pushToOrderDetail($this->data_client, $this->cart)) {
            return true;
        }
        else return false;
    }

    function pushToCustomer($data_client)
    {
        $query = "INSERT INTO customers (customer_name, customer_phone, customer_email, customer_address, customer_city)
                  VALUES ( '{$data_client['customerName']}', '{$data_client['customerPhone']}','{$data_client['customerEmail']}','{$data_client['customerAddress']}','{$data_client['customerCity']}' )";

        if (mysqli_query($this->conn, $query)) {
            return true;
        } else {
            return false;
        }
    }

    function pushToOrDer($data_client)
    {
        $query = "INSERT INTO orders (customer_id, required_date, comment)
                  VALUES ( (SELECT customer_id FROM customers WHERE customer_name = '{$data_client['customerName']}'),
                   '{$data_client['requiredDate']}',
                   '{$data_client['customerComment']}')
                   ";

        if (mysqli_query($this->conn, $query)) {
            return true;
        } else {
            return false;
        }
    }

    function pushToOrderDetail($data_client, $cart)
    {
        foreach ($cart as $pcode => $amount) {
            $query = "INSERT INTO orderdetail (order_number, product_code, quantity_ordered, price_each)
                VALUES (
                (SELECT order_number FROM orders WHERE customer_id = (SELECT customer_id FROM customers WHERE customer_name = '{$data_client['customerName']}')),
                $pcode,
                $amount,
                (SELECT product_price FROM products WHERE product_code = $pcode)
                )";

            if (mysqli_query($this->conn, $query)) {
                return true;
            } else {
                return false;
            }
        }
    }
}



$dataClientProcessor = new dataClientProcessor();

$dataClientProcessor->setDataClient($_POST);
$dataClientProcessor->setCart($_SESSION['cart']->getCartProducts());

if ($dataClientProcessor->pushClientDataToDB()) {
    header('Location: ../masterLayout/orderSuccess.php');
}
else {
    header('Location: ../masterLayout/orderFail.php');
    
}
// var_dump($dataClientProcessor);
// $data = $_POST;
// var_dump($dataClientProcessor);


// $customerName = $_POST['customerName'];
// $customerPhone = $_POST['customerPhone'];
// $customerEmail = $_POST['customerEmail'];
// $customerComment = $_POST['customerComment'];
// $requiredDate = $_POST['requiredDate'];
// $customerAddress = $_POST['customerAddress'];
// $customerCity = $_POST['customerCity'];
//2020-11-26 