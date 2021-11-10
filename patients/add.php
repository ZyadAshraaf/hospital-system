<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';
include '../db/functionality.php';

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $doctor=$_POST['doctor'];
    $room=$_POST['room'];
    $status=$_POST['status'];
    $insert="INSERT into `patintes` VALUES(null,'$name','$doctor','$room','$status')";
    $i=mysqli_query($conn,$insert);
    testMessage($i,"Added");
}
$edit=false;
$name="";
$doctor="";
$room="";
$status="";
if(isset($_GET['edit'])){  
    $edit=true;
    $id=$_GET['edit'];
    $select4="SELECT * FROM `patintes` WHERE id=$id";
    $s4=mysqli_query($conn,$select4);
    $row=mysqli_fetch_assoc($s4);
    $name=$row['name'];

    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $doctor=$_POST['doctor'];
        $room=$_POST['room'];
        $status=$_POST['status'];
        $update="UPDATE `patintes` SET name='$name',doctor_id=$doctor,room_id=$room,status='$status' WHERE id=$id";
        $u=mysqli_query($conn,$update);
        testMessage($u,"updated");
        header("location:/hospital-system/patintes/list.php");
    }
}
?>
<?php if($edit==false):?>
<h1 class="text-primary mt-5 text-center display-4">Add Patients</h1>
<?php else : ?>
<h1 class="text-primary mt-5 text-center display-4">Edit Patients</h1>
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
                    <label for="">Doctor :</label>
                    <?php 
                        $select2="SELECT * FROM doctors";
                        $s2=mysqli_query($conn,$select2);
                    ?>
                    <select name="doctor" class="form-control">
                        <?php foreach($s2 as $data){?>
                        <option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Room :</label>
                    <?php 
                        $select3="SELECT * FROM rooms";
                        $s3=mysqli_query($conn,$select3);
                    ?>
                    <select name="room" class="form-control">
                        <?php foreach($s3 as $data){?>
                        <option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">status :</label>
                    <input type="text" value="<?php echo $status;?>" name="status" class="form-control">
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