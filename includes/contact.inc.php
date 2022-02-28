<?php include '../db/database.php';

session_start();


if (isset($_POST['contactAdmin'])) {

    $senderName  = $_POST['senderName'];
    $email       = $_POST['senderMail'];
    $sub         = $_POST['msgSubject'];
    $msg         = $_POST['msg'];

    if (empty($senderName) || empty($email) || empty($sub) || empty($msg)) {
        header("Location: ../contact.php?emptyfields");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../contact.php?InvalidEmail");
    } else {

        $senderName = mysqli_real_escape_string($conn, $senderName);
        $email      = mysqli_real_escape_string($conn, $email);
        $sub        = mysqli_real_escape_string($conn, $sub);
        $msg        = mysqli_real_escape_string($conn, $msg);

        $sql = "INSERT INTO contactadmin (senderName, senderMail, cont_sub, cont_msg, send_time)VALUES('$senderName', '$email', '$sub', '$msg', now())";

        $contact_admin = mysqli_query($conn, $sql);

        if (!$contact_admin) {
            header("Location: ../contact.php?error");
        } else {
            header("Location: ../contact.php?success");
        }
    }
}
