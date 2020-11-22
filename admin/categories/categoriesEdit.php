<?php
include __DIR__ . '/../database/database.php';

//form 

$categoryName = '';

// get id from edit Button in categoriesShow

$id = $_GET['id'];

//show value before edit

$queryCategory = "SELECT * FROM categories WHERE category_id = $id";
$allCategory = $conn->query($queryCategory);
$allCategory = $allCategory->fetch();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['categoryName'])) {
        $categoryName = $_POST['categoryName'];
    }

    $sql = "UPDATE categories 
            SET  category_name = '$categoryName' 
            WHERE category_id = $id";

    $result = $conn->query($sql);

    header('location:categoriesShow.php');
}




?>



<?php include __DIR__ . '/../layout/header.php';  ?>


<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>EDIT CATEGORIES</h1>
        </div>
        <div class="col-12">
            <form method="post">

                <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" class="form-control" name="categoryName" id="categoryName" value="<?= $allCategory['category_name']; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php';  ?>