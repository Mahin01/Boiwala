<?php include "../db/database.php";

        session_start(); 

if (isset($_POST['login'])) {

        $email    = $_POST['mail'];
        $password = $_POST['pwd'];

        if (empty($email) || empty($password)) {
                header("Location: ../login.php?Emptyfields");
        }

        $email    = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $hashedPassword = sha1($password);

        $query = "SELECT * FROM user WHERE user_mail = '$email'";
        $login = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($login)) {
                $mail                    = $row['user_mail'];
                $pwd                     = $row['pwd'];
                $verified                = $row['verified'];
 
                if ($email != $mail) {
                        header("Location: ../login.php?Invalidemail");
                }

                else if ($hashedPassword != $pwd) {
                        header("Location: ../login.php?WrongPassword");

                } else if ($email != $mail  || $hashedPassword != $pwd) {
                        header("Location: ../login.php?WrongInput");

                } else if ($verified == 0) {
                        header("Location: ../login.php?error");
                } else {
                        header("Location: ../profile.php");
                        
                        $_SESSION['id']          = $row['uid'];
                        $_SESSION['fname']       = $row['fname'];
                        $_SESSION['lname']       = $row['lname'];
                        $_SESSION['username']    = $row['userName'];
                        $_SESSION['email']       = $row['user_mail'];
                        $_SESSION['phone']       = $row['phone_no'];
                        $_SESSION['address']     = $row['area'];
                        $_SESSION['Gender']      = $row['user_gender'];
                        $_SESSION['verified']    = $row['verified'];
                        $_SESSION['role']        = $row['role'];
                }
                
        }
}

?>

<?php

if (isset($_POST['memberLogin'])) {

$email = $_POST['email'];
$password = $_POST['pswd'];

if (empty($email) || empty($password)) {
header("Location: ../login.php?Emptyfields");
}

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$hashedPassword = sha1($password);

$query = "SELECT * FROM members WHERE email = '$email'";
$login = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($login)) {
$mail = $row['email'];
$pwd = $row['pwd'];
$verified = $row['paid_status'];

if ($email != $mail) {
header("Location: ../login.php?Invalidemail");
}

else if ($hashedPassword != $pwd) {
header("Location: ../login.php?WrongPassword");

} else if ($email != $mail || $hashedPassword != $pwd) {
header("Location: ../login.php?WrongInput");

} else if ($verified == 0) {
header("Location: ../login.php?error");
} else {
header("Location: ../profile.php");

$_SESSION['id'] = $row['member_id'];
$_SESSION['fname'] = $row['fname'];
$_SESSION['lname'] = $row['lname'];
$_SESSION['username'] = $row['username'];
$_SESSION['email'] = $row['email'];
$_SESSION['phone'] = $row['phone'];
$_SESSION['address'] = $row['area'];
$_SESSION['Gender'] = $row['gender'];
$_SESSION['verified'] = $row['paid_status'];
$_SESSION['role'] = $row['role'];
}

}
}

?>