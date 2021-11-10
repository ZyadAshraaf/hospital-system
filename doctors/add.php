<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';
include '../db/functionality.php';

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $department=$_POST['department'];
    $insert="INSERT into `doctors` VALUES(null,'$name','$department')";
    $i=mysqli_query($conn,$insert);
    testMessage($i,"Added");
}
$edit=false;
$name="";
$department="";
if(isset($_GET['edit'])){  
    $edit=true;
    $id=$_GET['edit'];
    $select3="SELECT * FROM `doctors` WHERE id=$id";
    $s3=mysqli_query($conn,$select3);
    $row=mysqli_fetch_assoc($s3);
    $name=$row['name'];

    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $department=$_POST['department'];
        $update="UPDATE `doctors` SET name='$name',department_id=$department WHERE id=$id";
        $u=mysqli_query($conn,$update);
        testMessage($u,"updated");
        header("location:/hospital-system/doctors/list.php");
    }
}
?>
<?php if($edit==false):?>
<h1 class="text-primary mt-5 text-center display-4">Add Doctors</h1>
<?php else : ?>
<h1 class="text-primary mt-5 text-center display-4">Edit Doctors</h1>
<?php endif;?>
<div class="container mt-5 col-md-6">
    <div class="card bg-light">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Name :</label>
                    <input type="text" value="<?php echo $name;?>" name="name" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="">Department :</label>
                    <?php 
                        $select2="SELECT * FROM department";
                        $s2=mysqli_query($conn,$select2);
                    ?>
                    <select name="department" class="form-control">
                        <?php foreach($s2 as $data){?>
                        <option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="text-center">
                    <?php if($edit==false):?>
                        <button class="btn btn-info w-50" name="add">Add</button>
                    <?php else : ?>
                        <button class="btn btn-info w-50" name="update">Edit</button>
                    <?php endif;?>
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
include '../shared/footer.php';
?>