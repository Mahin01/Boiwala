<?php include 'db/database.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/profile.css">
<?php

if(empty($_SESSION['email'])){
    header("Location: login.php");
  }

?>

<section class="profile">
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <h1 class="h3 mb-4 text-gray-800">ব্যবহারকারীর তথ্য</h1>
            </div>
            <div class="col-md-3">
                <form action="includes/logout.inc.php" method="POST">
                    <div class="form-group logout">
                        <input type="submit" name="logout" value="লগআউট
">
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>


    <div class="container">
        <div class="row">
            <!-- profile card -->
            <div class="col-md-4 user-profile">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ব্যাবহারকারীর বিস্তারিত</h6>
                    </div>

                    <div class="card-body">

                        <img height="200px" width="200px" class="img-fluid" src="img/avatar1.jpg">

                        <?php
                            $ID = $_SESSION['id'];
                            $fetchUser = $_SESSION['username'];

                            $query = "SELECT * FROM user WHERE uid = '$ID'";
                            $userInfo = mysqli_query($conn, $query); 
                            
                            
                            while($row = mysqli_fetch_assoc($userInfo)){
                                $userID      = $row['uid'];
                                $firstName   = $row['fname'];
                                $LastName   = $row['lname'];
                                $username    = $row['userName'];
                                $email       = $row['user_mail'];
                                $phone       = $row['phone_no'];
                                $gender      = $row['user_gender'];
                                $address     = $row['area'];
                            
                        ?>
                        <table class="mt-2 table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ইউজারনেম </th>
                                    <td><?php echo $username; ?></td>
                                <tr>
                                <tr>
                                    <th scope="col">ই-মেইল</th>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">ফোন নম্বর</th>
                                    <td><?php echo $phone; ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">লিঙ্গ</th>
                                    <td><?php echo $gender; ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">এলাকা</th>
                                    <?php 
                            $area = "SELECT * FROM area WHERE area_id = $address";
                            $fetchArea = mysqli_query($conn, $area);

                            while($row = mysqli_fetch_assoc($fetchArea)){
                                $area_name = $row['area_name'];
                            
                        ?>
                                    <td><?php echo $area_name; ?></td>
                                    <?php
                            }
                        ?>
                                </tr>

                            </thead>
                            </tbody>
                        </table>
                        <?php
                            }
                ?>
                    </div>
                </div>
            </div>
            <!-- UPDATE profile -->
            <div class="col-md-8">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> প্রোফাইল আপডেট করুন</h6>
                    </div>


                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-6">
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="name">ইউজারনেম</label>
                                        <input type="text" name="username" class="form-control"
                                            value="<?php echo $username; ?>" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="author">পাসওয়ার্ড</label>
                                        <input type="password" name="password" class="form-control"
                                            value="<?php echo $password; ?>" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">আপনার ফোন নাম্বার</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="<?php echo $phone; ?>">
                                    </div>


                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <?php
                                        $query = "SELECT * FROM area WHERE area_id = $address";
                                        $fetch_area = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_assoc($fetch_area)){
                                            $area_id      = $row['area_id'];
                                            $area_name    = $row['area_name'];
                                        
                                    ?>
                                    <label for="address">আপনার ঠিকানা</label>
                                    <input type="text" name="address" class="form-control"
                                        value="<?php echo $area_id; ?>" placeholder="<?php echo $area_name; ?>">
                                </div>
                                <?php } ?>

                                <div class=" form-group">
                                    <input type="submit" name="update-user" class="btn btn-primary btn-flat"
                                        value="পরিবর্তন করুন">
                                </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <?php 
            if(isset($_POST['update-user'])){

                $username    = $_POST['username'];
                $password    = $_POST['password'];
                $phone       = $_POST['phone'];
                $address     = $_POST['address'];
    
                 $formError = array();
                
                 if(empty($username) || empty($password) || empty($email) || empty($phone) || empty($address)){
                  $formError = "<div class='alert alert-warning'>Please fiil up all the fields!</div>";
                 }
               
                $query = "UPDATE user SET userName = '$username', pwd = '$password', phone_no = '$phone', area = '$address' WHERE uid = '$userID'";
                
                $updateUser = mysqli_query($conn, $query);
    
                if(!$updateUser){
                  die("Something went wrong " . mysqli_error($conn));
                }
                else{
                    echo "<div>Your Information Has been successfully updated!</div>";
                }
            }
    
        ?>

            <?php
         
         $selectPosts = "SELECT * FROM resell WHERE reseller_userName LIKE '%$fetchUser%'";
         $displayPosts = mysqli_query($conn,$selectPosts);
         
?>
            <div class="container">
                <div class="row">
                    <div class="all_post_hceading col-md-8 offset-md-1 mt-2">
                        <h3>আপনার সব পোস্ট</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">আইটেম নাম</th>
                                    <th scope="col">ক্যাটাগরি</th>
                                    <th scope="col">বই বিবরণ</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php         

        while($row = mysqli_fetch_assoc($displayPosts)){
                $book_title = $row['book_title'];
                $category = $row['category'];
                $details  = $row['book_desc'];
                

?>
                            <tbody>
                                <tr>
                                    <?php 
                                        $query = "SELECT * FROM category WHERE cat_id = $category";
                                        $fetchcat = mysqli_query($conn, $query); 
                                        
                                        while($row = mysqli_fetch_assoc($fetchcat)){
                                            $cat_name = $row['cat_name'];
                                        
                                    ?>
                                    <td> <?php echo $book_title; ?></td>
                                    <td><?php echo $cat_name; ?></td>
                                    <td>
                                        <?php echo $details; ?> </td>
                                    <?php } ?>
                                    <td>
                                        <div class="btn-group">

                                            <a href="update-post.php?edit=<?php echo $ID; ?>"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            <a href="profile.php?delete=<?php echo $ID; ?>"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
        }
    ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>