<?php
include __DIR__ . "/../database/database.php";

// select customer to choose
$sqlCustomer = "SELECT * FROM customers";
$resultCustomer = $conn->query($sqlCustomer);
$resultCustomer = $resultCustomer->fetchAll();

// form
$customerID = '';
$requiredDate = '';
$comment = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['customerID'])) {
        $customerID = $_POST['customerID'];
    }

    if (isset($_POST['requiredDate'])) {
        $requiredDate = $_POST['requiredDate'];
    }

    if (isset($_POST['comment'])) {
        $comment = $_POST['comment'];
    }



    $sqlOrder = "INSERT INTO orders (customer_id, required_date, comment)
                VALUES ($customerID ,  '$requiredDate', '$comment' )";

    $resultOrder = $conn->query($sqlOrder);


    header('location:ordersShow.php');
}

?>



<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>ADD ORDER</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label for="customerID">Customer Name:</label>
                    <select class="form-control" name="customerID" id="customerID">
                        <?php foreach ($resultCustomer as $value) : ?>
                            <option value="<?= $value['customer_id'] ?>"><?= $value['customer_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="requiredDate">Required Date</label>
                    <input type="text" class="form-control" name="requiredDate" id="requiredDate">
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <input type="text" class="form-control" name="comment" id="comment">
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>