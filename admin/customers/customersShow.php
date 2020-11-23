<?php
include __DIR__ . "/../database/database.php";

$sql = "SELECT * FROM customers";

$resultCustomer = $conn->query($sql);
$resultCustomer = $resultCustomer->fetchAll();
?>


<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        CUSTOMERS
    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Customer Email</th>
                        <th>Customer Address</th>
                        <th>Customer City</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <?php foreach ($resultCustomer as $index => $value) : ?>
                    <tr>
                        
                        <td><?= $value['customer_id']; ?></td>
                        <td><?= $value['customer_name']; ?></td>
                        <td><?= $value['customer_phone']; ?></td>
                        <td><?= $value['customer_email']; ?></td>
                        <td><?= $value['customer_address']; ?></td>
                        <td><?= $value['customer_city']; ?></td>
                        <td>
                            <a class="btn btn-info" href="customersEdit.php?id=<?= $value['customer_id'] ?>">Edit</a>
                        </td> 
                        <td>
                            <a class="btn btn-danger" href="customersDelete.php?id=<?= $value['customer_id'] ?>">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>
            <p><a href="customersAdd.php">ADD NEW CUSTOMER</a></p>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>