<?php 
include '../db/database.php';
ob_start();
session_start();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/signup.css">

<?php

    $msg = "";
    if(isset($_GET['Emptyfields'])){
      $msg = "<div class='alert alert-danger'>Pleasse! Fill out all the fields.</div>";
    }

    if(isset($_GET['Invalidemail'])){
        $msg = "<div class='alert alert-danger'>User Not Found!.</div>"; 
    }

    if(isset($_GET['WrongPassword'])){
        $msg = "<div class='alert alert-danger'>Wrong Password.</div>"; 
    }

    if(isset($_GET['WrongInput'])){
        $msg = "<div class='alert alert-danger'>Your E-mail or password is wrong.</div>"; 
    }
  
?>

<div class="container register mt-5">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money by reselling your books!</p>
                        <a class="btn" href="sign-up.php">Signup</a>
                      </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Admin</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Admin Login Area</h3>
                                <form action="" method="POST">
									<div class="row register-form">
										<div class="offset-md-2 col-md-8 offset-md-2">

                                        <div class="input-group form-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input name="mail" type="text" class="form-control" placeholder="E-mail Address *">
								
										</div>

                                        <div class="input-group form-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input name="pwd" type="password" class="form-control" placeholder="Password">
								
										</div>
                                              
                                        <input name="login" type="submit" class="btnRegister"  value="Login"/>
									<a style="color:#FF1A38" href="forgot-password.php">Forgot Password?</a>
                                    
                                </div>
                                <?php echo $msg; ?>
                          </form>
						</div>
					</div>
                </div>
            </div>
        </div>


        <?php 
                      if(isset($_POST['login'])){

                        $email = mysqli_real_escape_string($conn, $_POST['mail']);
                        $password = mysqli_real_escape_string($conn, $_POST['pwd']);

                        if(empty($email) || empty($password)){
                            header("Location: login.php?Emptyfields");
                    }
                        $hashedPassword = sha1($password);

                        $query = "SELECT * FROM admin WHERE admin_email = '$email'";
                        $adminlogin = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($adminlogin)){

                          $_SESSION['id']        = $row['admin_id'];
                          $_SESSION['username']  = $row['admin_name'];
                          $_SESSION['email']     = $row['admin_email'];
                          $_SESSION['role']      = $row['role'];
                          $pwd                   = $row['pwd'];
                          $_SESSION['avatar']    = $row['avatar'];


                          if($email != $_SESSION['email']){
                            header("Location: login.php?Invalidemail");
                    }

                            else if($hashedPassword != $pwd){
                                    header("Location: login.php?WrongPassword");
                            }

                            else if($email == $_SESSION['email'] && $hashedPassword == $pwd){
                                    header("Location: index.php");
                            }
                                
                        else{
                          header("Location: login.php?WrongInput");
                        }
                      }

                      }
                  ?>