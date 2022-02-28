<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="css/contact.css">

<?php
$msg = "";
if (isset($_GET['emptyfields'])) {
  $msg = "<div class='alert alert-danger'>সব তথ্য পূরণ করুন.</div>'";
}

if (isset($_GET['InvalidEmail'])) {
  $msg = "<div class='alert alert-danger'>অবৈধ ইমেল ঠিকানা। ইমেল অবশ্যই @ অন্তর্ভুক্ত করতে হবে</div>";
}

if (isset($_GET['error'])) {
  $msg = "<div class='alert alert-danger'>কিছু ভুল হয়েছে. অনুগ্রহ! পরে আবার চেষ্টা করুন.</div>";
}

if (isset($_GET['success'])) {
  $msg = "<div class='alert alert-success'>আপনার বার্তা সফলভাবে  পাঠানো হয়েছে!</div>'";
}

?>
<section id="contact">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-2">
                <li class="breadcrumb-item"><a href="index.php">হোম</a></li>
                <li class="breadcrumb-item active" aria-current="page">যোগাযোগ</li>
            </ol>
        </nav>
        <div class="row">

            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.8556995578497!2d91.81955295028608!3d22.35907683522088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd89aaa8239cd%3A0x6e65fa00001dd59f!2sGEC%20More%2C%20Chittagong!5e0!3m2!1sen!2sbd!4v1589354074726!5m2!1sen!2sbd"
                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>

            <div class="offset-md-1 col-md-5">
                <?php echo $msg; ?>
                <div class="card mb-3 contact-box">
                    <div class="card-header py-3">
                        <h3>যোগাযোগ</h3>
                    </div>
                    <div class="card-body">
                        <form action="includes/contact.inc.php" method="POST">

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="senderName" type="text" class="form-control" placeholder="নাম">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input name="senderMail" type="text" class="form-control" placeholder="ইমেইল ঠিকানা">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input name="msgSubject" type="text" class="form-control" placeholder="বিষয়">
                            </div>

                            <div class="form-group">
                                <label for="msg">আপনার বার্তা</label>
                                <textarea type="text" class="form-control" name="msg" cols="5" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="contactAdmin" value="যোগাযোগ করুন">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>


<?php include "includes/footer.php"; ?>