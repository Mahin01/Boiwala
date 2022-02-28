<?php include "includes/header.php"; ?>
<?php include 'db/database.php'; ?>
<link rel="stylesheet" href="css/signup.css">

<?php

$msg = "";

if (isset($_GET['emptyfields'])) {
    $msg = "<div class='alert alert-danger'>Please! Fill out all the fields.</div>";
}

if (isset($_GET['InvalidEmail'])) {
    $msg = "<div class='alert alert-danger'>Invalid Email Address.Email Must include @</div>";
}

if (isset($_GET['InvalidUserName'])) {
    $msg = "<div class='alert alert-danger'>Invalid username.username should be at least 6 characters long.Only characters,numbers and special characters are allowed</div>";
}

if (isset($_GET['NumberExist'])) {
    $msg = "<div class='alert alert-danger'>Number Already Exists.</div>";
}

if (isset($_GET['UserAlreadyExists'])) {
    $msg = "<div class='alert alert-danger'>User Already Exists.</div>";
}

if (isset($_GET['InvalidNumber'])) {
    $msg = "<div class='alert alert-danger'>Invalid Phone Number.Number Must contain +880 And Exactly 11 digit</div>";
}

if (isset($_GET['invalidpwd'])) {
    $msg = "<div class='alert alert-danger'>Invalid Password.Password should be at least 6 characters in length.Must include letter & number.</div>";
}

?>
<h5 class="text-center"><?php echo $msg; ?></h5>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>স্বাগতম</h3>
            <p>আপনি আপনার বই পুনরায় বিক্রি করে আপনার নিজের অর্থ উপার্জন থেকে কয়েক মিনিট দূরে!</p>
            <a class="btn" href="login.php">লগইন</a>
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
                    <h3 class="register-heading">ইউজার হিসাবে যোগদান করুন</h3>
                    <form action="includes/signup.inc.php" method="POST">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="fname" class="form-control" placeholder="নামের প্রথম অংশ *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lname" class="form-control" placeholder="নামের শেষাংশ *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ইউজারনেম *" name="username"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="পাসওয়ার্ড*" name="pwd"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> পুরুষ </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>মহিলা </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="mail" class="form-control" placeholder="আপনার ইমেইল *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="11" maxlength="11" name="phone" class="form-control"
                                        placeholder="আপনার ফোন নাম্বার *" value="" />
                                </div>
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="area">
                                        <option class="hidden" selected disabled>আপনার এলাকা নির্বাচন করুন</option>
                                        <?php
                                        $sql = "SELECT * FROM area";
                                        $fetch_area = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($fetch_area)) {
                                            $area_id   = $row['area_id'];
                                            $area_name = $row['area_name'];

                                        ?>
                                        <option value="<?php echo $area_id; ?>"><?php echo $area_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input name="signup-submit" type="submit" class="btnRegister" value="রেজিস্টার" />
                            </div>
                        </div>
                </div>
                </form>

                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="register-heading">মেম্বার হিসাবে যোগদান করুন</h3>
                    <form action="includes/member_signup.inc.php" method="POST">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="fname" class="form-control" placeholder="নামের প্রথম অংশ *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lname" class="form-control" placeholder="নামের শেষাংশ *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ইউজারনেম *" name="username"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="পাসওয়ার্ড*" name="pwd"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> পুরুষ </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>মহিলা </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="mail" class="form-control" placeholder="আপনার ইমেইল *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="11" maxlength="11" name="phone" class="form-control"
                                        placeholder="আপনার ফোন নাম্বার *" value="" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="area">
                                        <option class="hidden" selected disabled>আপনার এলাকা নির্বাচন করুন</option>
                                        <?php
                                        $sql = "SELECT * FROM area";
                                        $fetch_area = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($fetch_area)) {
                                            $area_id   = $row['area_id'];
                                            $area_name = $row['area_name'];

                                        ?>
                                        <option value="<?php echo $area_id; ?>"><?php echo $area_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <input name="member-signup" type="submit" class="btnRegister" value="রেজিস্টার" />
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
function activatePlaceSearch() {
    var input = document.getElementById('search_term');
    var autocomplete = new google.maps.places.Autocomplete(input);
}
</script>

<script async defer type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxzeYBu04-THc-ca3IWjGX8xpECRGp-9s&libraries=places&callback=activatePlaceSearch">
</script>

<?php include "includes/footer.php"; ?>