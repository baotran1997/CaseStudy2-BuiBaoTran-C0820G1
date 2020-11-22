<?php
include __DIR__ . "/../database/database.php";

// select products to choose
$sqlProduct = "SELECT products.product_code, products.product_name 
                FROM products ORDER BY product_code;";
$resultProduct = $conn->query($sqlProduct);
$resultProduct = $resultProduct->fetchAll();

// select orders_number and customer name to choose
$sqlCustomerAndOrder = "SELECT orders.order_number, customers.customer_name 
                FROM orders 
                INNER JOIN customers 
                ON orders.customer_id = customers.customer_id";

$resultCustomerAndOrder = $conn->query($sqlCustomerAndOrder);
$resultCustomerAndOrder = $resultCustomerAndOrder->fetchAll();

// form
$orderNumber = '';
$productCode = '';
$quantity = '';
$price = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['orderNumber'])) {
        $orderNumber = $_POST['orderNumber'];
    }

    if (isset($_POST['productCode'])) {
        $productCode = $_POST['productCode'];
    }

    if (isset($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
    }

    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }



    $sqlOrderDetail = "INSERT INTO orderdetail (order_number, product_code, quantity_ordered, price_each)
                VALUES ($orderNumber ,  '$productCode', '$quantity', $price )";

    $resultOrderDetail = $conn->query($sqlOrderDetail);


    header('location:orderDetailShow.php');
}

?>




<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>ADD ORDER DETAIL</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label for="orderNumber">Order Number & Customer Name:</label>
                    <select class="form-control" name="orderNumber" id="orderNumber">
                        <?php foreach ($resultCustomerAndOrder as $value) : ?>
                            <option value="<?= $value['order_number'] ?>"><?= $value['order_number'] ?> - <?= $value['customer_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="productCode">Product Code & Product Name:</label>
                    <select class="form-control" name="productCode" id="productCode">
                        <?php foreach ($resultProduct as $value) : ?>
                            <option value="<?= $value['product_code'] ?>"><?= $value['product_code'] ?> - <?= $value['product_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" name="quantity" id="quantity">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>