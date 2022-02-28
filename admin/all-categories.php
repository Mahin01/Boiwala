<?php include 'includes/header.php'; ?>

<?php 
      $msg = "";

      if(isset($_POST['add-category'])){
          $cat_title = $_POST['category'];

          if(empty($cat_title)){
            $msg = "<div class='alert alert-warning'>Category name can't be empty</div>";
          }
          else{
          $query = "INSERT INTO category(cat_name) VALUES ('$cat_title')";
          $addCategory = mysqli_query($conn, $query);

            if(!$addCategory){
              die("Something Went Wrong ". mysqli_error($conn));
            }
            else{
              $msg = "<div class='alert alert-success'>New category added successfully!</div>";
              header("Location: all-categories.php");
            }
          }
        }
?>

        <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Categories Management</h1>
          </div>
        </div>

<!-- add category start -->
      <div class="row">
          <div class="col-lg-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
              </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label for="categorry">Add Category Name</label>
                  <input type="text" name="category" class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                  <input type="submit" name="add-category" value="Add Category" class="btn btn-primary">
                </div>
            </form>
<?php echo $msg; ?>
          </div>
        </div>

<!--edit category-->           
  <?php     
                if(isset($_GET['update'])) {

                  $cat_id = $_GET['update'];

                  $query = "SELECT * FROM category WHERE cat_id='$cat_id'";
                  $selectCategoryId = mysqli_query($conn, $query);

                  while($row = mysqli_fetch_assoc($selectCategoryId)){
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_name'];
                  
      ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                    </div>
                      <div class="card-body">
                      <form action="" method="POST">
                          <div class="form-group">
                            <label for="categorry">Edit Category Name</label>
                            <input type="text" name="category" class="form-control" autocomplete="off" value="<?php if(isset($cat_id)){ echo $cat_name;} ?>">
                          </div>

                          <div class="form-group">
                            <input type="submit" name="editCategory" value="Update Category" class="btn btn-primary">
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
                  <h6 class="m-0 font-weight-bold text-primary">View All Category</h6>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php 
                            $query = "SELECT * FROM category";
                            $selectCategory = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($selectCategory)){
                              $cat_id   = $row['cat_id'];
                              $cat_name = $row['cat_name'];
                        ?>
                          <tr>
                            <td><?php echo $cat_name; ?></td>
                            <td>
                              <div class="btn-group">
                                <a href="all-categories.php?update=<?php echo $cat_id; ?>" class="btn btn-primary">Update</a>
                                <a href="all-categories.php?delete=<?php echo $cat_id; ?>" class="btn btn-danger">Delete</a>
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
    if(isset($_POST['editCategory'])){

      $cat_name = $_POST['category'];

      $query = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id ='$cat_id'";
      $updateQuery = mysqli_query($conn, $query); 

      if(!$updateQuery){
        die("Something Went Wrong ". mysqli_error($conn));
      }
      else{
        header("Location: all-categories.php");
      }

    }

?>

<!-- Delete Category -->
<?php
    if(isset($_GET['delete'])){

      $cat_id = $_GET['delete'];

      $query = "DELETE FROM category  WHERE cat_id ='$cat_id'";
      $updateQuery = mysqli_query($conn, $query); 

      if(!$updateQuery){
        die("Something Went Wrong ". mysqli_error($conn));
      }
      else{
        header("Location: all-categories.php");
      }

    }

?>

<?php include 'includes/footer.php'; ?>