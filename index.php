<?php include "includes/header.php"; ?>
<?php include 'includes/banner.inc.php'; ?>
<link rel="stylesheet" href="css/home.css">


<section id="resell">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-1">
                <li class="breadcrumb-item">টপ এড-শুধুমাত্র সদস্যের জন্য</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM resell WHERE role='member' ORDER BY ID DESC LIMIT 3";
                        $indexView = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($indexView) ){
                            $id           = $row['ID'];
                            $book_name    = $row['book_title'];
                            $author_name  = $row['authorName'];
                            $price        = $row['price'];
                            $cover        = $row['book_img1'];
                            
                    ?>

                        <div class="col-md-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <?php
                                    if(!empty($cover)){
                                        ?>
                                    <a href="details-view.php?resell=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" height="50px" width="100px"
                                            src="img/resell/<?php echo $cover; ?>"></a>
                                    <?php
                                    }  
                                    else{
                                        ?>
                                    <a href="details-view.php?resell=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" src="img/book.jpg"></a>
                                    <?php
                                    }
                                ?>
                                </div>

                                <div class="card-body text-center">
                                    <a href="details-view.php?resell=<?php echo $id; ?>">
                                        <h5 class="card-title text-uppercase"><?php echo $book_name; ?></h5>
                                    </a>
                                    <h6>লেখকের নাম:<span class="card-text"><?php echo $author_name; ?></span></h5>
                                        <h6>মূল্য: <span class="card-text"><?php echo $price; ?></span></h5>
                                </div>
                            </div>
                        </div>
                        <?php
}
?>
                    </div>
                </div>
                <a href="resell.php" class="ml-3 btn btn-danger btn-flat btn-small">আরো দেখুন..</a>
            </div>
        </div>
</section>

<section id="resell">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-1">
                <li class="breadcrumb-item">পুনঃবিক্রয়ের জন্য নতুন তালিকাভুক্ত বই</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM resell ORDER BY ID DESC LIMIT 3";
                        $indexView = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($indexView) ){
                            $id           = $row['ID'];
                            $book_name    = $row['book_title'];
                            $author_name  = $row['authorName'];
                            $price        = $row['price'];
                            $cover        = $row['book_img1'];
                            
                    ?>

                        <div class="col-md-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <?php
                                    if(!empty($cover)){
                                        ?>
                                    <a href="details-view.php?resell=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" height="50px" width="100px"
                                            src="img/resell/<?php echo $cover; ?>"></a>
                                    <?php
                                    }  
                                    else{
                                        ?>
                                    <a href="details-view.php?resell=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" src="img/book.jpg"></a>
                                    <?php
                                    }
                                ?>
                                </div>

                                <div class="card-body text-center">
                                    <a href="details-view.php?resell=<?php echo $id; ?>">
                                        <h5 class="card-title text-uppercase"><?php echo $book_name; ?></h5>
                                    </a>
                                    <h6>লেখকের নাম:<span class="card-text"><?php echo $author_name; ?></span></h5>
                                        <h6>মূল্য: <span class="card-text"><?php echo $price; ?></span></h5>
                                </div>
                            </div>
                        </div>
                        <?php
}
?>
                    </div>
                </div>
                <a href="resell.php" class="ml-3 btn btn-danger btn-flat btn-small">আরো দেখুন..</a>
            </div>
        </div>
</section>

<section id="resell">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-1">
                <li class="breadcrumb-item">এক্সচেঞ্জের জন্য নতুন তালিকাভুক্ত বই</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM book_exchange ORDER BY ID DESC LIMIT 3";
                        $indexView = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($indexView) ){
                            $id           = $row['ID'];
                            $book_name    = $row['book_title'];
                            $author_name  = $row['authorName'];
                            $price        = $row['Tag'];
                            $cover        = $row['book_img1'];
                            
                    ?>

                        <div class="col-md-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <?php
                                    if(!empty($cover)){
                                        ?>
                                    <a href="details-view.php?Exchange=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" height="50px" width="100px"
                                            src="img/exchange/<?php echo $cover; ?>"></a>
                                    <?php
                                    }  
                                    else{
                                        ?>
                                    <a href="details-view.php?Exchange=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" src="img/book.jpg"></a>
                                    <?php
                                    }
                                ?>
                                </div>

                                <div class="card-body text-center">
                                    <a href="details-view.php?Exchange=<?php echo $id; ?>">
                                        <h5 class="card-title text-uppercase"><?php echo $book_name; ?></h5>
                                    </a>
                                    <h6>লেখকের নাম: <span class="card-text"><?php echo $author_name; ?></span></h5>
                                        <h6><span class="card-text"><?php echo $price; ?></span></h5>
                                </div>
                            </div>
                        </div>
                        <?php
}
?>

                    </div>
                </div>
                <a href="exchange-books.php" class="ml-3 btn btn-danger btn-flat btn-small">আরো দেখুন..</a>

            </div>
        </div>
</section>

<section id="resell">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-1">
                <li class="breadcrumb-item">উপহারের জন্য নতুন তালিকাভুক্ত এক্সেসরিজ</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM accessories ORDER BY ID DESC LIMIT 3";
                        $indexView = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($indexView) ){
                            $id                 = $row['ID'];
                            $accessories_name   = $row['access_title'];
                            $price              = $row['price'];
                            $cover              = $row['accessories_pic'];
                            
                    ?>

                        <div class="col-md-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <?php
                                    if(!empty($cover)){
                                        ?>
                                    <a href="details-view.php?access=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" height="100px" width="200px"
                                            src="img/Accessories/<?php echo $cover; ?>"></a>
                                    <?php
                                    }  
                                    else{
                                        ?>
                                    <a href="details-view.php?access=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" src="img/book.jpg"></a>
                                    <?php
                                    }
                                ?>
                                </div>

                                <div class="card-body text-center">
                                    <a href="details-view.php?access=<?php echo $id; ?>">
                                        <h5 class="card-title text-uppercase"><?php echo $accessories_name; ?></h5>
                                    </a>
                                    <h6><span class="card-text"><?php echo $price; ?>!!!</span></h5>
                                </div>
                            </div>
                        </div>
                        <?php
}
?>


                    </div>
                </div>
                <a href="accessories.php" class="ml-3 btn btn-danger btn-flat btn-small">আরো দেখুন..</a>

            </div>
        </div>
</section>

<script src="admin/js/sb-admin-2.min.js"></script>
<?php include "includes/footer.php"; ?>