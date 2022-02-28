<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Advertisement Posts</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Resell Posts</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Posted By</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Area</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM resell";
                            $selectPosts = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($selectPosts)) {
                                $ID           = $row['ID'];
                                $posted_by    = $row['reseller_userName'];
                                $poster_mail  = $row['reseller_mail'];
                                $poster_contact = $row['reseller_phone'];
                                $book_title   = $row['book_title'];
                                $price        = $row['price'];
                                $author_name  = $row['authorName'];
                                $address      = $row['reseller_area'];
                                $post_category = $row['category'];
                                $status        = $row['status'];

                            ?>

                            <tr>

                                <td><?php echo $posted_by; ?></td>
                                <td><?php echo $poster_mail; ?></td>
                                <td><?php echo $poster_contact; ?></td>
                                <td><?php echo $book_title; ?></td>

                                <td>
                                    <?php
                                        $query = "SELECT * FROM category WHERE cat_id = '$post_category'";
                                        $fetch_cat = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id  =  $row['cat_id'];
                                            $cat_name = $row['cat_name'];
                                        }
                                        echo $cat_name;
                                        ?>
                                </td>
                                <td scope="col"><?php echo $address; ?></td>
                                <td scope="col"><?php echo $price; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <?php if ($status == 0) { ?>
                                        <a href="all-posts.php?Approved=<?php echo $ID; ?>"
                                            class="btn btn-primary btn-sm">Approve</a>
                                        <?php } ?>
                                        <a href="all-posts.php?delete=<?php echo $ID; ?>"
                                            class="btn btn-danger btn-sm">Delete</a>
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



    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Accessories Posts</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Posted By</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Accessories Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Area</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM accessories";
                            $selectPosts = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($selectPosts)) {
                                $ID           = $row['ID'];
                                $posted_by    = $row['donor_Name'];
                                $poster_mail  = $row['donor_mail'];
                                $poster_contact = $row['donor_phone'];
                                $access_title   = $row['access_title'];
                                $address      = $row['donor_area'];
                                $post_category = $row['category'];
                                $status        = $row['status'];

                            ?>

                            <tr>

                                <td><?php echo $posted_by; ?></td>
                                <td><?php echo $poster_mail; ?></td>
                                <td><?php echo $poster_contact; ?></td>
                                <td><?php echo $access_title; ?></td>

                                <td>
                                    <?php
                                        $query = "SELECT * FROM category WHERE cat_id = '$post_category'";
                                        $fetch_cat = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id  =  $row['cat_id'];
                                            $cat_name = $row['cat_name'];
                                        }
                                        echo $cat_name;
                                        ?>
                                </td>
                                <td scope="col"><?php echo $address; ?></td>
                                <td scope="col"><?php echo $price; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <?php if ($status == 0) { ?>
                                        <a href="all-posts.php?Approvedaccess=<?php echo $ID; ?>"
                                            class="btn btn-primary btn-sm">Approve</a>
                                        <?php } ?>
                                        <a href="all-posts.php?delAccess=<?php echo $ID; ?>"
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



    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Donate Posts</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Posted By</th>
                                <th scope="col">Author E-mail</th>
                                <th scope="col">Author Phone</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Books Category</th>
                                <th scope="col">Area</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM gift";
                            $selectPosts = mysqli_query($conn, $query);
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($selectPosts)) {
                                $ID           = $row['ID'];
                                $posted_by    = $row['item_posted_by'];
                                $poster_mail  = $row['donor_mail'];
                                $poster_contact = $row['donor_phone'];
                                $Item_title     = $row['book_title'];
                                $address      = $row['donor_area'];
                                $post_category = $row['category'];
                                $status        = $row['status'];
                                $i++;
                            ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $posted_by; ?></td>
                                <td><?php echo $poster_mail; ?></td>
                                <td><?php echo $poster_contact; ?></td>
                                <td><?php echo $Item_title; ?></td>

                                <td>
                                    <?php
                                        $query = "SELECT * FROM category WHERE cat_id = '$post_category'";
                                        $fetch_cat = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id  =  $row['cat_id'];
                                            $cat_name = $row['cat_name'];
                                        }
                                        echo $cat_name;
                                        ?>
                                </td>
                                <td scope="col"><?php echo $address; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <?php if ($status == 0) { ?>
                                        <a href="all-posts.php?Approvedgift=<?php echo $ID; ?>"
                                            class="btn btn-primary btn-sm">Approve</a>
                                        <?php } ?>
                                        <a href="all-posts.php?delGift=<?php echo $ID; ?>"
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


    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Exchange Posts</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Posted By</th>
                                <th scope="col">Author E-mail</th>
                                <th scope="col">Author Phone</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Book Category</th>
                                <th scope="col">Area</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM book_exchange";
                            $selectPosts = mysqli_query($conn, $query);
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($selectPosts)) {
                                $ID           = $row['ID'];
                                $posted_by    = $row['exchanger_Name'];
                                $poster_mail  = $row['exchanger_mail'];
                                $poster_contact = $row['exchanger_phone'];
                                $Item_title     = $row['book_title'];
                                $address      = $row['exchanger_area'];
                                $post_category = $row['category'];
                                $status        = $row['status'];
                                $i++;
                            ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $posted_by; ?></td>
                                <td><?php echo $poster_mail; ?></td>
                                <td><?php echo $poster_contact; ?></td>
                                <td><?php echo $Item_title; ?></td>

                                <td>
                                    <?php
                                        $query = "SELECT * FROM category WHERE cat_id = '$post_category'";
                                        $fetch_cat = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id  =  $row['cat_id'];
                                            $cat_name = $row['cat_name'];
                                        }
                                        echo $cat_name;
                                        ?>
                                </td>
                                <td scope="col"><?php echo $address; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <?php if ($status == 0) { ?>
                                        <a href="all-posts.php?Approvedexc=<?php echo $ID; ?>"
                                            class="btn btn-primary btn-sm">Approve</a>
                                        <?php } ?>
                                        <a href="all-posts.php?delExc=<?php echo $ID; ?>"
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

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Delete Post -->
<?php

