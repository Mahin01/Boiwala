<?php include 'includes/header.php'; ?>


<?php
    $msg="";
    if(isset($_GET['success'])){
        $msg = "<div class=alert alert-success>Succesfully Updated!</div>";
    }
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Social Media</h1>

    <?php
            $msg = "";

            if(isset($_GET['success'])){
              $msg = "<div class='alert alert-success'>Succesfully Updated!</div>";
            }
        ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Social Media URL's</h6>
                </div>

                <div class="card-body">

                    <form action="" method="POST">

                        <!-- Facebook -->
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="facebook">Facebook</label>
                            </div>

                            <div class="col-sm-8">
                                <?php
                      $query = "SELECT * FROM social WHERE social_id = 1";
                      $all_media = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_assoc($all_media)){
                         $media_url = $row['media_url'];
                      }
                      if(empty($media_url)){
                      ?>
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook URL">
                                <?php
                      }
                      else{
                        ?>
                                <input type="text" name="facebook" class="form-control"
                                    value="<?php echo $media_url; ?>">
                                <?php
                      }
                      
                ?>
                            </div>

                            <div class="col-sm-2">
                                <input type="submit" name="url-link-facebook" value="save"
                                    class="btn btn-primary btn-flat btn-sm">
                            </div>

                        </div>
                        <?php
                      if(isset($_POST['url-link-facebook'])){
                        $facebook = $_POST['facebook'];

                        $query = "UPDATE social SET media_url = '$facebook' WHERE social_id = 1";
                        $fb_url = mysqli_query($conn, $query);

                        if(!$fb_url){
                          die("Something Went Wrong. Try Again". mysqli_error($conn));
                        }
                        else{
                          header("Location: settings.php?success");
                        }
                      }
                    ?>
                    </form>
                    <!-- Twitter -->
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="twitter">Twitter</label>
                            </div>

                            <div class="col-sm-8">
                                <?php
                      $query = "SELECT * FROM social WHERE social_id = 2";
                      $all_media = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_assoc($all_media)){
                        $media_url = $row['media_url'];
                      }
                      if(empty($media_url)){
                      ?>
                                <input type="text" name="twitter" class="form-control" placeholder="Twitter URL">
                                <?php
                      }
                      else{
                        ?>
                                <input type="text" name="twitter" class="form-control"
                                    value="<?php echo $media_url; ?>">
                                <?php
                      }
                      
                ?>
                            </div>

                            <div class="col-sm-2">
                                <input type="submit" name="url-link-twitter" value="save"
                                    class="btn btn-primary btn-flat btn-sm">
                            </div>

                        </div>
                        <?php
                        if(isset($_POST['url-link-twitter'])){
                          $twitter = $_POST['twitter'];

                          $query = "UPDATE social SET media_url = '$twitter' WHERE social_id = 2";
                          $fb_url = mysqli_query($conn, $query);

                          if(!$fb_url){
                            die("Something Went Wrong. Try Again". mysqli_error($conn));
                          }
                          else{
                            header("Location: settings.php?success");
                          }
                        }
                      ?>
                    </form>
                    <!-- Instagram -->
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="Instagram">Instagram</label>
                            </div>

                            <div class="col-sm-8">
                                <?php
                      $query = "SELECT * FROM social WHERE social_id = 3";
                      $all_media = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_assoc($all_media)){
                        $media_url = $row['media_url'];
                      }
                      if(empty($media_url)){
                      ?>
                                <input type="text" name="insta" class="form-control" placeholder="Instagram URL">
                                <?php
                      }
                      else{
                        ?>
                                <input type="text" name="insta" class="form-control" value="<?php echo $media_url; ?>">
                                <?php
                      }
                      
                ?>
                            </div>

                            <div class="col-sm-2">
                                <input type="submit" name="url-link-insta" value="save"
                                    class="btn btn-primary btn-flat btn-sm">
                            </div>

                        </div>

                        <?php
                      if(isset($_POST['url-link-insta'])){
                        $insta = $_POST['insta'];

                        $query = "UPDATE social SET media_url = '$insta' WHERE social_id = 3";
                        $fb_url = mysqli_query($conn, $query);

                        if(!$fb_url){
                          die("Something Went Wrong. Try Again". mysqli_error($conn));
                        }
                        else{
                          header("Location: settings.php?success");
                        }
                      }
                    ?>
                    </form>
                    <!-- Youtube -->
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="Youtube">Youtube</label>
                            </div>

                            <div class="col-sm-8">
                                <?php
                      $query = "SELECT * FROM social WHERE social_id = 4";
                      $all_media = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_assoc($all_media)){
                        $media_url = $row['media_url'];
                      }
                      if(empty($media_url)){
                      ?>
                                <input type="text" name="youtube" class="form-control" placeholder="Youtube URL">
                                <?php
                      }
                      else{
                        ?>
                                <input type="text" name="youtube" class="form-control"
                                    value="<?php echo $media_url; ?>">
                                <?php
                      }
                      
                ?>
                            </div>

                            <div class="col-sm-2">
                                <input type="submit" name="url-link-YT" value="save"
                                    class="btn btn-primary btn-flat btn-sm">
                            </div>

                        </div>

                        <?php
                      if(isset($_POST['url-link-YT'])){
                        $youtube = $_POST['youtube'];

                        $query = "UPDATE social SET media_url = '$youtube' WHERE social_id = 4";
                        $fb_url = mysqli_query($conn, $query);

                        if(!$fb_url){
                          die("Something Went Wrong. Try Again". mysqli_error($conn));
                        }
                        else{
                          header("Location: settings.php?success");
                        }
                      }
                    ?>

                    </form>

                    <?php echo $msg ; ?>
                </div>

            </div>
        </div>
    </div>

    <h1 class="h3 mb-4 text-gray-800">Manage Contact Info</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Contacts</h6>
                </div>

                <div class="card-body">

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <?php include 'includes/footer.php'; ?>