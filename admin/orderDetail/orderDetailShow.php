<?php
include __DIR__ . "/../database/database.php";

$sql = "SELECT orderdetail.id_orderdetail, orderdetail.order_number, products.product_name, orderdetail.quantity_ordered, orderdetail.price_each
        FROM orderdetail 
        INNER JOIN products 
        ON orderdetail.product_code = products.product_code";


$result = $conn->query($sql);
$result = $result->fetchAll();


?>



<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        ORDER DETAILS
    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Order Number</th>
                        <th>Product Name</th>
                        <th>Quantity Order</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>

                <?php foreach ($result as  $value) : ?>
                    <tr>

                        <td><?= $value['order_number']; ?></td>
                        <td><?= $value['product_name']; ?></td>
                        <td><?= $value['quantity_ordered']; ?></td>
                        <td>$<?= $value['price_each']; ?></td>

                        <td>
                            <a href="orderDetailEdit.php?id=<?= $value['order_number'] ?>">Edit</a>
                            <a href="orderDetailDelete.php?id=<?= $value['id_orderdetail'] ?>">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
            <p><a href="orderDetailAdd.php">ADD NEW ORDER DETAIL</a>
                <br> Add Order Detail when your <a href="../customers/customersShow.php"> Customer Table</a> has those customers
                and <a href="../orders/ordersShow.php"> Order Table</a> has those orders!
            </p>

        </div>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>