//Delete Resell Post
if (isset($_GET['delete'])) {

    $post_id = $_GET['delete'];

    $del_img = "SELECT book_img1, book_img2, book_img3 FROM resell WHERE ID=$post_id";
    $deleteImg = mysqli_query($conn, $del_img);

    while ($row = mysqli_fetch_assoc($deleteImg)) {
        $existing_thumb1 = $row['book_img1'];
        $existing_thumb2 = $row['book_img2'];
        $existing_thumb3 = $row['book_img3'];
    }
    unlink("img/resell/$existing_thumb1");
    unlink("img/resell/$existing_thumb2");
    unlink("img/resell/$existing_thumb3");


    $query = "DELETE FROM resell WHERE ID ='$post_id'";
    $updateQuery = mysqli_query($conn, $query);

    if (!$updateQuery) {
        die("Something Went Wrong " . mysqli_error($conn));
    } else {
        header("Location: all-posts.php");
    }
}


//Delete Accessories Post
if (isset($_GET['delAccess'])) {

    $post_id = $_GET['delAccess'];

    $delAccessImg = "SELECT acccesories_pic FROM accessories WHERE ID=$post_id";
    $deleteImg = mysqli_query($conn, $delAccessImg);

    while ($row = mysqli_fetch_assoc($deleteImg)) {
        $existing_thumb = $row['accessories_pic'];
    }
    unlink("img/Accessories/$existing_thumb");

    $query = "DELETE FROM accessories WHERE ID ='$post_id'";
    $updateQuery = mysqli_query($conn, $query);

    if (!$updateQuery) {
        die("Something Went Wrong " . mysqli_error($conn));
    } else {
        header("Location: all-posts.php");
    }
}

//Delete Gift Post
if (isset($_GET['delGift'])) {

    $post_id = $_GET['delGift'];

    $del_img = "SELECT book_img FROM gift WHERE ID=$post_id";
    $delgiftImg = mysqli_query($conn, $del_img);

    while ($row = mysqli_fetch_assoc($delgiftImg)) {
        $existing_thumb = $row['book_img'];
    }
    unlink("img/gift/$existing_thumb");

    $query = "DELETE FROM gift WHERE ID ='$post_id'";
    $updateQuery = mysqli_query($conn, $query);

    if (!$updateQuery) {
        die("Something Went Wrong " . mysqli_error($conn));
    } else {
        header("Location: all-posts.php");
    }
}

//Delete Exchange Post
if (isset($_GET['delExc'])) {

    $post_id = $_GET['delExc'];

    $del_img = "SELECT book_img1, book_img2, book_img3 FROM book_exchange WHERE ID=$post_id";
    $delExcImg = mysqli_query($conn, $del_img);

    while ($row = mysqli_fetch_assoc($delExcImg)) {
        $existing_thumb1 = $row['book_img1'];
        $existing_thumb2 = $row['book_img2'];
        $existing_thumb3 = $row['book_img3'];
    }
    unlink("img/exchange/$existing_thumb1");
    unlink("img/exchange/$existing_thumb2");
    unlink("img/exchange/$existing_thumb3");


    $query = "DELETE FROM book_exchange WHERE ID ='$post_id'";
    $updateQuery = mysqli_query($conn, $query);

    if (!$updateQuery) {
        die("Something Went Wrong " . mysqli_error($conn));
    } else {
        header("Location: all-posts.php");
    }
}



?>

<?php

//Resell Post Approval
if (isset($_GET['Approved'])) {
    $approve_id = $_GET['Approved'];

    $sql = "UPDATE resell SET status = 1 WHERE ID ='$approve_id'";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Something Went Wrong " . mysqli_connect_error());
    } else {
        header("Location: all-posts.php");
    }
}

//Accessories Post Approval
if (isset($_GET['Approvedaccess'])) {
    $approve_id = $_GET['Approvedaccess'];

    $sql = "UPDATE accessories SET status = 1 WHERE ID ='$approve_id'";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Something Went Wrong " . mysqli_connect_error());
    } else {
        header("Location: all-posts.php");
    }
}

//Donate Post Approval
if (isset($_GET['Approvedgift'])) {
    $approve_id = $_GET['Approvedgift'];

    $sql = "UPDATE gift SET status = 1 WHERE ID ='$approve_id'";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Something Went Wrong " . mysqli_connect_error());
    } else {
        header("Location: all-posts.php");
    }
}

//Exchange Post Approval
if (isset($_GET['Approvedexc'])) {

    $approve_id = $_GET['Approvedexc'];

    $sql = "UPDATE book_exchange SET status = 1 WHERE ID ='$approve_id'";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Something Went Wrong " . mysqli_connect_error());
    } else {
        header(" Location: all-posts.php");
    }
}

?>


<?php include 'includes/footer.php'; ?>