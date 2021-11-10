<? ob_start(); ?>
<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';
include '../db/functionality.php';

$select="SELECT doctors.id,doctors.name as doctor_name,department.name as department_name FROM `doctors` JOIN `department` ON
doctors.department_id=department.id";
$s=mysqli_query($conn,$select);
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `doctors` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
    testMessage($d,"Deleted");
    header("location:/hospital-system/doctors/list.php");
}
?>

<h1 class="text-primary mt-5 text-center display-4">Doctors</h1>
<div class="container mt-5 col-md-6">
    <div class="card bg-light">
        <div class="card-body">
            <table class="table table-primary">
                <tr>
                    <th>ID</th>
                    <th>Doctors</th>
                    <th>Department</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['doctor_name']; ?></td>
                    <td><?php echo $data['department_name']; ?></td>
                    <td><a href="/hospital-system/doctors/add.php?edit=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure?')" href="/hospital-system/doctors/list.php?delete=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>


<?php 
include '../shared/footer.php';
?>
<? ob_end_flush(); ?>