<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';

if(isset($_POST['login'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $select="SELECT * FROM `admin` WHERE name='$name' and password='$password'";
    $s=mysqli_query($conn,$select);
    $numRow=mysqli_num_rows($s);
    $row=mysqli_fetch_assoc($s);
    if($numRow>0){
        $_SESSION['admin']=$name;
        $_SESSION['role']=$row['role'];
        header("location:/hospital-system/index.php");
    }else{
        echo "isnt admin";
    }
}
?>

<h1 class="text-primary mt-5 text-center display-4">Login</h1>
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
                    <button class="btn btn-primary w-50" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
include '../shared/footer.php';
?>