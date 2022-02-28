<?php include 'includes/header.php' ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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

    if(isset($_GET['error'])){
        $msg = "<div class='alert alert-danger'>Your Account is Not Verified.PLease Verify Your Account In order to logged in!</div>"; 
    }
  
?>

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>স্বাগতম</h3>
            <p>আপনি আপনার বই পুনরায় বিক্রি করে আপনার নিজের অর্থ উপার্জন থেকে কয়েক মিনিট দূরে!</p>
            <a class="btn" href="sign-up.php">রেজিস্টার</a>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">ইউজার</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">মেম্বার</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">ইউজার হিসাবে লগইন করুন</h3>
                    <form action="includes/login.inc.php" method="POST">
                        <div class="row register-form">
                            <div class="offset-md-2 col-md-8 offset-md-2">

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input name="mail" type="text" class="form-control" placeholder="ইমেল ঠিকানা *">

                                </div>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input name="pwd" type="password" class="form-control" placeholder="পাসওয়ার্ড">

                                </div>

                                <input name="login" type="submit" class="btnRegister" value="লগইন" />
                                <a style="color:#FF1A38" href="forgot-password.php">পাসওয়ার্ড ভুলে গেছেন?</a>

                            </div>
                            <?php echo $msg; ?>
                    </form>
                </div>
            </div>

            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3 class="register-heading">মেম্বার হিসাবে লগইন করুন</h3>
                <form action="includes/login.inc.php" method="POST">
                    <div class="row register-form">
                        <div class="offset-md-2 col-md-8 offset-md-2">

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input name="email" type="text" class="form-control" placeholder="ইমেল ঠিকানা *">

                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="pswd" type="password" class="form-control" placeholder="পাসওয়ার্ড">

                            </div>

                            <input name="memberLogin" type="submit" class="btnRegister" value="লগইন" />
                            <a style="color:#FF1A38" href="forgot-password.php">পাসওয়ার্ড ভুলে গেছেন?</a>

                        </div>
                        <?php echo $msg; ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</div><?php include 'includes/footer.php' ?>