<?php

include 'db.php';


if(isset($_POST['submit'])){
	$first = mysqli_real_escape_string($con, $_POST['first']) ;
	$last = mysqli_real_escape_string($con, $_POST['last']) ;
	$code = mysqli_real_escape_string($con, $_POST['code']) ;
	$father = mysqli_real_escape_string($con, $_POST['father']) ;
	$dob = mysqli_real_escape_string($con, $_POST['dob']) ;
	$address = mysqli_real_escape_string($con, $_POST['address']) ;
	$country = mysqli_real_escape_string($con, $_POST['country']) ;
	$state = mysqli_real_escape_string($con, $_POST['state']) ;
	$phone = mysqli_real_escape_string($con, $_POST['phone']) ;
	$gender = mysqli_real_escape_string($con, $_POST['gender']) ;
	$registration = mysqli_real_escape_string($con, $_POST['registration']) ;
  $image = $_FILES['image'] ;
  //echo $first . $last . $code . $father . $dob . $address . $country . $state  . $phone . $gender . $registration . $image ;
  //echo $imagename ;

	$imagename = $image['name'];
	$imagetmp = $image['tmp_name'];
	$imageext = explode('.',$imagename);
	$imagecheck = strtolower(end($imageext));
	$imageextstored = array('png','jpg','jpeg');
	in_array($imagecheck,$imageextstored);
	$destinationimage = 'upload/'.$imagename;
	move_uploaded_file($imagetmp,$destinationimage);


	$codequery = " select code from student where code='$code' ";
	$query = mysqli_query($con,$codequery);

	$codecount = mysqli_num_rows($query);

	if($codecount>0){
		?>
			<script>
				alert("Student Code Already Exist Try Again!..");
			</script>
		<?php
	}else{
			$query = "insert into student(first, last, code, father, dob, address, country, state, phone, gender, registration, image, cdate, mdate) values('$first', '$last', '$code', '$father', '$dob', '$address', '$country', '$state', '$phone', '$gender', '$registration', '$destinationimage', NOW(), NOW())";

			$iquery = mysqli_query($con, $query);


			if($iquery){
					?>
						<script>
							alert("Details Inserted Successful");
						</script>
					<?php
				}else{

					?>
						<script>
							alert("Details Not Inserted");
						</script>
					<?php
				}
}
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
	<script type="text/javascript" src="file.js"></script>
</head>
<body>
<br><br><br>
<div class="container">
  <h2 style="font-family:georgia;">STUDENT DETAILS</h2><hr>
  <form style="font-family:georgia; font-size:16px;"  action="" method="POST" class="validated" enctype="multipart/form-data">
    <div class="form-group">
      <label for="first">FIRST NAME</label>
      <input type="text" class="form-control" id="first" placeholder="Enter First Name" name="first" required>
    </div>
    <div class="form-group">
      <label for="last">LAST NAME</label>
      <input type="text" class="form-control" id="last" placeholder="Enter Last Name" name="last" required>
    </div>
    <div class="form-group">
      <label for="code">STUDENT CODE</label>
      <input type="text" class="form-control" id="code" placeholder="Enter Student Code" name="code" required>
    </div>
    <div class="form-group">
      <label for="father">FATHER NAME</label>
      <input type="text" class="form-control" id="father" placeholder="Enter Father Name" name="father" >
    </div>
		<div class="form-group">
			<label for="dob">DATE OF BIRTH</label>
			<div class="row">
			<div class="col-lg-9">
      <input type="date" class="form-control" id="dob" placeholder="" name="dob" required>
		</div>
		<div class="col-lg-1">
			<input type="submit" value="Find Age" onclick="getAge()">

		</div>
		<div class="col-lg-2">
			<p id="text"></p>
		</div>
	</div>
    </div>
    <div class="form-group">
      <label for="address">ADDRESS</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Your Address" name="address" >
    </div>
		<div class="form-group">
		 <label for="country">COUNTRY</label>
		<?php
     $c = mysqli_query($con, "select * from country");
		 $rowcount=mysqli_num_rows($c);
		 ?>
		 <select class="form-control" id="country" name="country">
			 <option>Select Country</option>
			 <?php
       for ($i=1; $i <=$rowcount ; $i++) {
				 $row = mysqli_fetch_array($c);
			 ?>
			 <option value="<?php echo $row["id"] ?>"><?php echo $row["country"] ?></option>
			<?php
		   }
			 ?>
		 </select>
	 </div>
	 <div class="form-group">
       <label for="country">STATE</label>
      <select class="form-control" id="state" name="state">
      </select>
    </div>
    <div class="form-group">
      <label for="phone">PHONE NUMBER</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Your Number" name="phone" >
    </div>
    <div class="form-group">
      <label for="gender">GENDER</label><br>
      <input type="radio" id="gender" name="gender" value="male" required>Male <p>
      <input type="radio" id="gender" name="gender" value="Female" required>Female
    </div>
    <div class="form-group">
      <label for="registration">REGISTRATION DATE</label>
      <input type="date" class="form-control" id="registration" placeholder="" name="registration" required>
    </div>
		<div class="form-group">
      <label for="image">STUDENT IMAGE</label>
      <input type="file" class="form-control" id="image" placeholder="" name="image" required>
      <div>Please select .png , .jpg and .jpeg file .</div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
	<br>
	<h5 style="font-family:georgia;"> ACTIONS</h5>
	<hr>
	<div style="font-family:georgia;">
		<a href="table.php" class="btn btn-outline-dark"role="button">VIEW ALL </a>
		<a href="search.php" class="btn btn-outline-dark"role="button">SEARCH </a>
	</div>
	<br><br><br>
<!--	<form name="form1"  dir="rtl" method="post" action="searchresults.php">
<label for="search"> search </label>
<input name="search" type="text" size="40" maxlength="50" placeholder="you can search">
<input type="radio" name="search_type" value="job_name" checked="checked">Job<br>
<input type="radio" name="search_type" value="family">Family<br>
<input type="radio" name="search_type" value="name">Name
<input type="submit" name="submit" value="search"/> <br/>
</form>-->
</div>



</body>
</html>
