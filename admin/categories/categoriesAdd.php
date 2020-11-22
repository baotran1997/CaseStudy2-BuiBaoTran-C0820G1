<?php
include __DIR__ . '/../database/database.php';

// form
$categoryName = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['categoryName'])) {
        $categoryName = $_POST['categoryName'];
    }

    $sql = "INSERT INTO categories (category_name)
            VALUE ('$categoryName')";

    $result = $conn->query($sql);


    header('location:categoriesShow.php');
}

?>




<?php include  __DIR__ . '/../layout/header.php'; ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>ADD CATEGORIES</h1>
        </div>
        <div class="col-12">
            <form method="post">

                <div class="form-group">
                    <label for="productName">Category Name</label>
                    <input type="text" class="form-control" name="categoryName" id="categoryName">
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
                <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>


<?php include  __DIR__ . '/../layout/footer.php'; ?>