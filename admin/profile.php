<?php include 'includes/header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Manage Your Profile</h1>

          <div class="row">
              <!-- profile card -->
                    <div class="col-md-4 user-profile">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>
                            </div>

                            <div class="card-body">
                                <?php 
                                    $user_id = $_SESSION['id'];

                                    $query = "SELECT * FROM admin WHERE admin_id = '$user_id'";
                                    $selectQuery = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_assoc($selectQuery)){
                                        $id        = $row['admin_id'];
                                        $fullName  = $row['admin_name'];
                                        $mail      = $row['admin_email'];
                                        $phone     = $row['admin_phone'];
                                        $role      = $row['role'];
                                    
?>
            <?php 
                  if(!empty($avatar)){
                    ?>
                    <img class="img-fluid" src="img/users-avatar/<?php echo $_SESSION['avatar']; ?>">
                    <?php
                  }
                  else{
                    ?>
                    <img class="img-fluid" src="img/users-avatar/avatar1.jpg">
                  <?php
                  }
                ?>
                                    
                                    
                                    <table class="mt-2 table-dark table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">Admin Name</th>
                                        <td><?php echo $fullName; ?></td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="col">Admin Email</th>
                                        <td><?php echo $mail; ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="col">Contact No.</th>
                                        <td><?php echo $phone; ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="col">Role</th>
                                        <td><?php echo $role; ?></td>
                                      </tr>
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
                                <h6 class="m-0 font-weight-bold text-primary">Update Profile</h6>
                            </div>

                            
                            <div class="card-body">
                                <?php 
                                    $user_id = $_SESSION['id'];

                                    $query = "SELECT * FROM admin WHERE admin_id = '$user_id'";
                                    $selectQuery = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_assoc($selectQuery)){
                                        $id        = $row['admin_id'];
                                        $fullName  = $row['admin_name'];
                                        $email     = $row['admin_email'];
                                        $phone     = $row['admin_phone'];
                                                                       
?>
        <div class="row">

                <div class="col-lg-6">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $fullName; ?>" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="phone">E-mail</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                        </div>


                </div>
                        <div class="col-lg-6">

                        <div class="form-group">
                            <label for="author">Password</label>
                            <input type="password" name="password" class="form-control" value="" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="avatar">Profile Picture</label><br>
                            <?php
                            
                            if(!empty($avatar)){
                            ?>
                                <img class="img-fluid" width="50" src="img/users-avatar/<?php echo $_SESSION['avatar']; ?>">
                            <?php
                            }
                            ?>
                            <input type="file" name="avatar" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user-id" value="<?php echo $user_id; ?>">
                            <input type="submit" name="update-user" class="btn btn-primary btn-flat" value="Save Changes">
                        </div>

                
                     </form>
                </div>

                     <?php
                                    }
                    ?>    
            </div> 
        </div>
    </div>
</div>
        <!-- /.container-fluid -->
        <?php 
            if(isset($_POST['update-user'])){

                $ID = $_POST['user-id'];

                $fullName    = $_POST['name'];
                $username    = $_POST['username'];
                $password    = $_POST['password'];
                $rePassword = $_POST['password1'];
                $phone       = $_POST['phone'];
                $address     = $_POST['address'];
                
                $avatar      = $_FILES['avatar'];
                $avatarName  = $_FILES['avatar']['name'];
                $avatarSize  = $_FILES['avatar']['size'];
                $avatarTmpName = $_FILES['avatar']['tmp_name'];
    
                $userAllowedExtension = array("jpg", "jpeg", "png");
                $postExtension = strtolower(end(explode('.', $avatarName)));
    
                // $formError = array();
                
                // if(empty($fullName) || empty($username) || empty($password) || empty($rePasswoerd) || empty($email) || empty($phone) || empty($address) || empty($role) || empty($avatarName)){
                //   $formError = "<div class='alert alert-warning'>Please fiil up all the fields!</div>";
                // }
    
                // if($password != $rePassword){
                //   $formError = "<div class='alert alert-warning'>Password not matched!</div>";
                // }
    
                // if(!in_array($postExtension, $userAllowedExtension) && $avatarSize > 2097152){
                //   $formError = "<div class='alert alert-warning'>File Format Not supported or file size is greater than 2 MB. Please upload valid file format with allowed size. Allowed file Formats are - jpg, jpeg, png.</div>";
                // }
                
                if(!empty($avatarName)){
                $userAvatar = rand(0, 100000) . '_' . $avatarName;
                move_uploaded_file($avatarTmpName, "img/users-avatar/$userAvatar");
    
                //delete the existing image
    
                $sec_query = "SELECT * FROM users WHERE user_id = $ID";
                $del_query  = mysqli_query($conn, $sec_query);
    
                while($row = mysqli_fetch_assoc($del_query)){
                  $existing_avatar = $row['avatar'];
                }
                unlink("img/users-avatar/" .$existing_avatar);
    
                $query = "UPDATE users SET fullname = '$fullName',  pwd = '$password', phone = '$phone', user_address = '$address', avatar = '$userAvatar' WHERE user_id = '$ID'";
                
                $updateUser = mysqli_query($conn, $query);
    
                if(!$updateUser){
                  die("Something went wrong " . mysqli_error($conn));
                }
                else{
                  header("Location: profile.php");
                }
              
              }
              else{
    
                $query = "UPDATE users SET fullname = '$fullName', phone = '$phone', user_address = '$address'  WHERE user_id = '$ID'";
                
                $updateUser = mysqli_query($conn, $query);
    
                if(!$updateUser){
                  die("Something went wrong " . mysqli_error($conn));
                }
                else{
                  header("Location: profile.php");
                }
              }
            }
    
        ?>

</div>
      <!-- End of Main Content -->
<?php include 'includes/footer.php'; ?>