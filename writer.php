<?php include 'includes/header.php'; ?>

<style>
.banner {
    background: url(img/writer.PNG), no-repeat;
    background-size: cover;
    opacity: 0.9;
    height: 400px;
    position: relative;
    font-family: 'Ubuntu Condensed', sans-serif;

}

.main-banner .post-ad {
    margin-top: 30%;
}

.main-banner a {
    border-radius: 0;
    background: #FF1A38;
    font-size: 20px;
    color: #fff;
    width: 50%;
    box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.22);
    padding: 10px 20px;
}

.card-header img {
    width: 300px !important;
    height: 150px !important;
}

.card .card-body:nth-child(2) {
    height: 150px;
}

.card-body .card-title {
    color: #FF1A38;
}
</style>

<div class="main-banner banner text-center">
    <div class="container">
        <div class="post-ad">
        </div>
    </div>
</div>

<section id="resell">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-1">
                <li class="breadcrumb-item">কয়েকজন স্বনামধন্য লেখক</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM writer ORDER BY writer_id DESC LIMIT 9";
                        $indexView = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($indexView) ){
                            $writer_id       = $row['writer_id'];
                            $writer_name     = $row['writer_name'];
                            $writer_details  = $row['writer_details'];
                            $cover           = $row['writer_pic'];
                            
                    ?>

                        <div class="col-md-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <?php
                                    if(!empty($cover)){
                                        ?>
                                    <a href="writer-details.php?writer=<?php echo $writer_id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" height="40px" width="100px"
                                            src="img/writer/<?php echo $cover; ?>"></a>
                                    <?php
                                    }  
                                    else{
                                        ?>
                                    <a href="writer-details.php?writer=<?php echo $writer_id; ?>" target="_blank"
                                        rel="noopener noreferrer"><img class="img-fluid" src="img/avatar1.jpg"></a>
                                    <?php
                                    }
                                ?>
                                </div>

                                <div class="card-body">
                                    <a href="writer-details.php?writer=<?php echo $writer_id; ?>">
                                        <h5 class="card-title text-uppercase"><?php echo $writer_name; ?></h5>
                                    </a>
                                    <p><?php echo substr($writer_details, 0, 100); ?> <a
                                            href="writer-details.php?writer=<?php echo $writer_id; ?>"><b>আরো
                                                পড়ুন..</b></a>
                                    </p>
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
<?php include 'includes/footer.php'; ?>