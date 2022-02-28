<?php include "../db/database.php";

session_start();

if (isset($_POST['resell'])) {

    $reseller_name    = $_POST['userName'];
    $reseller_email   = $_POST['email'];
    $reseller_phone   = $_POST['phone'];
    $reseller_area    = $_POST['area'];
    $book_title       = $_POST['book_title'];
    $book_description = $_POST['book_desc'];
    $author_name      = $_POST['author'];
    $category         = $_POST['category'];
    $role             = $_POST['role'];
    $price            = $_POST['price'];

    //book image 1
    $bookcover1      = $_FILES['img1'];
    $bookcover1Name  = $_FILES['img1']['name'];
    $bookcover1Size  = $_FILES['img1']['size'];
    $bookcover1TmpName = $_FILES['img1']['tmp_name'];

    $userAllowedExtension = array("jpg", "jpeg", "png");

    //book image 2
    $bookcover2      = $_FILES['img2'];
    $bookcover2Name  = $_FILES['img2']['name'];
    $bookcover2Size  = $_FILES['img2']['size'];
    $bookcover2TmpName = $_FILES['img2']['tmp_name'];

    $userAllowedExtension = array("jpg", "jpeg", "png");

    //book image 3
    $bookcover3      = $_FILES['img3'];
    $bookcover3Name  = $_FILES['img3']['name'];
    $bookcover3Size  = $_FILES['img3']['size'];
    $bookcover3TmpName = $_FILES['img3']['tmp_name'];

    $userAllowedExtension = array("jpg", "jpeg", "png");

    $reseller_name    = mysqli_real_escape_string($conn, $reseller_name);
    $reseller_email   = mysqli_real_escape_string($conn, $reseller_email);
    $reseller_phone   = mysqli_real_escape_string($conn, $reseller_phone);
    $reseller_area    = mysqli_real_escape_string($conn, $reseller_area);
    $book_title       = mysqli_real_escape_string($conn, $book_title);
    $book_description = mysqli_real_escape_string($conn, $book_description);
    $author_name      = mysqli_real_escape_string($conn, $author_name);
    $category         = mysqli_real_escape_string($conn, $category);
    $price            = mysqli_real_escape_string($conn, $price);


    //Inserting information to the database
    if (!empty($bookcover1Name) || !empty($bookcover2Name) || ($bookcover3Name)) {

        $book_img1 = rand(0, 100000) . '_' . $bookcover1Name;
        move_uploaded_file($bookcover1TmpName, "../img/resell/$book_img1");

        $book_img2 = rand(0, 100000) . '_' . $bookcover2Name;
        move_uploaded_file($bookcover2TmpName, "../img/resell/$book_img2");

        $book_img3 = rand(0, 100000) . '_' . $bookcover3Name;
        move_uploaded_file($bookcover1TmpName, "../img/resell/$book_img3");

        $query = "INSERT INTO resell (reseller_userName, reseller_mail, reseller_phone, reseller_area, book_title, authorName, category, book_desc, book_img1, book_img2, book_img3, price, role) VALUES('$reseller_name', '$reseller_email', '$reseller_phone', '$reseller_area', '$book_title', '$author_name', '$category', '$book_description', '$book_img1', '$book_img2', '$book_img3', '$price', '$role')";

        $create_resell_post = mysqli_query($conn, $query);

        if (!$create_resell_post) {
            die("Query Failed: " . mysqli_connect_error());
        } else {
            header("Location: ../resell.php");
        }
    }
}

if (isset($_POST['accessories'])) {

    $donor_name    = $_POST['userName'];
    $donor_email   = $_POST['email'];
    $donor_phone   = $_POST['phone'];
    $donor_area    = $_POST['area'];
    $access_title  = $_POST['access_title'];
    $access_desc   = $_POST['access_desc'];
    $category      = $_POST['category'];

    //book image 1
    $bookcover      = $_FILES['access_img'];
    $bookcoverName  = $_FILES['access_img']['name'];
    $bookcoverSize  = $_FILES['access_img']['size'];
    $bookcoverTmpName = $_FILES['access_img']['tmp_name'];

    $userAllowedExtension = array("jpg", "jpeg", "png");


    $donor_name    = mysqli_real_escape_string($conn, $donor_name);
    $donor_email   = mysqli_real_escape_string($conn, $donor_email);
    $donor_phone   = mysqli_real_escape_string($conn, $donor_phone);
    $donor_area    = mysqli_real_escape_string($conn, $donor_area);
    $access_title  = mysqli_real_escape_string($conn, $access_title);
    $access_desc = mysqli_real_escape_string($conn, $access_desc);
    $category         = mysqli_real_escape_string($conn, $category);


    //Inserting information to the database
    if (!empty($bookcoverName)) {

        $access_img = rand(0, 100000) . '_' . $bookcoverName;
        move_uploaded_file($bookcoverTmpName, "../img/Accessories/$access_img");

        $query = "INSERT INTO accessories (donor_Name, donor_mail, donor_phone, donor_area, access_title, access_details, category, price, accessories_pic)VALUES('$donor_name', '$donor_email', '$donor_phone', '$donor_area', '$access_title', '$access_desc', '$category', '$price', '$access_img')";

        $create_resell_post = mysqli_query($conn, $query);

        if (!$create_resell_post) {
            die("Query Failed: " . mysqli_connect_error());
        } else {
            header("Location: ../accessories.php");
        }
    }
}

