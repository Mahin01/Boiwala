<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="css/post-ad.css">

<?php
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
?>


<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>স্বাগতম</h3>
            <p>আপনি আপনার বই পুনরায় বিক্রি করে আপনার নিজের অর্থ উপার্জন থেকে কয়েক মিনিট দূরে!</p>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#resell" role="tab"
                        aria-controls="home" aria-selected="true"> পুনঃবিক্রয়</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#accessories" role="tab"
                        aria-controls="profile" aria-selected="false"> এক্সেসরিজ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#exchange" role="tab"
                        aria-controls="profile" aria-selected="false">বই বিনিময়</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#gift" role="tab"
                        aria-controls="profile" aria-selected="false">গিফট বুকস</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="resell" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">আপনার ব্যবহৃত বই পুনরায় বিক্রয় করুন</h3>
                    <form action="includes/post-ad.inc.php" method="POST" enctype="multipart/form-data">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="userName" class="form-control"
                                        placeholder="<?php echo $_SESSION['username']; ?> *"
                                        value="<?php echo $_SESSION['username']; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control"
                                        placeholder="<?php echo $_SESSION['email']; ?>"
                                        value="<?php echo $_SESSION['email']; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" minlength="11" maxlength="11"
                                        placeholder="<?php echo $_SESSION['phone']; ?> *" name="phone"
                                        value="<?php echo $_SESSION['phone']; ?>" />
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
                                        <option value=" <?php echo $area_id; ?>"><?php echo $area_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="বইয়ের নাম*" name="book_title"
                                        value="" />
                                </div>

                                <div class="form-group"> <input type="text" rows="5" class="form-control"
                                        maxlength="250" placeholder="বইয়ের বিবরণ*" name="book_desc" value="" />
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="author" class="form-control" placeholder="লেখকের নাম *"
                                        value="" />
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="category">
                                        <option class="hidden" selected disabled>অনুগ্রহ করে ক্যাটাগরি নির্বাচন করুন
                                        </option>
                                        <?php
                                        $sql = "SELECT * FROM category";
                                        $fetch_cat = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id   = $row['cat_id'];
                                            $cat_name = $row['cat_name'];

                                        ?>
                                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="img1" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">ফাইল বাছুন</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="img2" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">ফাইল বাছুন</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="img3" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">ফাইল বাছুন</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="price" class="form-control" placeholder="মূল্য *"
                                        value="" />
                                </div>

                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $_SESSION['role']; ?>" name="role">
                                    <input name="resell" type="submit" class="btnRegister" value=" বিজ্ঞাপন দিন" />
                                </div>
                            </div>
                        </div>
                </div>
                </form>

                <div class="tab-pane fade show" id="accessories" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">আপনার ব্যবহৃত জিনিসপত্র দান করুন</h3>
                    <form action="includes/post-ad.inc.php" method="POST" enctype="multipart/form-data">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="userName" class="form-control"
                                        placeholder="<?php echo $_SESSION['username']; ?> *"
                                        value="<?php echo $_SESSION['username']; ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control"
                                        placeholder="<?php echo $_SESSION['email']; ?>"
                                        value="<?php echo $_SESSION['email']; ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" minlength="11" maxlength="11"
                                        placeholder="<?php echo $_SESSION['phone']; ?> *" name="phone"
                                        value="<?php echo $_SESSION['phone']; ?>" disabled />
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

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="এক্সেসরিজের নাম *"
                                        name="access_title" value="" />
                                </div>

                                <div class="form-group"> <input type="text" rows="5" class="form-control"
                                        maxlength="250" placeholder="এক্সেসরিজের বিবরণ*" name="access_desc" value="" />
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="category">
                                        <option class="hidden" selected disabled>অনুগ্রহ করে ক্যাটাগরি নির্বাচন করুন
                                        </option>
                                        <?php
                                        $sql = "SELECT * FROM category";
                                        $fetch_cat = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id   = $row['cat_id'];
                                            $cat_name = $row['cat_name'];

                                        ?>
                                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="access_img" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">ফাইল বাছুন</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="accessories" type="submit" class="btnRegister" value="বিজ্ঞাপন দিন" />
                                </div>
                            </div>
                        </div>
                </div>
                </form>


                <div class="tab-pane fade show" id="exchange" role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="register-heading">আপনার ব্যবহৃত বই বিনিময় করুন</h3>
                    <form action="includes/post-ad.inc.php" method="POST" enctype="multipart/form-data">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="userName" class="form-control"
                                        placeholder="<?php echo $_SESSION['username']; ?> *"
                                        value="<?php echo $_SESSION['username']; ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control"
                                        placeholder="<?php echo $_SESSION['email']; ?>"
                                        value="<?php echo $_SESSION['email']; ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" minlength="11" maxlength="11"
                                        placeholder="<?php echo $_SESSION['phone']; ?> *" name="phone"
                                        value="<?php echo $_SESSION['phone']; ?>" disabled />
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
                                        <option value=" <?php echo $area_id; ?>"><?php echo $area_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="বইয়ের নাম*" name="book_title"
                                        value="" />
                                </div>

                                <div class="form-group"> <input type="text" rows="5" class="form-control"
                                        maxlength="250" placeholder="বইয়ের বিবরণ*" name="book_desc" value="" />
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="author" class="form-control" placeholder="লেখকের নাম *"
                                        value="" />
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="category">
                                        <option class="hidden" selected disabled>অনুগ্রহ করে ক্যাটাগরি নির্বাচন করুন
                                        </option>
                                        <?php
                                        $sql = "SELECT * FROM category";
                                        $fetch_cat = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id   = $row['cat_id'];
                                            $cat_name = $row['cat_name'];

                                        ?>
                                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="category">
                                        <option class="hidden" selected disabled>আপনার পছন্দসই বিনিময় ক্যাটাগরি
                                        </option>
                                        <?php
                                        $sql = "SELECT * FROM category";
                                        $fetch_cat = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id   = $row['cat_id'];
                                            $cat_name = $row['cat_name'];

                                        ?>
                                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="img1" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">ফাইল বাছুন</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="img2" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">ফাইল বাছুন</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="img3" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">ফাইল বাছুন</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="exchange" type="submit" class="btnRegister" value=" বিজ্ঞাপন দিন" />
                                </div>
                            </div>
                        </div>
                </div>
                </form>

                <div class="tab-pane fade show" id="gift" role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="register-heading">আপনার ব্যবহৃত বই দান করুন</h3>
                    <form action="includes/post-ad.inc.php" method="POST" enctype="multipart/form-data">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="userName" class="form-control"
                                        placeholder="<?php echo $_SESSION['username']; ?> *"
                                        value="<?php echo $_SESSION['username']; ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control"
                                        placeholder="<?php echo $_SESSION['email']; ?>"
                                        value="<?php echo $_SESSION['email']; ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" minlength="11" maxlength="11"
                                        placeholder="<?php echo $_SESSION['phone']; ?> *" name="phone"
                                        value="<?php echo $_SESSION['phone']; ?>" disabled />
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
                                        <option value=" <?php echo $area_id; ?>"><?php echo $area_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="বইয়ের নাম*" name="book_title"
                                        value="" />
                                </div>

                                <div class="form-group"> <input type="text" rows="5" class="form-control"
                                        maxlength="250" placeholder="বইয়ের বিবরণ*" name="book_desc" value="" />
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="author" class="form-control" placeholder="লেখকের নাম *"
                                        value="" />
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="category">
                                        <option class="hidden" selected disabled>অনুগ্রহ করে ক্যাটাগরি নির্বাচন করুন
                                        </option>
                                        <?php
                                        $sql = "SELECT * FROM category";
                                        $fetch_cat = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                            $cat_id   = $row['cat_id'];
                                            $cat_name = $row['cat_name'];

                                        ?>
                                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="gift_img" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">ফাইল বাছুন</label>
                                    </div>
                                </div>


                                <input name="gift" type="submit" class="btnRegister" value="বিজ্ঞাপন দিন" />
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>



