<?php include 'includes/header.php'; ?>

<div class="container-fluid">



    <?php
      if($_SESSION['role'] == 1){
        ?>
    <?php
            $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

            if($do == 'manage'){
?>

    <!-- Begin Page Content -->

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View All Writers</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Writers</h6>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sl. No</th>
                                <th scope="col">Writer Avatar</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Writer Details</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                          $query = "SELECT * FROM writer";
                          $all_user = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_assoc($all_user)){
                            
                            $writer_id       = $row['writer_id'];
                            $writer_name     = $row['writer_name'];
                            $writer_details  = $row['writer_details'];
                            $writer_pic      = $row['writer_pic'];
                            
                            ?>
                            <tr>
                                <th scope="row"><?php echo $writer_id; ?></th>
                                <td><?php echo $writer_pic; ?></td>
                                <td><?php echo $writer_name; ?></td>
                                <td><?php echo $writer_details; ?></td>

                                <td>
                                    <div class="action-bar">
                                        <ul>
                                            <li><i class="fa fa-eye" data-toggle="modal" data-target="#userModal"></i>
                                            </li>
                                            <li><a href="writers.php?do=edit&update=<?php echo $writer_id; ?>"><i
                                                        class="fa fa-edit"></i></a></li>
                                            <li><i class="fa fa-trash" data-toggle="modal"
                                                    data-target="#exampleModal"></i></li>
                                        </ul>
                                    </div>

                                    <!-- user Profile modal -->

                                    <div class="modal fade" id="userModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-12 text-center">
                                                                <img src="img/users-avatar/<?php echo $avatar; ?>"
                                                                    class="user-profile-img">
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <table class="table-dark table-striped table-bordered">
                                                                    <thead>
                                                                        <tr colspan=2>
                                                                            <th scope="col">Writer Name</th>
                                                                            <td><?php echo $writer_name; ?></td>
                                                                        </tr>

                                                                        <tr colspan=2>
                                                                            <th scope="col">Writer Details</th>
                                                                            <td><?php echo $writer_details; ?></td>
                                                                        </tr>





                                                                    </thead>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<!-- delete user Modal -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do You Want to Delete This user?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                            <a href="writers.php?do=delete&trash=<?php echo $writer_id; ?>"
                                class="btn btn-danger">Delete</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</td>
</tr>
<?php
                          }
               ?>
</tbody>
</table>
</div>

</div>
</div>
</div>

<div class="btn-box">
    <a href="writers.php?do=add" class="btn btn-primary">Add New Writer</a>
</div>
<?php
            }
          
          if($do == "add"){

            ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Writer</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Writer</h6>
                </div>

                <div class="card-body">
                    <div class="container">

                        <form action="?do=insert" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="name">Writer Name</label>
                                <input type="text" name="name" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="phone">Writer Details</label>
                                <input type="text" name="details" class="form-control">
                            </div>



                            <div class="form-group">
                                <label for="avatar">Writer Picture</label>
                                <input type="file" name="avatar" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="add-writer" class="btn btn-primary btn-flat"
                                    value="Add New Writer">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
<?php
          }
        if($do == "insert"){

          if(isset($_POST['add-writer'])){

            $writerName    = $_POST['name'];
            $writerDetails = $_POST['details'];

            $avatar      = $_FILES['avatar'];
            $avatarName  = $_FILES['avatar']['name'];
            $avatarSize  = $_FILES['avatar']['size'];
            $avatarTmpName = $_FILES['avatar']['tmp_name'];

            $userAllowedExtension = array("jpg", "jpeg", "png");

            $formError = array();
            
            if(empty($writerName) || empty($writerDetails)){
              $formError = "<div class='alert alert-warning'>Please fiil up all the fields!</div>";
            }
            
            else{
            $userAvatar = rand(0, 100000) . '_' . $avatarName;
            move_uploaded_file($avatarTmpName, "img/$userAvatar");

            $query = "INSERT INTO writer (writer_name,writer_details) VALUES ('$writerName', '$writerDetails')";
            
            $createUser = mysqli_query($conn, $query);

            if(!$createUser){
              die("Something went wrong " . mysqli_error($conn));
            }
            else{
              header("Location: writers.php?do=manage");
            }

            }
             
          }
        }

