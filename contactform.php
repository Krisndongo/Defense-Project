<?php
// The contact Us Form wont work with Local Host but it will work on Live Server
if (isset($_POST['submit'])) {
    // Checking for Empty Fields
    {
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $mailTo = "contact@osms.com";
        $headers = "From: " . $email;
        $txt = "You have received an email from " . $name . ".\n\n" . $message;
        mail($mailTo, $subject, $txt, $headers);
        //$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Sent Successfully </div>';
    }
}
?>
<!--Start Contact Us Row-->
<div class="col-md-6">
    <!--Start Contact Us 1st Column-->
    <form action="" method="post">
        <input type="text" class="form-control" name="name" placeholder="Name" required><br>
        <input type="text" class="form-control" name="subject" placeholder="Subject" required><br>
        <input type="email" class="form-control" name="email" placeholder="E-mail" required><br>
        <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;" required></textarea><br>
        <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div> <!-- End Contact Us 1st Column-->