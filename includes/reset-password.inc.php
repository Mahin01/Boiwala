<?php include '../db/database.php'; ?>

<?php

    if(isset($_POST['reset'])){
        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];

        if($pwd1 != $pwd2){
            header("Location: ../reset-password.php?PasswordNotMatched");
        }

        else{
            $password = sha1($pwd1);

            $sql = "UPDATE user SET pwd = '$password'";
            $updatePwd = mysqli_query($conn, $sql);

            if($updatePwd){
                header("Location: ../reset-password.php?success"); 
            }

            else{
                echo mysqli_connect_error();
            }

        }
    }

?>