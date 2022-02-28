<?php include "../db/database.php"; 

session_start();

            if(isset($_POST['member-signup'])){

                $firstname     = $_POST['fname'];
                $lastname      = $_POST['lname'];
                $userName      = $_POST['username'];
                $email         = $_POST['mail'];
                $phone         = $_POST['phone'];
                $gender        = $_POST['gender'];
                $user_address  = $_POST['area'];
                $Password      = $_POST['pwd'];
                
                $sql = "SELECT * FROM members WHERE username = '$userName' AND email = '$email' LIMIT 1";
                $user = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($user);
                    $name   = $row['username'];
                    $mail   = $row['email'];
                    $mobile = $row['phone'];
                
                if(empty($firstname)||empty($lastname)||empty($userName) || empty($email) || empty($phone) || empty($gender) || empty($user_address) || empty($Password)){
                    header("Location: ../sign-up.php?emptyfields");
                }

                else if(!preg_match('/^\w{6,}$/', $userName)){
                    header("Location: ../sign-up.php?InvalidUserName");
                 }

                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../sign-up.php?InvalidEmail"); 
                }

                else if($userName == $name || $email == $mail) {
                    header("Location: ../sign-up.php?UserAlreadyExists"); 
                }

                else if(!preg_match('/^[0-9]{11}$/', $phone)){
                    header("Location: ../sign-up.php?InvalidNumber"); 
                }

                else if($phone == $mobile){
                    header("Location: ../sign-up.php?NumberExist");  
                }

                 else if(!preg_match("/^[a-zA-Z0-9][0-9a-zA-Z_!$@#^&]{6,20}$/", $Password)){
                     header("Location: ../sign-up.php?invalidpwd"); 
                 }

                else{

                $firstname = mysqli_real_escape_string($conn, $firstname);
                $lastname  = mysqli_real_escape_string($conn, $lastname);
                $userName = mysqli_real_escape_string($conn, $userName);
                $email = mysqli_real_escape_string($conn, $email);
                $phone = mysqli_real_escape_string($conn, $phone);
                $gender = mysqli_real_escape_string($conn, $gender);
                $user_address = mysqli_real_escape_string($conn, $user_address);
                $Password = mysqli_real_escape_string($conn, $Password);
                //Encrypted Password
                $hashedPwd = sha1($Password);

                //Random Verification key
                $vkey = md5(time().$userName);

                //Inserting information to the database
                $query = "INSERT INTO members (fname, lname, username, email, phone,pwd, area, gender) VALUES('$firstname', '$lastname', '$userName', '$email', '$phone', '$hashedPwd', '$user_address', '$gender')";

                $create_user = mysqli_query($conn, $query);

                if($create_user){
                    
                    //Send E-mail
                    $to      = $email;
                    $subject = "Account Verification";
                    $msg     = "<h2 style='color:#333'>Hi! $userName </h2>
                                <br><br><div style='font-size:18px;'><p>Welcome To BoiWala.We Just need to make sure this e-mail address is yours.</p>
                                <p>To Verify Your user Account please <a href='http://localhost/BookResell/includes/verify.php?vkey=$vkey'>Click Here</a>.</p><br>
                                Doesn't Work? Simply copy this link & paste in your web browser
                                <p>http://localhost/BookResell/includes/verify.php?vkey=$vkey</p>  
                                <br><br>
                                <p>Cheers,</p>
                                <h3>Team BoiWala</h3>
                                </div>
                                ";
                    $headers = "From: BoiWala \r\n";
                    $headers .= "MIME-Version: 1.0". "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    mail($to,$subject,$msg,$headers);

                    header("Location: ../payment-confirmation.php");
                }
                
                else{
                   die("Query Failed: " . mysqli_connect_error());
                }
            }
        }

?>