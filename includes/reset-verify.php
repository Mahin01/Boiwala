<?php include '../db/database.php'; ?>
<?php
        if(isset($_GET['token'])){
            //process token
            $token = $_GET['token'];

            $query = "SELECT token FROM pwdreset WHERE token ='$token'";
            $tokenValidation = mysqli_query($conn, $query);

            if($tokenValidation){
                header("Location: reset-password.php");
            }
            else{
                echo mysqli_connect_error();
            }
        }
?>