<?php include "database.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification - Online Blood Bank Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/verify.css">
</head>
<body>

    <?php
        if(isset($_GET['confirm'])){
            //process Verification
            $ckey = $_GET['confirm'];

            $result = "SELECT ckey,email FROM bloodRequest WHERE ckey = '$ckey'";

            $validate = mysqli_query($conn, $result);

            if(!$validate){
                echo "<div class='container'>
                      <div class='row'>
                      <div class='col-md-6 offset-md-3'>
                      <div class='verify'>
                      <div class='alert alert-danger'>Invalid Request Or Something Went Wrong!.</div>
                      </div>
                      </div>
                      </div>
                      </div>";
            }

            else{
                
                $row = mysqli_fetch_assoc($validate);
                $email = $row['email'];
                //validate email
                $update = "UPDATE donors SET confirm_status = 1 WHERE Email='$email'";
                $verify = mysqli_query($conn,$update);

                if(!$update){
                    echo mysqli_connect_error();
                }
                else{


                    echo "<div class='container'>
                          <div class='row'>
                          <div class='col-md-6 offset-md-3'>
                          <div class='verify'>
                          <div class='alert alert-success p-5'>Donation Confirmed!.To Check your donation history log on to your account.To log on to your account<a href='../donors-login.php'> Click Here.</a></div>
                          </div>
                          </div>
                          </div>
                          </div>";
                }
            }

        }

        else{
            die("Something Went Wrong! ".mysqli_connect_error());
        }
?>

<!-- Script Section -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>