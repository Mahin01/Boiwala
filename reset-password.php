<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="css/login.css">
<style>
    .card{
        height:330px;
    }
    .card-header h3{
        color:#fff;
    }
</style>
<?php

            $msg = "";

                if(isset($_GET['InvalidPassword'])){
                    $msg = "<div class='alert alert-danger'>Invalid Password!.Password must be 8 characters long.Only characters,numbers & special characters are allowed</div>";
                }

                if(isset($_GET['success'])){
                    $msg = "<div class='alert alert-success'>Your password has been updated. Now You can <a href='login.php'>login here</a></div>";
                }

                if(isset($_GET['PasswordNotMatched'])){
                    $msg = "<div class='alert alert-danger'>Password Not Matched.</div>";
                }
?>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Recover Password</h3>
			</div>
			<div class="card-body">
				<form action="includes/reset-password.inc.php" method="POST">
                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="pwd1" type="password" class="form-control" placeholder="Password">
						
					</div>

                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="pwd2" type="password" class="form-control" placeholder="Repeat Password">
						
					</div>
					
					<div class="form-group">
						<input name="reset" type="submit" value="Recover" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<?php echo $msg; ?>
		</div>
	</div>
</div>

<?php include "includes/footer.php"; ?>