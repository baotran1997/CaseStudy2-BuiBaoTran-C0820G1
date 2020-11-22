<?php require_once  "../layout/navi.php"; ?>

<?php 
// require_once "../databaseWeb/productDB.php";

$product = new productDB();
// show product by category $id

$category_id = $_GET["category_id"];

$equipment = $product->getProductByCategory($category_id);
$category_name = $product->getCategoryName($category_id);
// var_dump($equipment); 
?>



<section id="home">
    <div class="overlay">
        <img src="/casestudy2/image/<?= $category_id ?>EquipmentBanner.jpg" alt="">
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-12">
                <div class="home-text">
                    <h1><?= $category_name ?> </h1>
                    <p>T.A Fitness offers a complete gym package solution for existing and new gym owners. Whether you’re setting up your first gym, or are a seasoned gym operator, T.A Fitness has the refined and highly knowledgeable sales team and support staff to help you at every step of the process.</p>
                </div>
            </div>

        </div>
    </div>

</section>


<div class="container showProduct">
    <div class="row">

        <?php foreach ($equipment as $key => $value) : ?>
            <div class="col-md-4 col-sm-6 overlay">
                <div class="product-grid2">
                    <div class="product-image">
                        <a href="productDetail.php?product_code=<?= $value['product_code']; ?>"> <img class="pic" src="<?= $value['product_image']; ?>" style="width: 260px;height=260px;"> </a>
                    </div>
                    <div class="product-content">
                        <h4 class="title"> <?= $value['product_name']; ?></h4>
                        <span class="price"> $ <?= $value['product_price']; ?></span>
                        <a class="product-view" href="productDetail.php?product_code=<?= $value['product_code']; ?>"> View Product </a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?php require_once  "../layout/footer.php"; ?>