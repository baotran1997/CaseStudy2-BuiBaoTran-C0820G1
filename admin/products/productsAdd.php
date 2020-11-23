<?php
include __DIR__ .  '/../database/database.php';

// select category from db

$query = "SELECT * FROM categories";
$cate = $conn->query($query);
$cate = $cate->fetchAll();

// form

$productName = '';
$productIntro = '';
$productSpec = '';
$productPrice = '';
$image = '';
$category = '';


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

   

    if (isset($_POST['category'])) {
        $category = $_POST['category'];
    }


    $sql = "INSERT INTO products ( product_name, category_id, product_introduction, product_specification, product_image, product_price) 
    VALUES ( '$productName', '$category', '$productIntro', '$productSpec', '$image', '$productPrice') ";

    $result = $conn->query($sql);



    header('location:productsShow.php');
}

?>



<?php include  __DIR__ . '/../layout/header.php'; ?>


<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>ADD PRODUCT</h1>
        </div>
        <div class="col-12">
            <form method="post">
              
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" name="productName" id="productName">
                </div>
                <div class="form-group">
                    <label for="productIntro">Product Introduction</label>
                    <input type="text" class="form-control" name="productIntro" id="productIntro">
                </div>
                <div class="form-group">
                    <label for="productSpec">Product Specifications</label>
                    <input type="text" class="form-control" name="productSpec" id="productSpec">
                </div>
                <div class="form-group">
                    <label for="productPrice">Product Price</label>
                    <input type="text" class="form-control" name="productPrice" id="productPrice">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" name="image" id="image">
                </div>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" name="category" id="category">
                        <?php foreach ($cate as $value) : ?>
                            <option value="<?= $value['category_id'] ?>"><?= $value['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>





<?php include  __DIR__ . '/../layout/footer.php'; ?>