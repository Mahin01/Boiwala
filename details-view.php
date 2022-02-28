<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/details-view.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <?php 
              if(isset($_GET['resell'])){

                $details = $_GET['resell'];
                
                $detailsView = "SELECT * FROM resell WHERE ID = $details";
                $showDetailsView = mysqli_query($conn, $detailsView);

                while($row = mysqli_fetch_assoc($showDetailsView)){
                  
                              $resell_id    = $row['ID'];
                              $reseller_username = $row['reseller_userName'];
                              $reseller_phone    = $row['reseller_phone'];
                              $reseller_area     = $row['reseller_area'];
                              $book_name    = $row['book_title'];
                              $author_name  = $row['authorName'];
                              $book_desc    = $row['book_desc'];
                              $area         = $row['reseller_area'];
                              $price        = $row['price'];
                              $cover1       = $row['book_img1'];
                              $cover2       = $row['book_img2'];
                              $cover3       = $row['book_img3'];


              
          ?>

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="img/resell/<?php echo $cover1; ?>" /></div>
                        <div class="tab-pane" id="pic-2"><img src="img/resell/<?php echo $cover2; ?>" /></div>
                        <div class="tab-pane" id="pic-3"><img src="img/resell/<?php echo $cover3; ?>" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                    src="img/resell/<?php echo $cover1; ?>" /></a></li>
                        <li><a data-target="#pic-2" data-toggle="tab"><img
                                    src="img/resell/<?php echo $cover2; ?>" /></a></li>
                        <li><a data-target="#pic-3" data-toggle="tab"><img
                                    src="img/resell/<?php echo $cover3; ?>" /></a></li>
                    </ul>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $book_name; ?></h3>
                    <h5 class="price"><span><?php echo $author_name; ?></span></h5>
                    <h4 class="price">মূল্য: <span>Tk. <?php echo $price; ?></span></h4>
                    <h4 class="price">পোস্ট করেছেন: <span><?php echo $reseller_username; ?></span></h4>
                    <?php 
               $sql = "SELECT * FROM area WHERE area_id = $reseller_area";
               $fetch_area = mysqli_query($conn, $sql);

               while ($row = mysqli_fetch_assoc($fetch_area)) {
                   $area_id   = $row['area_id'];
                   $area_name = $row['area_name'];
            ?>
                    <h4 class="price">বিক্রেতার এলাকা: <span><?php echo $area_name; ?></span></h4>
                    <?php 
               }
            ?>
                    <p class="product-description"><?php echo $book_desc; ?></p>

                    <div class="action">
                        <button id="contact" onclick="showNum()" class="contact btn btn-primary"
                            type="button">Contact</button>
                    </div>

                    <div class="action" id="action" style="display: none;">
                        <h4><span>Contact: </span><?php echo $reseller_phone; ?></h4>
                    </div>

                    <?php 
                }
              }

              if(isset($_GET['access'])){
                $accessories_id = $_GET['access'];

                $sql = "SELECT * FROM accessories WHERE ID = $accessories_id";
                $indexView = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($indexView) ){
                    $id             = $row['ID'];
                    $access_name    = $row['access_title'];
                    $access_details = $row['access_details'];
                    $donor_name     = $row['donor_Name'];
                    $donor_phone    = $row['donor_phone'];
                    $donor_area     = $row['donor_area'];
                    $price          = $row['price'];
                    $cover          = $row['accessories_pic'];
                    
            ?>
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="img/Accessories/<?php echo $cover; ?>" />
                        </div>
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $access_name; ?></h3>
                    <h5 class="price"><span><?php echo $price; ?>!!</span></h5>
                    <h5 class="price">Donated-By: <span><?php echo $donor_name; ?></span></h5>
                    <?php 
               $sql = "SELECT * FROM area WHERE area_id = $donor_area";
               $fetch_area = mysqli_query($conn, $sql);

               while ($row = mysqli_fetch_assoc($fetch_area)) {
                   $area_id   = $row['area_id'];
                   $area_name = $row['area_name'];
            ?>
                    <h5 class="price">Donor Area: <span><?php echo $area_name; ?></span></h4>
                        <?php 
               }
            ?>
                        <p class="product-description"><?php echo $access_details; ?></p>

                        <div class="action">
                            <button id="contact" onclick="showNum()" class="contact btn btn-primary"
                                type="button">Contact</button>
                        </div>

                        <div class="action" id="action" style="display: none;">
                            <h4><span>Contact: </span><?php echo $donor_phone; ?></h4>
                        </div>
                        <?php
              }
            }

            if(isset($_GET['giftbooks'])){
              $giftBooks = $_GET['giftbooks'];

              $sql = "SELECT * FROM gift WHERE ID = $giftBooks";
              $indexView = mysqli_query($conn, $sql);

              while($row = mysqli_fetch_assoc($indexView) ){
                      $gift_id      = $row['ID'];
                      $donor_name   = $row['item_posted_by'];
                      $book_name    = $row['book_title'];
                      $book_desc    = $row['book_desc'];
                      $author_name  = $row['authorName'];
                      $donor_area   = $row['donor_area'];
                      $donor_phone  = $row['donor_phone'];
                      $price        = $row['price'];
                      $cover        = $row['book_img'];
                  
          ?>

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="img/Accessories/<?php echo $cover; ?>" />
                            </div>
                        </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $book_name; ?></h3>
                    <h5 class="price">লেখক: <span><?php echo $author_name; ?>!!</span></h5>
                    <h5 class="price"><span><?php echo $price; ?>!!</span></h5>
                    <h5 class="price">Donated-By: <span><?php echo $donor_name; ?></span></h5>
                    <?php 
               $sql = "SELECT * FROM area WHERE area_id = $donor_area";
               $fetch_area = mysqli_query($conn, $sql);

               while ($row = mysqli_fetch_assoc($fetch_area)) {
                   $area_id   = $row['area_id'];
                   $area_name = $row['area_name'];
            ?>
                    <h5 class="price">Donor Area: <span><?php echo $area_name; ?></span></h4>
                        <?php 
               }
            ?>
                        <p class="product-description"><?php echo $book_desc; ?></p>

                        <div class="action">
                            <button id="contact" onclick="showNum()" class="contact btn btn-primary"
                                type="button">Contact</button>
                        </div>

                        <div class="action" id="action" style="display: none;">
                            <h4><span>Contact: </span><?php echo $donor_phone; ?></h4>
                        </div>


                        <?php
          }
            }

            if(isset($_GET['Exchange'])){
              $exchangeBooks = $_GET['Exchange'];

              $sql = "SELECT * FROM book_exchange WHERE ID =$exchangeBooks";
                                  $searchByExchange = mysqli_query($conn, $sql);

                      while($row = mysqli_fetch_assoc($searchByExchange)){
                          $exchange_id    = $row['ID'];
                          $exchange_name  = $row['exchanger_Name'];
                          $exchange_phone = $row['exchanger_phone'];
                          $book_name    = $row['book_title'];
                          $author_name  = $row['authorName'];
                          $exchanger_area = $row['exchanger_area'];
                          $book_desc      = $row['book_desc'];
                          $price          = $row['Tag'];
                          $cover1         = $row['book_img1'];
                          $cover2         = $row['book_img2'];
                          $cover3         = $row['book_img3'];


                        ?>

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="img/exchange/<?php echo $cover1; ?>" />
                            </div>
                            <div class="tab-pane" id="pic-2"><img src="img/exchange/<?php echo $cover2; ?>" /></div>
                            <div class="tab-pane" id="pic-3"><img src="img/exchange/<?php echo $cover3; ?>" /></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                        src="img/exchange/<?php echo $cover1; ?>" /></a></li>
                            <li><a data-target="#pic-2" data-toggle="tab"><img
                                        src="img/exchange/<?php echo $cover2; ?>" /></a></li>
                            <li><a data-target="#pic-3" data-toggle="tab"><img
                                        src="img/exchange/<?php echo $cover3; ?>" /></a></li>
                        </ul>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $book_name; ?></h3>
                    <h5 class="price"><span><?php echo $author_name; ?></span></h5>
                    <h4 class="price"><span><?php echo $price; ?></span></h4>
                    <h4 class="price">Posted By: <span><?php echo $exchange_name; ?></span></h4>
                    <?php 
               $sql = "SELECT * FROM area WHERE area_id = $exchanger_area";
               $fetch_area = mysqli_query($conn, $sql);

               while ($row = mysqli_fetch_assoc($fetch_area)) {
                   $area_id   = $row['area_id'];
                   $area_name = $row['area_name'];
            ?>
                    <h4 class="price">Area: <span><?php echo $area_name; ?></span></h4>
                    <?php 
               }
            ?>
                    <p class="product-description"><?php echo $book_desc; ?></p>

                    <div class="action">
                        <button id="contact" onclick="showNum()" class="contact btn btn-primary"
                            type="button">Contact</button>
                    </div>

                    <div class="action" id="action" style="display: none;">
                        <h4><span>Contact: </span><?php echo $exchange_phone; ?></h4>
                    </div>
                    <?php
            }
          }
?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function showNum() {
    var x = document.getElementById("action");
    var y = document.getElementById("contact");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        y.style.display = "block";
    }
}
</script>

<?php include 'includes/footer.php'; ?>