<!-- <form action="#" method="POST">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Username *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="E-mail *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" minlength="11" maxlength="11" placeholder="phone number*" name="phone" value="" />
                                        </div>

                                        <div class="form-group">
                                        <select class="form-control">
                                                <option class="hidden"  selected disabled>Please select your Area</option>
                                                <option>Chawkbazar</option>
                                                <option>Agrabad</option>
                                                <option>GEC</option>
                                                <option>New Market</option>
                                                <option>AnderKilla</option>
                                                <option>Bahaddarhat</option>
                                                <option>Chandgoan</option>
                                                <option>Patenga</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Book Title*" name="book_title" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">                         <input type="text" rows="5" class="form-control" maxlength="250" placeholder="Book Description*" name="book_desc" value="" />                   
                                        </div>
                                    
                                        <div class="form-group">
                                            <input type="text" name="author" class="form-control" placeholder="Author Name *" value="" />
                                        </div>
                                       
                                        <div class="form-group">
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" multiple>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                                                              </div>
                                        <input name="signup-submit" type="submit" class="btnRegister"  value="Post AD"/>
                                    </div>
                                </div>
                            </div>
                          </form> -->




<script>
$(".custom-file-input").on("change", function() {
    var files = Array.from(this.files)
    var fileName = files.map(f => {
        return f.name
    }).join(", ")
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<?php include "includes/footer.php"; ?>