<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';
include '../db/functionality.php';

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $insert="INSERT into `department` VALUES(null,'$name')";
    $i=mysqli_query($conn,$insert);
    testMessage($i,"room");
}
?>

<h1 class="text-primary mt-5 text-center display-4">Add Department</h1>
<div class="container mt-5 col-md-6">
    <div class="card bg-light">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Name :</label>
                    <input type="text" name="name" class="form-control">
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
?>