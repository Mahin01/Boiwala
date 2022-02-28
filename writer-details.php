<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/writer-details.css">

<?php 

    if(isset($_GET['writer'])){
        $writerDetails = $_GET['writer'];

?>
<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
<?php
                        $sql = "SELECT * FROM writer WHERE writer_id = $writerDetails";
                        $indexView = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($indexView) ){
                            $writer_id       = $row['writer_id'];
                            $writer_name     = $row['writer_name'];
                            $writer_details  = $row['writer_details'];
                            $cover           = $row['writer_pic'];
                            
                    ?>

<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="img/writer/<?php echo $cover; ?>" /></div>
						  
						</div>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $writer_name; ?></h3>

						<p class="product-description"><?php echo $writer_details; ?></p>
						
					</div>
				</div>
			</div>
		</div>
	</div>


<?php

}
    }

?>
<?php include 'includes/footer.php'; ?>