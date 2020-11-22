<?php
include __DIR__ . '/../database/database.php';

//select category from db

$query = "SELECT  * FROM categories";
$cate = $conn->query($query);
$cate = $cate->fetchAll();


// form

$productName = '';
$productIntro = '';
$productSpec = '';
$productPrice = '';
$image = '';
$productStock = '';
$category = '';

// get id from edit button in productsShow.php

$id = $_GET['id'];

// show value before edit products 

$queryProduct = "SELECT * FROM products WHERE product_code = $id";
$allProduct = $conn->query($queryProduct);
$allProduct = $allProduct->fetch();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['productName'])) {
        $productName = $_POST['productName'];
    }

    if (isset($_POST['productIntro'])) {
        $productIntro = $_POST['productIntro'];
    }
    if (isset($_POST['productSpec'])) {
        $productSpec = $_POST['productSpec'];
    }

    if (isset($_POST['productPrice'])) {
        $productPrice = $_POST['productPrice'];
    }

    if (isset($_POST['image'])) {
        $image = $_POST['image'];
    }


    if (isset($_POST['productStock'])) {
        $productCode = $_POST['productStock'];
    }

    if (isset($_POST['category'])) {
        $category = $_POST['category'];
    }

    $sql = "UPDATE `products` 
            SET product_name = '$productName', product_introduction = '$productIntro', product_specification = '$productSpec', product_price = '$productPrice', product_image = '$image', category_id = '$category'  
            WHERE product_code = $id ";

    $result = $conn->query($sql);

    header('location:productsShow.php');
}



?>




<?php include __DIR__ .  '/../layout/header.php'; ?>


<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>EDIT PRODUCT</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" name="productName" id="productName" value="<?= $allProduct['product_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="productIntro">Product Introduction</label>
                    <textarea rows="3" class="form-control" name="productIntro" id="productIntro"><?= $allProduct['product_introduction']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="productSpec">Product Specification</label>
                    <input type="text" class="form-control" name="productSpec" id="productSpec" value="<?= $allProduct['product_specification']; ?>">
                </div>
                <div class="form-group">
                    <label for="productPrice">Product Price</label>
                    <input type="text" class="form-control" name="productPrice" id="productPrice" value="<?= $allProduct['product_price']; ?>">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" name="image" id="image" value="<?= $allProduct['product_image']; ?>">
                </div>
                <div class="form-group">
                    <label for="productStock">Stock</label>
                    <input type="text" class="form-control" name="productStock" id="productStock" value="<?= $allProduct['product_stock']; ?>">
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" name="category" id="category">
                        <?php foreach ($cate as $value) : ?>
                            <option value="<?= $value['category_id'] ?>"><?= $value['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>




<?php include __DIR__ .  '/../layout/footer.php'; ?>