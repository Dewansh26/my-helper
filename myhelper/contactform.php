<?php
// The contact Us Form wont work with Local Host but it will work on Live Server
if(isset($_REQUEST['submit'])) {
 // Checking for Empty Fields
 if(($_REQUEST['name'] == "") || ($_REQUEST['mobile'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['message'] == "")){
  // msg displayed if required field missing

  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  
 } else {
 $name = $_REQUEST['name'];
 $mobile = $_REQUEST['mobile'];
 $email = $_REQUEST['email'];
 $subject = $_REQUEST['subject'];
 $message = $_REQUEST['message'];

 $mailTo = "harshitgautam325@gmail.com";
 $headers = "From: ". $email;
 $txt = "You have received an email from ". $name. ".\n\n".$message;
 mail($mailTo, $subject, $txt, $headers);
 $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Sent Successfully </div>';
    // $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    // $mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
    // $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    // $subject = mysqli_real_escape_string($mysqli, $_POST['subject']);
    // $message = mysqli_real_escape_string($mysqli, $_POST['message']);
}
}
?>

<!--Start Contact Us Row-->
<div class="col-md-8">
 <!--Start Contact Us 1st Column-->
 <form action="" method="post">
  <input type="text" class="form-control" name="name" placeholder="Name"><br>
  <input type="text" 
  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
  class="form-control" name="mobile" placeholder="Mobile No." minlength="10"
                        maxlength="10" required> <br>
  <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
  <input type="subject" class="form-control" name="subject" placeholder="subject"><br>
  <textarea class="form-control" name="message" placeholder="Massage" style="height:150px;"></textarea><br>
  <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
  <?php if(isset($msg)) {echo $msg; } ?>
 </form>
</div> <!-- End Contact Us 1st Column-->