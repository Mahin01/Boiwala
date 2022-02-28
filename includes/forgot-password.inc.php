<?php include "../db/database.php"; 

if (isset($_POST['recover'])) {
    $mail = $_POST['email'];
    $email = mysqli_real_escape_string($conn, $mail);
    $token = md5(time() . $email);

    $query = "INSERT INTO pwdreset (email,token) VALUES ('$email', '$token')";
    $pwdreset = mysqli_query($conn, $query);

    if ($pwdreset) {
        //send e-mail
        $to      = $email;
        $subject = "Password Reset Link";
        $msg     = "<h2 style='color:#333;'>Hi!</h2>
                            <br><br>
                            <div style='font-size:18px'>
                            <p>We just received a password reset request from you.</p> 
                            <p>To Reset Your Password<a href='http://localhost/BoiWala/reset-password.php?token=$token'>Click Here</a></p>
                            <p>Or Simply copy this link to your web browser</p>
                            <p>http://localhost/BoiWala/reset-password.php?token=$token</p>
                            </div>
                            <br><br>
                            <p>Cheers,</p>
                            <h3>Team BoiWala</h3>
                            ";
        $headers = "From: BoiWala \r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $msg, $headers);

        header("Location: ../forgot-password.php?success");
    } else {
        header("Location: ../forgot-password.php?error");
    }
}
