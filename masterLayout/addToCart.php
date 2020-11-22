<?php require_once "../layout/navi.php"; ?>

<?php
if (isset($_SESSION['cart'])) {
  $cart_products = $_SESSION['cart']->getCartProducts(); //cart_products = [pcode1 => amount1, pcode2 => amount2, ...]
}
else {
  $_SESSION['cart'] = new Cart();
  $cart_products = $_SESSION['cart']->getCartProducts();
}
// var_dump($_SESSION['cart']);
// var_dump($cart_products);
$product = new productDB();

$products = $product->getProductsFromCart($cart_products);
// var_dump($products);
$total_price = $product->getTotalPriceFromCart($cart_products);

?>


<div class="container">
  <div class="table-responsive addToCart">

    <table class="table" id="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col" style="text-align: center;">Item</th>
          <th scope="col"></th>
          <th scope="col">Price Each</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($products as $pcode => $item) : ?>
          <tr>
            <th scope="row"><img src="<?= $item["product_image"]; ?>" style="width: 200px;" alt=""></th>
            <td><?= $item["product_name"]; ?></td>
            <td id="productprice">$<?= $item["product_price"]; ?></td>
            <td>

              <div class="d-flex justify-content-center">
                <a id="changeQuantity" onclick="changeAmount(<?= -$item['product_code']; ?>)" class="changeQuantity">-</a>
                <input type="text" class="inputQuantity" value=<?= $item["amount"]; ?>>
                <a id="changeQuantity" onclick="changeAmount(<?= $item['product_code']; ?>)" class="changeQuantity">+</a>
              </div>

            </td>
            <td class="totalprice">$<?= $item["total_price_each_product"]; ?></td>
            <td>
              <a onclick="removeProduct(<?= $item['product_code']; ?>)">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>


        <tr>
          <td colspan="2"></td>
          <td class="total" colspan="2">SUBTOTAL:</td>
          <td class="totalprice" colspan="2">$<?= $total_price; ?></td>
        </tr>

        <tr>
          <td colspan="1" class="continueShopping">
            <a href="#" onclick="window.history.go(-1)">
              < CONTINUE SHOPPING</a> </td> <td colspan="3">
          </td>
          <td colspan="2" class="section-btn">
            <a href="checkOut.php?product_code=<?= $item['product_code']; ?>"><span data-hover="CHECK OUT"> CHECK OUT</span></a>
          </td>

        </tr>

      </tbody>
    </table>
  </div>
</div>


<?php require_once  "../layout/footer.php"; ?>