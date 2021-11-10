<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';
include '../db/functionality.php';
if ($_SESSION['role'] == 0) {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $insert = "INSERT into `admin` VALUES(null,'$name','$password',$role)";
        $i = mysqli_query($conn, $insert);
        testMessage($i, "Added");
    }
?>
    <h1 class="text-primary mt-5 text-center display-4">Add Admin</h1>
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
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role :</label>
                        <select name="role" class="form-control">
                            <option name="role" id="0">Owner</option>
                            <option name="role" id="1">All-Access</option>
                            <option name="role" id="2">Semi-Access</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-info w-50" name="add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
    include '../shared/footer.php';
} else {


    echo " <div class='container mt-5 col-md-6'>
    <div class='card bg-light'>
        <div class='card-body'>
        <img src='https://m.media-amazon.com/images/I/614hfoVMBYL._AC_SX466_.jpg ' class='w-100'>
        </div>
    </div>
</div>";

    include '../shared/footer.php';
}
?>