// update user info

        if($do == 'edit'){
          if(isset($_GET['update'])){
            $writer_id = $_GET['update'];

            $query = "SELECT * FROM writer WHERE writer_id = '$writer_id'";
            $getUser = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($getUser)){
                $id        = $row['writer_id'];
                $writer_Name = $row['writer_name'];
                $writer_details = $row['writer_details'];
                $avatar         = $row['writer_pic'];

                ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update User</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update User Info</h6>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">

                                <form action="?do=update" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="name">Writer Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo $writer_Name; ?>" autocomplete="off">
                                    </div>




                                    <div class="form-group">
                                        <label for="uname">Writer Details</label>
                                        <input type="text" name="details" value="<?php echo $writer_details; ?>"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="avatar">Profile Picture</label><br>
                                        <img src="img/users-avatar/<?php echo $avatar; ?>" width="40px">
                                        <input type="file" name="avatar" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="writer-id" value="<?php echo $writer_id; ?>">
                                        <input type="submit" name="update-writer" class="btn btn-primary btn-flat"
                                            value="Update Writer">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
            }
          }
        }

        if($do == 'update'){

          if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $ID = $_POST['writer-id'];
            $writerName    = $_POST['name'];
            $writer_details = $_POST['details'];
            $avatar      = $_FILES['avatar'];
            $avatarName  = $_FILES['avatar']['name'];
            $avatarSize  = $_FILES['avatar']['size'];
            $avatarTmpName = $_FILES['avatar']['tmp_name'];

            $userAllowedExtension = array("jpg", "jpeg", "png");

            $formError = array();
            
            if(empty($writerName) || empty($writer_details)){
              $formError = "<div class='alert alert-warning'>Please fiil up all the fields!</div>";
            }

            if(!in_array($postExtension, $userAllowedExtension) && $avatarSize > 2097152){
              $formError = "<div class='alert alert-warning'>File Format Not supported or file size is greater than 2 MB. Please upload valid file format with allowed size. Allowed file Formats are - jpg, jpeg, png.</div>";
            }
            
            if(!empty($avatarName)){
            $userAvatar = rand(0, 100000) . '_' . $avatarName;
            move_uploaded_file($avatarTmpName, "img/$userAvatar");

            //delete the existing image

            $sec_query = "SELECT * FROM writer WHERE writer_id = $ID";
            $del_query  = mysqli_query($conn, $sec_query);

            while($row = mysqli_fetch_assoc($del_query)){
              $existing_avatar = $row['avatar'];
            }
            unlink("img/" .$existing_avatar);

            $query = "UPDATE writer SET writer_name = '$writerName', writer_details= ' $writer_details', writer_pic = '$userAvatar' WHERE writer_id = '$ID'";
            
            $updateUser = mysqli_query($conn, $query);

            if(!$updateUser){
              die("Something went wrong " . mysqli_error($conn));
            }
            else{
              header("Location: writers.php?do=manage");
            }
          
          }
          else{

            $query = "UPDATE writer SET writer_name = '$writerName', writer_details= ' $writer_details' WHERE writer_id = '$ID'";
            
            $updateUser = mysqli_query($conn, $query);

            if(!$updateUser){
              die("Something went wrong " . mysqli_error($conn));
            }
            else{
              header("Location: writers.php?do=manage");
            }
          }
        }
      }

      if($do == 'delete'){

        if(isset($_GET['trash'])){

          $id = $_GET['trash'];

          
          $query = "SELECT * FROM writer WHERE writer_id = '$id'";
          $del_query  = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($del_query)){
            $existing_avatar = $row['avatar'];
          }
          unlink("img/users-avatar/" .$existing_avatar);

          $delete_query = "DELETE FROM writer WHERE writer_id = '$id'";
          $deleteUser = mysqli_query($conn, $delete_query);

          if(!$deleteUser){
            die("Something went wrong " . mysqli_error($conn));
          }
          else{
            header("Location: writers.php?do=manage");
          }
        }
      }

?>

<?php
      }
  ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include 'includes/footer.php'; ?>