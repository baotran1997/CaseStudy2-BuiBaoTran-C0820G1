<?php
include __DIR__ . '/../database/database.php';


$sql = "SELECT * FROM casestudy2.categories";
$result = $conn->query($sql);
$result = $result->fetchAll();

?>


<?php include __DIR__ . '/../layout/header.php';  ?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        CATEGORIES
    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Category Code</th>
                        <th>Category Name</th>
                        <th></th>
                    </tr>
                </thead>

                <?php foreach ($result as $value) : ?>
                    <tr>
                        <td><?= $value['category_id']; ?></td>
                        <td><?= $value['category_name']; ?></td>
                        <td>
                            <a class="btn btn-info" href="categoriesEdit.php?id=<?= $value['category_id'] ?>">Edit</a>
                            <a  class="btn btn-danger" href="categoriesDelete.php?id=<?= $value['category_id'] ?>">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>
            <p><a href="categoriesAdd.php">ADD NEW CATEGORY</a></p>
        </div>
    </div>
</div>



<?php include __DIR__ . '/../layout/footer.php';  ?>