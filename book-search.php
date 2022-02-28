<?php include "includes/header.php"; ?>
<?php 
    $msg= "";

    if(isset($_POST['searchBoiwala'])){

        $search = $_POST['search'];

    $sql = "SELECT * FROM resell WHERE book_title LIKE '%$search%' ";
    $fetchResult = mysqli_query($conn, $sql);

    if($fetchResult){

        ?>

<section id="resell">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-1">
                <li class="breadcrumb-item">ফলাফল খুজুন</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
        while($row = mysqli_fetch_assoc($fetchResult)){
            $id   = $row['ID'];
            $item_name = $row['book_title'];
            $price     = $row['price'];
            $cover     = $row['book_img1'];
        ?>

                        <div class="col-md-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <?php
                                    if(!empty($cover)){
                                        ?>
                                    <a href="details-view.php?resell=<?php echo $id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" height="100px" width="200px"
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
                                        <h5 class="card-title text-uppercase"><?php echo $item_name; ?></h5>
                                    </a>
                                    <h6>মূল্য:<span class="card-text"><?php echo $price; ?>Tk!!!</span></h5>
                                </div>
                            </div>
                            <?php
        }
    }
}

?>

                        </div>
                    </div>
</section>


<?php include "includes/footer.php"; ?>