<?php include __DIR__ . "/../database/database.php";

$sql = "SELECT orders.order_number, customers.customer_name,  orders.required_date, orders.order_date, orders.comment 
        FROM orders 
        INNER JOIN customers
        ON orders.customer_id = customers.customer_id";

$result = $conn->query($sql);
$result = $result->fetchAll();






?>


<?php include __DIR__ . "/../layout/header.php" ?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        ORDERS
    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Required Date</th>
                        <th>Customer 's Comment</th>
                        <th></th>
                    </tr>
                </thead>

                <?php foreach ($result as  $value) : ?>
                    <tr>

                        <td><?= $value['order_number']; ?></td>
                        <td><?= $value['customer_name']; ?></td>
                        <td><?= $value['order_date']; ?></td>
                        <td><?= $value['required_date']; ?></td>
                        <td><?= $value['comment'];  ?></td>
                        <td>
                            <a class="btn btn-primary" href="ordersEdit.php?id=<?= $value['order_number'] ?>">Edit</a>
                            <a class="btn btn-danger" href="ordersDelete.php?id=<?= $value['order_number'] ?>">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>
            <p><a href="ordersAdd.php">ADD NEW ORDER</a></p>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php" ?>