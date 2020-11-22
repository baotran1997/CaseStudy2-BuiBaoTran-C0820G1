<?php require_once "../layout/navi.php" ?>

<?php require_once "../databaseWeb/productDB.php" ;

$cart_products = $_SESSION['cart']->getCartProducts(); //cart_products = [pcode1 => amount1, pcode2 => amount2, ...]
$product = new productDB();

// $products = $product->getProductsFromCart($cart_products);
$total_price = $product->getTotalPriceFromCart($cart_products);

?>


<div class="container checkOut">
  <div class="row">
    <div class="col-lg-6">
        <div class="checkOutContact">
            <h3>CONTACT INFORMATION</h3>
        </div>
    <form method="POST" action="/casestudy2/client/processClientForm.php">
        
        <div class="form-group">
            <label for="customerName">Full Name:</label>
            <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Enter full name" required>
        </div>
        <div class="form-group">
            <label for="customerPhone">Phone Number:</label>
            <input type="text" class="form-control" id="customerPhone" name="customerPhone" placeholder="Enter phone number" required>
        </div>
        <div class="form-group">
            <label for="customerEmail">Email address:</label>
            <input type="email" class="form-control" id="customerEmail" name="customerEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="customerComment">Comment:</label>
            <input type="text" class="form-control" id="customerComment" name="customerComment" placeholder="Enter comment" >
        </div>
        <div class="form-group">
            <label for="requiredDate">Required Delivery Date:</label>
            <input type="date" class="form-control" id="requiredDate" name="requiredDate" placeholder="Enter Required Delivery Date" >
        </div>
        <div class="form-group">
            <label for="customerAddress">Address:</label>
            <input type="text" class="form-control" id="customerAddress" name="customerAddress" placeholder="Enter address" required>
        </div>
        <div class="form-group">
            <label for="customerCity">City:</label>
            <input type="text" class="form-control" id="customerCity" name="customerCity" placeholder="Enter city" required>
        </div>

        <div class="row">
            <div class="col continueShopping">
                <a href="#" onclick="window.history.go(-1)"> < CONTINUE SHOPPING</a>
            </div>
            <div class="col" style="text-align: right;">
            <button type="submit" class="btn btn-danger">BUYING</button>
            
            </div>
         </div>
    </form>  


    </div>
    <div class="col-lg-6 px-5">
        <div class="orderSummary">
            <div>
                ORDER SUMMARY:
            </div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="pl-3">
                        Subtotal:
                    </div>
                    <div class="pr-3">
                        <?= $total_price; ?>$
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="pl-3">
                    Shipping:
                    </div>
                    <div class="pr-3">
                        0$
                    </div>
                </div>
                <hr style="background-color: wheat;">
                <div class="row justify-content-between">
                    <div class="pl-3">
                    Order Total:
                    </div>
                    <div class="pr-3">
                    <?= $total_price; ?>$
                    </div>
                </div>
            </div>
          
        </div>
    </div>
  
  </div>
</div>

<?php require_once "../layout/footer.php" ?>