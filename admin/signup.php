<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $insert = "INSERT INTO `patintes` VALUES(null,'$name','$password',null,null,null)";
    $i = mysqli_query($conn, $insert);
    if ($i) {
        echo "  <div class='alert alert-success w-50 mt-5 mx-auto' role='alert'>
                         Sign up !
                    </div>";
        header("location:/hospital-system/admin/login.php");
    } else {
        echo "  <div class='alert alert-danger w-50 mt-5 mx-auto' role='alert'>
                        Not Sign up !
                    </div>";
    }
}

?>
<h1 class="text-primary mt-5 text-center display-4">Sign up</h1>
<div class="container mt-5 col-md-6">
    <div class="card bg-light">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Username :</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password :</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="text-center">
                    <button class="btn btn-primary w-50" name="signup">signup</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
include '../shared/footer.php';
?>