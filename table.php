<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <br><h2 style="font-family:georgia; text-align:center;">STUDENT RECORDS</h2><br><br>

  <table style="font-family:georgia; "class="table table-hover text-center">
    <thead>
      <tr>
        <th>Action</th>
        <th>Student Code</th>
        <th>First Name</th>
        <th>Last name</th>
        <th>Date Of Birth</th>
        <th>Student Image</th>
        <th>Country</th>
        <th>State</th>
        <th>Registration Date</th>
        <th>Created Date</th>
        <th>Modified Date</th>
      </tr>
    </thead>

    <tbody>
      <?php
      $display = "Select * from Student";
      $qdisplay = mysqli_query($con, $display);

      //$row = mysqli_num_rows($qdisplay);

      while($result = mysqli_fetch_array($qdisplay)){
      ?>

       <tr>
         <td> <a href="edit.php?id=<?php echo $result['id']; ?>" class="btn btn-success btn-sm" role="button">Edit</a>..<a href="Delete.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm" role="button">Delete</a> </td>
         <td> <?php echo $result['code'];?> </td>
         <td> <?php echo $result['first'];?> </td>
         <td> <?php echo $result['last'];?> </td>
         <td> <?php echo $result['dob'];?> </td>
         <td> <img src = "<?php echo $result['image']; ?>" height="100px" width="100px"></td>
         <td> <?php echo $result['country'];?> </td>
         <td> <?php echo $result['state'];?> </td>
         <td> <?php echo $result['registration'];?> </td>
         <td> <?php echo $result['cdate'];?> </td>
         <td> <?php echo $result['mdate'];?> </td>
       </tr>

      <?php
      }
      ?>
    </tbody>

  </table>
</div>

</body>
</html>
