<?php include 'includes/header.php'; ?>


<?php
      if(!empty($_SESSION['email'])){
        ?>
<?php
            $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

            if($do == 'manage'){
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View All Messages</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Messages</h6>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sl. No</th>
                                <th scope="col">Sender Name</th>
                                <th scope="col">Sender E-mail</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                          $query = "SELECT * FROM contactadmin WHERE read_status = 0";
                          $all_message = mysqli_query($conn, $query);
                          $i=0;
                          while($row = mysqli_fetch_assoc($all_message)){
                            
                            $contact_id       = $row['cont_id'];
                            $sender_name      = $row['senderName'];
                            $sender_email     = $row['senderMail'];
                            $subject          = $row['cont_sub'];
                            $message          =  $row['cont_msg'];
                            $read_status      = $row['read_status'];
                            $i++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $sender_name; ?></td>
                                <td><?php echo $sender_email; ?></td>
                                <td><?php echo $subject; ?></td>
                                <td><?php echo $message; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <?php if ($read_status == 0) { ?>
                                        <a href="messages.php?MarkAsRead=<?php echo $contact_id; ?>"
                                            class="btn btn-success btn-sm">Mark As Read</a>
                                        <?php } ?>
                                        <a href="messages.php?reply=<?php echo $contact_id; ?>"
                                            class="btn btn-primary btn-sm">Reply</a>
                                    </div>
                                </td>
                            </tr>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
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

                if(isset($_GET['MarkAsRead'])){
        
                  $id = $_GET['MarkAsRead'];
        
                  $update_query = "UPDATE contactadmin SET read_status = 1 WHERE cont_id=$id";
                  $updateReadStatus = mysqli_query($conn, $update_query);
        
                  if(!$updateReadStatus){
                    die("Something went wrong " . mysqli_error($conn));
                  }
                  else{
                    header("Location: messages.php?do=manage");
                  }
                }
              }
        
        ?>