<?php
$cities = ['Alirajpur','Anuppur','Ashok Nagar','Balaghat','Barwani','Betul','Bhind','Bhopal','Burhanpur','Chhatarpur','Chhindwara','Damoh','Datia','Dewas','Dhar','Dindori','Guna','Gwalior','Harda','Hoshangabad','Indore','Jabalpur','Jhabua','Katni','Khandwa ','Khargone ','Mandla','Mandsaur','Morena','Narsinghpur','Neemuch','Panna','Rewa','Rajgarh','Ratlam','Raisen','Sagar','Satna','Sehore','Seoni','Shahdol','Shajapur','Sheopur','Shivpuri','Sidhi','Singrauli','Tikamgarh','Ujjain','Umaria','Vidisha',];
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
if(isset($_REQUEST['submitrequest'])){
 // Checking for Empty Fields
 if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $rinfo = $_REQUEST['requestinfo'];
   $rdesc = $_REQUEST['requestdesc'];
   $rname = $_REQUEST['requestername'];
   $radd1 = $_REQUEST['requesteradd1'];
   $radd2 = $_REQUEST['requesteradd2'];
   $rcity = $_REQUEST['requestercity'];
   $rstate = $_REQUEST['requesterstate'];
   $rzip = $_REQUEST['requesterzip'];
   $remail = $_REQUEST['requesteremail'];
   $rmobile = $_REQUEST['requestermobile'];
   $rdate = $_REQUEST['requestdate'];
   $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
  //  $conn->query($sql);
  //  $genid = mysqli_insert_id($conn);
  //  $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully Your request id - ' . $genid .' </div>';
  // //  session_start();
  //  $_SESSION['myid'] = $genid;
   if($conn->query($sql) ){
    // below msg display on form submit success
    $genid = mysqli_insert_id($conn);
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully Your request id - ' . $genid .' </div>';
    // session_start();
    $_SESSION['myid'] = $genid;
    // echo "<script> location.href='submitrequestsuccess.php'; </script>";
    // include('submitrequestsuccess.php');
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
   }
 }
}
?>
<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="" method="POST">
    <div class="form-group">
    <label for="">Who's Required</label>
            <select class="form-control" name="requestinfo" id="inputRequestInfo">
                <option value="none">What's you required</option>
                <option value="electrician">Electrician</option>
                <option value="plumber">Plumber</option>
                <option value="mobile">Mobile Repairer</option>
                <option value="Home cleaning">Home cleaner</option>
            </select>
      <!-- <label for="inputRequestInfo">Request Info</label>
      <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo"> -->
    </div>
    <div class="form-group">
      <label for="inputRequestDescription">Description</label>
      <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc">
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Rahul" name="requestername">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Address Line 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1">
      </div>
      <div class="form-group col-md-6">
        <label for="inputAddress2">Address Line 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="requesteradd2">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <select class="form-control"id="requestercity" name="requestercity">
                <option value="none">-- Select City --</option>
                <?php foreach ($cities as $city) : ?>
                <option value="<?= $city ?>"> <?= $city ?>
                </option>
                <?php endforeach; ?>
            </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
       
        <input type="text" class="form-control" id="inputstate" name="requesterstate" value="Madhya pradesh" readonly>

      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text"
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
        class="form-control" id="inputZip" name="requesterzip" placeholder="Zipcode"  minlength="6"
                        maxlength="6" required> 
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requesteremail" placeholder="Email">
      </div>
      <div class="form-group col-md-2">
        <label for="inputMobile">Mobile</label>
        <input type="text"
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
         class="form-control" id="inputMobile" name="requestermobile"  placeholder="Mobile No."  minlength="10"
                        maxlength="10" required> 
      </div>
      <div class="form-group col-md-2">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="requestdate">
      </div>
    </div>

    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div>
</div>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
$conn->close();
?>