<?php include "db/database.php"; 
    ob_start();
    session_start(); 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boiwala</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="../admin/css/sb-admin-2.min.css">

</head>

<body>

    <header>
        <div class="header-bot">
            <div class="container">
                <div class="row header-bot_inner_wthreeinfo_header_mid">
                    <div class="col-md-3 logo_agile">
                        <h1 class="text-center">
                            <img src="img/logo.png" width="100px" height="200px" alt="" class="img-fluid">
                            <a href="index.php" class="font-weight-bold font-italic">
                                বইওয়ালা
                            </a>
                        </h1>
                    </div>

                    <div class="col-md-9 header mt-5 mb-md-0 mb-2">
                        <div class="row">

                            <div class="col-10 agileits_search">
                                <form class="form-inline" action="book-search.php" method="post">
                                    <input class="form-control mr-sm-2" type="search"
                                        placeholder="আপনার কাঙ্খিত বই অনুসন্ধান করুন" aria-label="Search" name="search"
                                        required>
                                    <button name="searchBoiwala" class="btn my-2 my-sm-0" type="submit">অনুসন্ধান
                                        করুন</button>
                                </form>
                            </div>
                            <?php 
                                if(empty($_SESSION['email'])){
                                    ?>
                            <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                                <a class="btn" href="sign-up.php">
                                    লগইন/রেজিস্টার</a></ </div>
                                <?php
                                }
                        ?>

                                <?php 
            if(!empty($_SESSION['email'])){
                ?>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link" href="profile.php">
                                        <span
                                            class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                        <?php 
                  if(!empty($_SESSION['avatar'])){
                    ?>
                                        <img class="img-profile rounded-circle"
                                            src="img/users-avatar/<?php echo $_SESSION['avatar']; ?>">
                                        <?php
                  }
                  else{
                    ?>

                                        <img height="50px" width="30px" class="img-profile rounded-circle"
                                            src="img/avatar1.jpg">
                                        <?php
                  }
                ?>

                                    </a>
                                    <!-- Dropdown - User Information -->
                                </li>
                                <?php
                                }
                        ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <nav class="navbar second-nav navbar-expand-lg">
                <div class="container second-menu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="index.php" class="nav-link">হোম</a></li>

                            <li class="nav-item dropdown"><a href="writer.php" class="nav-link">লেখক</a></li>

                            <li class="nav-item dropdown"><a href="resell.php" class="nav-link">বই পুনঃবিক্রয়</a></li>

                            <li class="nav-item"><a href="accessories.php" class="nav-link">গিফট এক্সেসরিজ</a></li>
                            <li class="nav-item"><a href="gift-books.php" class="nav-link">গিফট বুকস</a></li>
                            <li class="nav-item"><a href="exchange-books.php" class="nav-link">বই বিনিময়</a></li>
                            <li class="nav-item"><a href="contact.php" class="nav-link">যোগাযোগ করুন</a></li>


                        </ul>
                    </div>
                </div>
            </nav>

    </header>