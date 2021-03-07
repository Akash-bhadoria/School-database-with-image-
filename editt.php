<?php

include 'db.php';

$id=$_GET['id'];

$first="";
$last="";
$father="";
$dob="";
$address="";
$phone="";
$registration="";



$res=mysqli_query($con, "select * from student where id=$id");
while($row=mysqli_fetch_array($res)){
  $first=$row['first'];
  $last=$row['last'];
  $father=$row['father'];
  $dob=$row['dob'];
  $address=$row['address'];
  $phone=$row['phone'];
  $registration=$row['registration'];

}

if(isset($_POST['update'])){

      mysqli_query($con,"update student set first='$_POST[first]', last='$_POST[last]', father='$_POST[father]', dob='$_POST[dob]', address='$_POST[address]', phone='$_POST[phone]', registration='$_POST[registration]', mdate= NOW() where id=$id");
      ?>
      <script type="text/javascript">
      window.location="table.php";
      </script>
      <?php

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>STUDENT DETAILS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src= "jquery.js"></script>
</head>
<body>
<br><br><br>
<div class="container">
  <div class="col-lg-9";
  <h2 style="font-family:georgia;">UPDATE DETAILS</h2><hr>
  <form style="font-family:georgia; font-size:16px;"  action="" method="POST">
    <div class="form-group">
      <label for="first">FIRST NAME</label>
      <input type="text" class="form-control"  placeholder="Enter First Name" name="first" value="<?php echo $first; ?>" >
    </div>
    <div class="form-group">
      <label for="last">LAST NAME</label>
      <input type="text" class="form-control" id="last" placeholder="Enter Last Name" name="last" value="<?php echo $last; ?>" >
    </div>
    <div class="form-group">
      <label for="father">FATHER NAME</label>
      <input type="text" class="form-control" id="father" placeholder="Enter Father Name" name="father" value="<?php echo $father; ?>" >
    </div>
		<div class="form-group">
      <label for="dob">DATE OF BIRTH</label>
      <input type="date" class="form-control" id="dob" placeholder="" name="dob" value="<?php echo $dob; ?>">
    </div>
    <div class="form-group">
      <label for="address">ADDRESS</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Your Address" name="address" value="<?php echo $address; ?>">
    </div>
    <div class="form-group">
      <label for="phone">PHONE NUMBER</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Your Number" name="phone" value="<?php echo $phone; ?>" >
    </div>
    <div class="form-group">
      <label for="registration">REGISTRATION DATE</label>
      <input type="date" class="form-control" id="registration" placeholder="" name="registration"  value="<?php echo $registration; ?>">
    </div>
    <button type="submit" name="update" class="btn btn-Success btn-sm">UPDATE</button>
  </form>
</div>


</body>
</html>
