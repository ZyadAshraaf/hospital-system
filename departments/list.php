<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../db/conn.php';
include '../db/functionality.php';

$select="SELECT * FROM `department`";
$s=mysqli_query($conn,$select);
?>

<h1 class="text-primary mt-5 text-center display-4">Departments</h1>
<div class="container mt-5 col-md-6">
    <div class="card bg-light">
        <div class="card-body">
            <table class="table table-primary">
                <tr>
                    <th>ID</th>
                    <th>department</th>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <th><?php echo $data['id']; ?></th>
                    <th><?php echo $data['name']; ?></th>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>


<?php 
include '../shared/footer.php';
?>