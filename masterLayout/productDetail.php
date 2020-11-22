<?php require_once  "../layout/navi.php"; ?>

<?php require_once "../databaseWeb/productDB.php";

$product = new productDB();

// get product_code from method GET in cardioEquipment.php

$product_code = $_GET["product_code"];

$productDetail = $product->getProductById("$product_code");


//get related product
$relatedProduct = $product->getProductLimit($productDetail['category_id'], 15);

// var_dump($productDetail);

?>




<div class="container productDetail">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <img src=" <?= $productDetail["product_image"]; ?>" style="width:90%;" alt="">
        </div>

        <div class="col-lg-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">
                            <?= $productDetail["product_name"]; ?>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="priceProductDetail">
                            $<?= $productDetail["product_price"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="textProductDetail">Product Detail:</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify;">
                            <?= $productDetail['product_introduction']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: justify;">
                            <?= $productDetail['product_specification']; ?>
                        </td>
                    </tr>
                    <tr>
                     
                        <td class="section-btn ">
                            <a href="#" onclick="AddToCart(<?= $productDetail['product_code']; ?>)">
                                <span data-hover="ADD TO CART"> ADD TO CART</span>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Related product -->
<h4 class="horizontalText">
	<i class="fas fa-dumbbell"></i> 
	<span class="textHori"> Related Products You May Like </span>
	<i class="fas fa-dumbbell"></i>
</h4>

<div class="owl-carousel owl-theme">

    <?php foreach ($relatedProduct as $equipment) : ?>
        <div class="item">
            <a href="/casestudy2/masterLayout/productDetail.php?product_code=<?= $equipment['product_code']; ?>"><img src="<?= $equipment['product_image']; ?>" alt="12" class="img-fluid"></a>
        </div>
    <?php endforeach; ?>
</div>
<h4 class="horizontalText"></h4>




<?php require_once  "../layout/footer.php"; ?>