if (isset($_POST['exchange'])) {

    $exchanger_name    = $_POST['username'];
    $exchanger_email   = $_POST['email'];
    $exchanger_phone   = $_POST['phone'];
    $exchanger_area    = $_POST['area'];
    $book_title       = $_POST['book_title'];
    $book_description = $_POST['book_desc'];
    $author_name      = $_POST['author'];
    $category         = $_POST['category'];

    //book image 1
    $bookcover1      = $_FILES['img1'];
    $bookcover1Name  = $_FILES['img1']['name'];
    $bookcover1Size  = $_FILES['img1']['size'];
    $bookcover1TmpName = $_FILES['img1']['tmp_name'];

    $userAllowedExtension = array("jpg", "jpeg", "png");

    //book image 2
    $bookcover2      = $_FILES['img2'];
    $bookcover2Name  = $_FILES['img2']['name'];
    $bookcover2Size  = $_FILES['img2']['size'];
    $bookcover2TmpName = $_FILES['img2']['tmp_name'];

    $userAllowedExtension = array("jpg", "jpeg", "png");

    //book image 3
    $bookcover3      = $_FILES['img3'];
    $bookcover3Name  = $_FILES['img3']['name'];
    $bookcover3Size  = $_FILES['img3']['size'];
    $bookcover3TmpName = $_FILES['img3']['tmp_name'];

    $userAllowedExtension = array("jpg", "jpeg", "png");

    $exchanger_name    = mysqli_real_escape_string($conn, $exchanger_name);
    $exchanger_email   = mysqli_real_escape_string($conn, $exchanger_email);
    $exchanger_phone   = mysqli_real_escape_string($conn, $exchanger_phone);
    $exchanger_area    = mysqli_real_escape_string($conn, $exchanger_area);
    $book_title       = mysqli_real_escape_string($conn, $book_title);
    $book_description = mysqli_real_escape_string($conn, $book_description);
    $author_name      = mysqli_real_escape_string($conn, $author_name);
    $category         = mysqli_real_escape_string($conn, $category);


    //Inserting information to the database
    if (!empty($bookcover1Name) || !empty($bookcover2Name) || ($bookcover3Name)) {

        $book_img1 = rand(0, 100000) . '_' . $bookcover1Name;
        move_uploaded_file($bookcover1TmpName, "../img/exchange/$book_img1");

        $book_img2 = rand(0, 100000) . '_' . $bookcover2Name;
        move_uploaded_file($bookcover2TmpName, "../img/exchange/$book_img2");

        $book_img3 = rand(0, 100000) . '_' . $bookcover3Name;
        move_uploaded_file($bookcover1TmpName, "../img/exchange/$book_img3");

        $query = "INSERT INTO book_exchange (exchanger_Name, exchanger_mail, exchanger_phone, exchanger_area, book_title, book_desc, authorName, category, book_img1, book_img2, book_img3) VALUES('$exchanger_name', '$exchanger_email', '$exchanger_phone', '$exchanger_area', '$book_title','$book_description', '$author_name', '$category', '$book_img1', '$book_img2', '$book_img3')";

        $create_resell_post = mysqli_query($conn, $query);

        if (!$create_resell_post) {
            die("Query Failed: " . mysqli_connect_error());
        } else {
            header("Location: ../exchange-books.php");
        }
    }
}



if (isset($_POST['gift'])) {

    $donor_name    = $_POST['username'];
    $donor_email   = $_POST['email'];
    $donor_phone   = $_POST['phone'];
    $donor_area    = $_POST['area'];
    $book_title    = $_POST['book_title'];
    $author        = $_POST['author'];
    $book_desc     = $_POST['book_desc'];
    $category      = $_POST['category'];

    //book image 1
    $bookcover      = $_FILES['gift_img'];
    $bookcoverName  = $_FILES['gift_img']['name'];
    $bookcoverSize  = $_FILES['gift_img']['size'];
    $bookcoverTmpName = $_FILES['gift_img']['tmp_name'];

    $userAllowedExtension = array("jpg", "jpeg", "png");


    $donor_name    = mysqli_real_escape_string($conn, $donor_name);
    $donor_email   = mysqli_real_escape_string($conn, $donor_email);
    $donor_phone   = mysqli_real_escape_string($conn, $donor_phone);
    $donor_area    = mysqli_real_escape_string($conn, $donor_area);
    $book_title  = mysqli_real_escape_string($conn, $book_title);
    $author      = mysqli_real_escape_string($conn, $author);
    $book_desc = mysqli_real_escape_string($conn, $book_desc);
    $category         = mysqli_real_escape_string($conn, $category);


    //Inserting information to the database
    if (!empty($bookcoverName)) {

        $gift_img = rand(0, 100000) . '_' . $bookcoverName;
        move_uploaded_file($bookcoverTmpName, "../img/gift/$gift_img");

        $query = "INSERT INTO gift (item_posted_by, donor_mail, donor_phone, donor_area, book_title, authorName,category, book_img, book_desc)VALUES('$donor_name', '$donor_email', '$donor_phone', '$donor_area', '$book_title', '$author',  '$category', '$gift_img', '$book_desc')";

        $create_resell_post = mysqli_query($conn, $query);

        if (!$create_resell_post) {
            die("Query Failed: " . mysqli_connect_error());
        } else {
            header("Location: ../gift-books.php");
        }
    }
}