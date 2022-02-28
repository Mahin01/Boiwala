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
<h1 class="h3 mb-4 text-gray-800">Members Management</h1>

              <div class="row">
                <div class="col-lg-12">
                      <div class="card shadow mb-4">

                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">All Members</h6>
                        </div>

                      <div class="card-body">
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Sl. No</th>
                              <th scope="col">Firstname</th>
                              <th scope="col">Lastame</th>
                              <th scope="col">Username</th>
                              <th scope="col">E-mail</th>
                              <th scope="col">Phone No.</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Area</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>

                          <tbody>
<?php
                          $query = "SELECT * FROM members";
                          $all_user = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_assoc($all_user)){
                            
                            $user_id       = $row['member_id'];
                            $firstname     = $row['fname'];
                            $lastname      = $row['lname'];
                            $userName      = $row['username'];
                            $email         = $row['email'];
                            $phone         = $row['phone'];
                            $gender        = $row['gender'];
                            $user_address =  $row['area'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $user_id; ?></th>
                              <td><?php echo $firstname; ?></td>
                              <td><?php echo $lastname; ?></td>
                              <td><?php echo $userName; ?></td>
                              <td><?php echo $email; ?></td>
                              <td><?php echo $phone; ?></td>
                              <td><?php echo $gender; ?></td>
                              <td><?php echo $user_address; ?></td>

                              <td>
                                <div class="action-bar">
                                  <ul>
                                    <li><i class="fa fa-eye" data-toggle="modal" data-target="#userModal"></i></li>
                                    <li><i class="fa fa-trash" data-toggle="modal" data-target="#exampleModal"></i></li>
                                  </ul>
                                </div>

<!-- user Profile modal -->
                  
                        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                              <div class="container">
                                <div class="row">
                                  <div class="col-lg-12 text-center">
                                  <img src="img/users-avatar/<?php echo $avatar; ?>" class="user-profile-img">
                                </div>

                                <div class="col-lg-12">
                                <table class="table-dark table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">First Name</th>
                                        <td><?php echo $firstname; ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="col">Last Name</th>
                                        <td><?php echo $lastname; ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="col">Username</th>
                                        <td><?php echo $userName; ?></td>
                                      <tr>
                                      <tr>
                                        <th scope="col">E-mail</th>
                                        <td><?php echo $email; ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="col">phone</th>
                                        <td><?php echo $phone; ?></td>
                                     </tr>
                                     <tr>
                                        <th scope="col">Gender</th>
                                        <td><?php echo $gender; ?></td>
                                     </tr>

                                     <tr>
                                        <th scope="col">Area</th>
                                        <td><?php echo $user_address; ?></td>
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
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                <a href="users.php?do=delete&trash=<?php echo $user_id; ?>" class="btn btn-danger">Delete</a>

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
<?php
            }

      if($do == 'delete'){

        if(isset($_GET['trash'])){

          $id = $_GET['trash'];

          
          $query = "SELECT * FROM users WHERE ID = '$id'";
          $del_query  = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($del_query)){
            $existing_avatar = $row['avatar'];
          }
          unlink("img/users-avatar/" .$existing_avatar);

          $delete_query = "DELETE FROM users WHERE ID = '$id'";
          $deleteUser = mysqli_query($conn, $delete_query);

          if(!$deleteUser){
            die("Something went wrong " . mysqli_error($conn));
          }
          else{
            header("Location: members.php?do=manage");
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