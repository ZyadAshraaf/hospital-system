<?php session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location:/hospital-system/admin/login.php");
}
?>
<!--Navbar-->
<div class="w-100  bg-primary">
    <nav class="navbar navbar-expand-lg mx-5">
        <a class="navbar-brand" href="/hospital-system/index.php"><img src="/hospital-system/img/logo.png" class="logo animate__bounceIn" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="/hospital-system/index.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Department
                        </a>
                        <div class="dropdown-menu bg-danger" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/hospital-system/departments/add.php">Add Department</a>
                            <a class="dropdown-item" href="/hospital-system/departments/list.php">List Department</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Doctors
                        </a>
                        <div class="dropdown-menu bg-danger" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/hospital-system/doctors/add.php">Add Doctors</a>
                            <a class="dropdown-item" href="/hospital-system/doctors/list.php">List Doctors</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Roomes
                        </a>
                        <div class="dropdown-menu bg-danger" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/hospital-system/rooms/add.php">Add Roomes</a>
                            <a class="dropdown-item" href="/hospital-system/rooms/list.php">List Roomes</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            patients
                        </a>
                        <div class="dropdown-menu bg-danger" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/hospital-system/patients/add.php">Add patients</a>
                            <a class="dropdown-item" href="/hospital-system/patients/list.php">List patients</a>
                        </div>
                    </li>
                    <?php if ($_SESSION['role'] == 0) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                Admins
                            </a>
                            <div class="dropdown-menu bg-danger" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/hospital-system/admin/add.php">Add admin</a>
                            </div>
                        </li>
                    <?php endif; ?>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <button name="logout" class="btn btn-danger my-2 my-sm-0"> logout</button>
            </form>
        <?php else : ?>
            <form class="form-inline my-2 my-lg-0">
                <a href="/hospital-system/admin/login.php" class="btn btn-info mx-2 my-2 my-sm-0" type="submit">Login</a>
                <a href="/hospital-system/admin/signup.php" class="btn btn-danger mx-2 my-2 my-sm-0" type="sign up">Sign Up</a>
            </form>
        <?php endif; ?>
        </div>
    </nav>
</div>