<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="css/login.css">
<style>
    .card{
        height:280px;
    }
	.card-header h3{
		color:#fff;
	}
</style>
<?php
    $msg = "";
    // if(isset($_GET['InvalidEmail'])){
    //     $msg = "<div class='alert alert-danger'>Invalid E-mail Address.</div>";
    // }

    if(isset($_GET['error'])){
        $msg = "<div class='alert alert-danger'>Something Went Wrong.Please Try Again</div>";
    }

    if(isset($_GET['success'])){
        $msg = "<div class='alert alert-success'>An Email was sent to your E-mail address with password recovery link.</div>";
    }


		?>
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Recover Password</h3>
					</div>
					<div class="card-body">
						<form action="includes/forgot-password.inc.php" method="POST">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope"></i></span>
								</div>
								<input name="email" type="text" class="form-control" placeholder="Enter Your E-mail Adress">
								
							</div>
							
							<div class="form-group">
								<input name="recover" type="submit" value="Recover" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<?php echo $msg; ?>
				</div>
			</div>
		</div>
<?php include "includes/footer.php"; ?>