<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total categories
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM category";
                          $all_cat = mysqli_query($conn, $query);
                          $total_cat = mysqli_num_rows($all_cat);
                        ?>
                                <a href="all-categories.php"><?php echo $total_cat; ?></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-life-ring fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM user";
                          $all_users = mysqli_query($conn, $query);
                          $total_users = mysqli_num_rows($all_users);
                        ?>
                                <a href="users.php"><?php echo $total_users; ?></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Members</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM members WHERE paid_status=1";
                          $all_members = mysqli_query($conn, $query);
                          $total_members = mysqli_num_rows($all_members);
                        ?>
                                <a href="members.php"><?php echo $total_members; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Manage Areas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php 
                          $query = "SELECT * FROM area";
                          $pending_status = mysqli_query($conn, $query);
                          $i = 0;
                          while($row = mysqli_fetch_assoc($pending_status)){
                            $area_id = $row['area_id'];
                            $i++;
                          }
                       ?>
                                <a href="areas.php?do=manage"><?php echo $i; ?></a>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Resell Posts
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM resell";
                          $all_posts = mysqli_query($conn, $query);
                          $total_posts = mysqli_num_rows($all_posts);
                        ?>
                                <a href="all-posts.php"><?php echo $total_posts; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Exchange Posts
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM book_exchange";
                          $all_posts = mysqli_query($conn, $query);
                          $total_posts = mysqli_num_rows($all_posts);
                        ?>
                                <a href="all-posts.php"><?php echo $total_posts; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Donate Posts
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM gift";
                          $all_posts = mysqli_query($conn, $query);
                          $total_posts = mysqli_num_rows($all_posts);
                        ?>
                                <a href="all-posts.php"><?php echo $total_posts; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total accessories
                                Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM accessories";
                          $all_posts = mysqli_query($conn, $query);
                          $total_posts = mysqli_num_rows($all_posts);
                        ?>
                                <a href="all-posts.php"><?php echo $total_posts; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Resell Posts
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM resell WHERE status = 0";
                          $all_posts = mysqli_query($conn, $query);
                          $total_posts = mysqli_num_rows($all_posts);
                        ?>
                                <a href="all-posts.php"><?php echo $total_posts; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Book Exchange
                                Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM book_exchange WHERE Status=0";
                          $all_posts = mysqli_query($conn, $query);
                          $total_posts = mysqli_num_rows($all_posts);
                        ?>
                                <a href="all-posts.php"><?php echo $total_posts; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Donate Posts
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM gift WHERE Status=0";
                          $all_posts = mysqli_query($conn, $query);
                          $total_posts = mysqli_num_rows($all_posts);
                        ?>
                                <a href="all-comments.php"><?php echo $total_posts; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Accessories
                                Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 notification">
                                <?php
                          $query = "SELECT * FROM accessories WHERE status=0";
                          $all_posts = mysqli_query($conn, $query);
                          $total_posts = mysqli_num_rows($all_posts);
                        ?>
                                <a href="all-comments.php"><?php echo $total_posts; ?></a>

                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include 'includes/footer.php'; ?>