<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/donate.css">

<div class="main-banner banner text-center">
    <div class="container">
        <div class="post-ad">
            <a href="post-ad.php">বিনামূল্যে বিজ্ঞাপন পোস্ট করুন</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> ক্যাটাগরি
                </div>
                <ul class="list-group category_block">
                    <?php 
                            $query = "SELECT * FROM category";
                            $selectCategory = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($selectCategory)){
                              $cat_id   = $row['cat_id'];
                              $cat_name = $row['cat_name'];
                        ?>
                    <li class="list-group-item"><a href="?ref=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a></li>
                    <?php }
                            ?>

                </ul>
            </div>
        </div>
        <!-- Search By Area -->

        <div class="col">
            <div class="row">

                <div class="area_search col-10 agileits_search">
                    <form class="form-inline" action="" method="POST">
                        <select class="form-control" name="area">
                            <option class="hidden" selected disabled>আপনার এলাকা নির্বাচন করুন</option>
                            <?php
                                        $sql = "SELECT * FROM area";
                                        $fetch_area = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($fetch_area)) {
                                            $area_id   = $row['area_id'];
                                            $area_name = $row['area_name'];

                                        ?>
                            <option value="<?php echo $area_id; ?>"><?php echo $area_name; ?></option>
                            <?php
                                            }
                                        ?>

                        </select>

                        <input type="submit" name="getArea" value="অনুসন্ধান করুন">

                    </form>
                </div>
            </div>

            <section>
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">

                                <?php 
                              
                              if(isset($_GET['ref'])){

                                  $category = $_GET['ref'];

                                  $sql = "SELECT * FROM gift WHERE category=$category AND status=1";
                                  $searchByArea = mysqli_query($conn, $sql);

                                  while($row = mysqli_fetch_assoc($searchByArea)){                                              $gift_id      = $row['ID'];
                                      $book_name    = $row['book_title'];
                                      $author_name  = $row['authorName'];
                                      $area         = $row['donor_area'];
                                      $price        = $row['price'];
                                      $cover        = $row['book_img'];

                                    ?>

                                <div class="col-md-4">

                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <?php
                                          if(!empty($cover)){
                                              ?>
                                            <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>" target="_blank"
                                                rel="noopener noreferrer"><img class="img-fluid" height="50px"
                                                    width="100px" src="img/gift/<?php echo $cover; ?>"></a>
                                            <?php
                                          }  
                                          else{
                                              ?>
                                            <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>" target="_blank"
                                                rel="noopener noreferrer"><img class="img-fluid" src="img/book.jpg"></a>
                                            <?php
                                          }
                                      ?>
                                        </div>

                                        <div class="card-body">
                                            <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>">
                                                <h6 class="card-title text-center"><?php echo $book_name; ?></h6>
                                            </a>
                                            <h6 class="text-center"><span
                                                    class="card-text"><?php echo $author_name; ?></span></h6>
                                            <h6 class="text-center">Tk.<span
                                                    class="card-text"><?php echo $price; ?></span></h6>
                                        </div>
                                    </div>
                                </div>
                                <?php
                  }
                  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<section>
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <?php
                        } elseif(isset($_POST['getArea'])){

                            $area_id = $_POST['area'];

                                    $sql = "SELECT * FROM gift WHERE donor_area=$area_id AND status=1";
                                    $searchByArea = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($searchByArea) ){
                                        $gift_id      = $row['ID'];
                                        $book_name    = $row['book_title'];
                                        $author_name  = $row['authorName'];
                                        $area         = $row['donor_area'];
                                        $price        = $row['price'];
                                        $cover        = $row['book_img'];

                                        ?>

                    <div class="col-md-4">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <?php
                                            if(!empty($cover)){
                                                ?>
                                <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>" target="_blank"
                                    rel="noopener noreferrer"><img class="img-fluid" height="50px" width="100px"
                                        src="img/gift/<?php echo $cover; ?>"></a>
                                <?php
                                            }  
                                            else{
                                                ?>
                                <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>" target="_blank"
                                    rel="noopener noreferrer"><img class="img-fluid" src="img/book.jpg"></a>
                                <?php
                                            }
                                        ?>
                            </div>

                            <div class="card-body p-5">
                                <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>">
                                    <h6 class="card-title text-center"><?php echo $book_name; ?></h6>
                                </a>
                                <h6 class="text-center"><span class="card-text"><?php echo $author_name; ?></span></h6>
                                <h6 class="text-center">Tk.<span class="card-text"><?php echo $price; ?></span></h6>

                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>



<section>
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">

                    <?php
                    }else{  
    
                            $sql = "SELECT * FROM gift WHERE status=1 ORDER BY ID DESC LIMIT 9";
                            $indexView = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($indexView) ){
                                    $gift_id      = $row['ID'];
                                    $book_name    = $row['book_title'];
                                    $author_name  = $row['authorName'];
                                    $area         = $row['donor_area'];
                                    $price        = $row['price'];
                                    $cover        = $row['book_img'];
                                
                        ?>

                    <div class="col-md-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <?php
                                            if(!empty($cover)){
                                                ?>
                                <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>" target="_blank"
                                    rel="noopener noreferrer"><img class="img-fluid" height="50px" width="100px"
                                        src="img/gift/<?php echo $cover; ?>"></a>
                                <?php
                                            }  
                                            else{
                                                ?>
                                <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>" target="_blank"
                                    rel="noopener noreferrer"><img class="img-fluid" src="img/book.jpg"></a>
                                <?php
                                            }
                                        ?>
                            </div>

                            <div class="card-body">
                                <a href="details-view.php?giftbooks=<?php echo $gift_id; ?>">
                                    <h6 class="card-title text-center"><?php echo $book_name; ?></h6>
                                </a>
                                <h6 class="text-center"><span class="card-text"><?php echo $author_name; ?></span></h6>
                                <h6 class="text-center"><i class="fas fa-tag"></i><span
                                        class="card-text"><?php echo $price; ?></span></h6>

                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
            }
        ?>
</div>
</div>


<div class="col-12">
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">পূর্ববর্তী</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">পরবর্তী</a>
            </li>
        </ul>
    </nav>
</div>
</div>
</div>







<?php include 'includes/footer.php'; ?>