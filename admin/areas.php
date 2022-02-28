<?php include 'includes/header.php'; ?>

<?php 
      $msg = "";

      if(isset($_POST['add-area'])){
          $area_title = $_POST['area'];

          if(empty($area_title)){
            $msg = "<div class='alert alert-warning'>Area name can't be empty</div>";
          }
          else{
          $query = "INSERT INTO area(area_name) VALUES ('$area_title')";
          $addCategory = mysqli_query($conn, $query);

            if(!$addCategory){
              die("Something Went Wrong ". mysqli_error($conn));
            }
            else{
              $msg = "<div class='alert alert-success'>New Area added successfully!</div>";
              header("Location: areas.php");
            }
          }
        }
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Areas Management</h1>
        </div>
    </div>

    <!-- add category start -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Area</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="categorry">Add Area Name</label>
                            <input type="text" name="area" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="add-area" value="Add Area" class="btn btn-primary">
                        </div>
                    </form>
                    <?php echo $msg; ?>
                </div>
            </div>

            <!--edit category-->
            <?php     
                if(isset($_GET['update'])) {

                  $area_id = $_GET['update'];

                  $query = "SELECT * FROM area WHERE area_id='$area_id'";
                  $selectCategoryId = mysqli_query($conn, $query);

                  while($row = mysqli_fetch_assoc($selectCategoryId)){
                    $area_id = $row['area_id'];
                    $area_name = $row['area_name'];
                  
      ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Area</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="categorry">Edit Area Name</label>
                            <input type="text" name="area" class="form-control" autocomplete="off"
                                value="<?php if(isset($area_id)){ echo $area_name;} ?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="editArea" value="Update Area" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>


            <?php

              }
            }

?>

        </div>
        <!-- add category End -->



        <!-- view category start -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View All Area</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Area Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT * FROM area";
                            $selectCategory = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($selectCategory)){
                              $area_id   = $row['area_id'];
                              $area_name = $row['area_name'];
                        ?>
                            <tr>
                                <td><?php echo $area_name; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="areas.php?update=<?php echo $area_id; ?>"
                                            class="btn btn-primary">Update</a>
                                        <a href="areas.php?delete=<?php echo $area_id; ?>"
                                            class="btn btn-danger">Delete</a>
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
            <!-- view category End -->
        </div>
    </div>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<?php
    if(isset($_POST['editArea'])){

      $area_name = $_POST['area'];

      $query = "UPDATE area SET area_name = '$area_name' WHERE area_id ='$area_id'";
      $updateQuery = mysqli_query($conn, $query); 

      if(!$updateQuery){
        die("Something Went Wrong ". mysqli_error($conn));
      }
      else{
        header("Location: areas.php");
      }

    }

?>

<!-- Delete Category -->
<?php
    if(isset($_GET['delete'])){

      $cat_id = $_GET['delete'];

      $query = "DELETE FROM area  WHERE area_id ='$area_id'";
      $updateQuery = mysqli_query($conn, $query); 

      if(!$updateQuery){
        die("Something Went Wrong ". mysqli_error($conn));
      }
      else{
        header("Location: areas.php");
      }

    }

?>

<?php include 'includes/footer.php'; ?>