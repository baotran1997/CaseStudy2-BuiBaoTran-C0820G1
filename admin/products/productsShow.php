<?php
include __DIR__ . '/../database/database.php';




$sql = 'SELECT products.product_code, products.product_name, categories.category_name, products.product_introduction, products.product_specification, products.product_image, products.product_price
        FROM ( products
        INNER JOIN categories ON products.category_id = categories.category_id)';
$result = $conn->query($sql);
$result = $result->fetchAll();


?>



<?php include __DIR__ . '/../layout/header.php';  ?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        PRODUCTS
    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Product Introduction</th>
                        <th>Product Specification</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <?php foreach ($result as $index => $value) : ?>
                    <tr>
                       
                        <td><?= $value['product_code']; ?></td>
                        <td><?= $value['product_name']; ?></td>
                        <td><?= $value['category_name']; ?></td>
                        <td><?= $value['product_introduction'];  ?></td>
                        <td><?= $value['product_specification'];  ?></td>
                        <td><img class="image" src="<?= $value['product_image']; ?>" style="width: 150px;" alt=""></td>
                        <td>$<?= $value['product_price']; ?></td>
                        <td>
                            <a class="btn btn-info" href="productsEdit.php?id=<?= $value['product_code'] ?>">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="productsDelete.php?id=<?= $value['product_code'] ?>">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>
            <p><a href="productsAdd.php">ADD NEW PRODUCT</a></p>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../layout/footer.php';  ?>