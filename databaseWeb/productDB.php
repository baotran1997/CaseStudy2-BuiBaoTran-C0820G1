<?php
   require_once "connectDb.php";

   class productDB extends connectDB {

    public  function getProductByCategory($category_id)
    {

        $sql = "SELECT * FROM products WHERE category_id = $category_id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
      
    }

    public  function getProductLimit($category_id, $limit)
    {

        $sql = "SELECT * FROM products WHERE category_id = $category_id LIMIT $limit" ;
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
      
    }

    public function getProductById($id)
    {

        $query = "SELECT * FROM products WHERE product_code = $id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    function getPriceById($id){
        $query = "SELECT product_price FROM products WHERE product_code = $id";
        $result = mysqli_query($this->conn, $query);
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return (Int)$result['product_price'];
        // return $result;
    }

    function getCategoryName($cat_id){
        $query = "SELECT category_name FROM categories WHERE category_id = $cat_id";
        $result = mysqli_query($this->conn, $query);
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $result['category_name'];
        // return $result;
   }


    function getProductFromCart($cart_product) {
      return array_push( $cart_product, $this->getProductById($cart_product) );
    }

 
    function getProductsFromCart($cart_products){
        $products = [];
        foreach ($cart_products as $pcode => $amount) {
            $products[$pcode] = $this->getProductById($pcode); // products = [pcode=>[product_id => ]]
            $products[$pcode]['amount'] = $amount;
            $products[$pcode]['total_price_each_product'] = $amount * $products[$pcode]['product_price'];
          }
          return $products;
    }

    function getTotalPriceFromCart($cart_products){
        $totalprice = 0;
        foreach ($cart_products as $pcode => $amount) {
            $products[$pcode] = $this->getProductById($pcode);
            $totalprice = $totalprice +  $amount * $products[$pcode]["product_price"];
          }
          return $totalprice;
    }
  
}

// $product = new productDB();

// echo "</br>";
// var_dump($product->getProductById("159"));
// echo "</br>";



?>

