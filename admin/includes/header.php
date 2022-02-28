<?php include "../db/database.php"; ?>

<?php
ob_start();
session_start();

if (empty($_SESSION['email'])) {
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img width="30" height="30" src="..//img/logo.png" alt="logo">
                </div>
                <div class="sidebar-brand-text mx-3">BoiWala</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin Area
            </div>

            <?php
      if ($_SESSION['role'] == 1) {
      ?>
            <!-- Nav Item - Blog Categories Menu -->
            <li class="nav-item">
                <a class="nav-link" href="all-categories.php">
                    <i class="far fa-life-ring"></i>
                    <span>Category</span>
                </a>
            </li>
            <!-- Areas Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="areas.php">
                    <i class=" fas fa-location-arrow"></i>
                    <span>Areas</span>
                </a>
            </li>

            <!-- Nav Item - Blog Posts Menu -->
            <li class="nav-item">
                <a class="nav-link" href="all-posts.php">
                    <i class="far fa-sticky-note"></i>
                    <span>All Posts</span>
                </a>
            </li>

            <!-- Nav Item - member Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="members.php">
                    <i class="far fa-comments"></i>
                    <span>Members</span>
                </a>
            </li>

            <!-- Nav Item - users Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="users.php">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="writers.php">
                    <i class="fas fa-users"></i>
                    <span>Writers</span>
                </a>
            </li>


            <!-- Website Settings -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="settings.php">
                    <i class="fas fa-users"></i>
                    <span>Website Settings</span>
                </a>

            </li>
            <?php
      }

      ?>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="messages.php" id="messagesDropdown">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <?php
                    $sql = "SELECT * FROM contactadmin WHERE read_status = 0";
                    $fetchMsg = mysqli_query($conn, $sql);

                    $i=0;
                    while($row = mysqli_fetch_assoc($fetchMsg)){
                        $i++;
                    }
                ?>
                                <span class="badge badge-danger badge-counter"><?php echo $i; ?></span>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <?php
                if (!empty($_SESSION['avatar'])) {
                ?>
                                <img class="img-profile rounded-circle"
                                    src="img/users-avatar/<?php echo $_SESSION['avatar']; ?>">
                                <?php
                } else {
                ?>
                                <img class="img-profile rounded-circle" src="img/avatar1.jpg">
                                <?php
                }
                ?>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- End of Topbar -->