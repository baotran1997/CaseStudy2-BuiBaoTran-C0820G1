<?php


class Cart
{   
    protected $cart_products = [];
    protected $cart_total_amount = 0;


    function setProduct($pcode){
        if (!isset( $this->cart_products[$pcode])) {
          
            $this->cart_products[$pcode] = 1;
        }else{
            $this->cart_products[$pcode] = $this->cart_products[$pcode] + 1;  //cart_products[pcode => amount]
        }
       
    }

    function getCartProducts(){
        return $this->cart_products;
    }

    function getTotalAmount(){
        $this->cart_total_amount = 0;
        foreach ($this->cart_products as $pcode => $amount) {
            $this->cart_total_amount += (Int)$amount;
        }
        return $this->cart_total_amount;
    }


    function decreaseProduct($pcode){
    
      if ($this->cart_products[$pcode] == 1) {
          unset($this->cart_products[$pcode]);
      } else {
        $this->cart_products[$pcode] = $this->cart_products[$pcode] - 1;
      }
    }

    function removeProduct($pcode) {
        unset($this->cart_products[$pcode]);
    }

    


}

// $cart = new Cart();
// $cart->SetProduct(159);
// $cart->SetProduct(159);

// $cart->SetProduct(211);
// $cart->removeProduct(159);
// $cart->SetProduct(160);
// $cart->SetProduct(162);

// echo $cart->getTotalPrice();

// var_dump($cart->setProduct(159));
// $arr = $cart->getCartProducts();
// var_dump($arr);
// $pCart = $cart->getCartProducts();
// var_dump($cart);




?>