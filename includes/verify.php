<?php include "../dbh.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification - Online Blood Bank Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/verify.css">
</head>
<body>

    <?php
        if(isset($_GET['vkey'])){
            //process Verification
            $vkey = $_GET['vkey'];

            $result = "SELECT * FROM user WHERE vkey = '$vkey' AND verified = 0";

            $validate = mysqli_query($conn, $result);
            
            $row = mysqli_fetch_assoc($validate);
            $mail = $row['user_mail'];

            if(!$validate){
                echo "<div class='container'>
                      <div class='row'>
                      <div class='col-md-6 offset-md-3'>
                      <div class='verify'>
                      <div class='alert alert-danger'>This account is invalid or already been verified</div>
                      </div>
                      </div>
                      </div>
                      </div>";
            }
            else{
                //validate email
                $update = "UPDATE user SET verified = 1 WHERE vkey = '$vkey'";
                $verify = mysqli_query($conn,$update);

                if(!$update){
                    echo mysqli_connect_error();
                }
                else{
                    echo "<div class='container'>
                          <div class='row'>
                          <div class='col-md-6 offset-md-3'>
                          <div style='text-align:justify; line-height:1.7em;' class='verify'>
                          <div class='alert alert-success p-5' style='font-style:italic; font-size:22px;'>Your E-mail Address <b>[$mail]</b> has been verified.Now you can log into your account,Update your info & start donating blood.To log into your account click <a href='../donors-login.php'>Here</a>.</div>
                          </div>
                          </div>
                          </div>
                          </div>";
                }
            }

        }
        else{
            die("Something Went Wrong! " .mysqli_connect_error());
        }
    ?>

<!-- Script Section -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>