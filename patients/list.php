<? ob_start(); ?>
<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';
include '../db/functionality.php';

$select="SELECT patintes.id, patintes.name as patient_name, patintes.status,rooms.name as room_name,doctors.name as doctor_name FROM patintes 
INNER JOIN rooms ON patintes.room_id = rooms.id 
INNER JOIN doctors ON patintes.doctor_id = doctors.id;";
$s=mysqli_query($conn,$select);
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `patintes` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
    testMessage($d,"Deleted");
    header("location:/hospital-system/patintes/list.php");
}
?>

<h1 class="text-primary mt-5 text-center display-4">Patintes</h1>
<div class="container mt-5 col-md-6">
    <div class="card bg-light">
        <div class="card-body">
            <table class="table table-primary">
                <tr>
                    <th>ID</th>
                    <th>patintes</th>
                    <th>status</th>
                    <th>doctor</th>
                    <th>room</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['patient_name']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><?php echo $data['doctor_name']; ?></td>
                    <td><?php echo $data['room_name']; ?></td>
                    <td><a href="/hospital-system/patients/add.php?edit=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure?')" href="/hospital-system/patients/list.php?delete=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a></td>
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