<?php include __DIR__ . '/../database/database.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['username']) && isset($_POST['userpassword'])) {
        $myUserName =  isset($_POST['username']) ? $_POST['username'] : null;
        $myPassword =  isset($_POST['userpassword']) ? $_POST['userpassword'] : null;


        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $result = $result->fetchAll();


        foreach ($result as $value) {

            if ($value['user_name'] == $myUserName && $value['user_password'] == $myPassword) {
                $_SESSION['login_user'] = $myUserName;

                break;
            }
        }


        if (isset($_SESSION['login_user'])) {
            header('location:../index.php');
        } else {
            echo '<script language="javascript">';
            echo 'alert("Bạn không có quyền Admin vào trang này!")';
            echo '</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">User Name</label>
                                            <input class="form-control py-4" name="username" id="inputEmailAddress" type="text" placeholder="Enter your user name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" name="userpassword" type="password" placeholder="Enter password" />
                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <input class="btn btn-primary" type="submit" value="Login">

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>