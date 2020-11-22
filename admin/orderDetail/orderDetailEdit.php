<?php
include __DIR__ . "/../database/database.php";

// select products to choose
$sqlProduct = "SELECT products.product_code, products.product_name 
                FROM products ORDER BY product_code;";
$resultProduct = $conn->query($sqlProduct);
$resultProduct = $resultProduct->fetchAll();

// get id from edit Button in orderDetailShow

$id = $_GET['id'];

// show value before edit orderDetail

$queryOrderDetail = "SELECT * FROM orderdetail WHERE order_number = $id";
$resultOrderDetail = $conn->query($queryOrderDetail);
$resultOrderDetail = $resultOrderDetail->fetch();

//form 
$productCode = '';
$quantity = '';
$price = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['productCode'])) {
        $productCode = $_POST['productCode'];
    }

    if (isset($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
    }

    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }


    $sql = "UPDATE `orderdetail` 
            SET product_code = '$productCode', quantity_ordered = '$quantity', price_each = '$price'
            WHERE order_number = $id ";

    $result = $conn->query($sql);

    header('location:orderDetailShow.php');
}

?>



?>




<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>EDIT ORDER DETAIL</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label for="productCode">Product Code & Product Name:</label>
                    <select class="form-control" name="productCode" id="productCode">
                        <?php foreach ($resultProduct as $value) : ?>
                            <option value="<?= $value['product_code'] ?>"><?= $value['product_code'] ?> - <?= $value['product_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" value="<?= $resultOrderDetail['quantity_ordered']; ?>">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="<?= $resultOrderDetail['price_each']; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>