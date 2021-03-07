<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <style>
      .box{
          color: #fff;
          padding: 20px;
          display: none;
          margin-top: 20px;
      }
      label{ margin-right: 15px; }
  </style>
  <script>
  $(document).ready(function(){
      $('input[type="radio"]').click(function(){
          var inputValue = $(this).attr("value");
          var targetBox = $("." + inputValue);
          $(".box").not(targetBox).hide();
          $(targetBox).show();
      });
  });
  </script>
</head>
<body>
  <br><h2 style="font-family:georgia; text-align:center;">STUDENT RECORDS SEARCH</h2><hr>
  <div style="font-family:georgia; " class="container">

  <div style="font-family:georgia; text-align:center;">
      <label><input type="radio" name="colorRadio" value="red"> STUDENT NAME</label>
      <label><input type="radio" name="colorRadio" value="green"> STUDENT CODE</label>
      <label><input type="radio" name="colorRadio" value="blue"> REGISTRATION DATE</label>
  </div>
  <div class="red box"><form action="" method="POST">
    <div class="form-group col-md-5">
      <input type="search" class="form-control" id="name" placeholder="Enter Student Name" name="name">
    </div>
    <div class="col-md-5">
      <button type="submit" name="submit1"class="btn btn-default">Submit</button>
    </div>
  </form></div>
  <div class="green box"><form action="" method="POST">
    <div class="form-group col-md-5">
      <input type="search" class="form-control" id="code" placeholder="Enter Student Code" name="code">
    </div>
    <div class="col-md-5">
      <button type="submit" name="submit2"class="btn btn-default">Submit</button>
    </div>
  </form></div>
  <div class="blue box"><form action="" method="POST">
    <div class="form-group col-md-5">
      <input type="date" class="form-control" id="fdate" placeholder="From Date" name="fdate" value="<?php if(isset($_POST['fdate'])){echo $_POST['fdate'];}else{}?>">
    </div>
    <div class="form-group col-md-5">
      <input type="date" class="form-control" id="tdate" placeholder="To Date" name="tdate" value="<?php if(isset($_POST['tdate'])){echo $_POST['tdate'];}else{}?>">
    </div>
    <div class="col-md-2">
      <button type="submit" name="submit3"class="btn btn-default">Submit</button>
    </div>
  </form></div>
  </div>
<br><hr><br><br>
  <div id="ddate" class="container-fluid">

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
        if(isset($_POST['submit3']))
        {
        $fdate=$_POST['fdate'];
        $tdate=$_POST['tdate'];
        $dis = "Select * from Student where registration BETWEEN '$fdate' AND '$tdate' order by registration  ";
        $qdis = mysqli_query($con, $dis);

        if(mysqli_num_rows($qdis)>0)
        {
          foreach($qdis as $result) {
        ?>

         <tr>
           <td> <a href="editt.php?id=<?php echo $result['id']; ?>" class="btn btn-success btn-sm" role="button">Edit</a>..<a href="Del.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm" role="button">Delete</a> </td>
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
      }
      else{
        ?>
          <script>
            alert("No Record Found");
          </script>
        <?php

      }
    }
        ?>
      </tbody>

      <tbody>
        <?php
        if(isset($_POST['submit2']))
        {
        $dis = "Select * from Student where code='$_POST[code]'";
        $qdis = mysqli_query($con, $dis);

        if(mysqli_num_rows($qdis)>0)
        {
          foreach($qdis as $result) {
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
      }
      else{
        ?>
          <script>
            alert("No Record Found");
          </script>
        <?php

      }
    }
        ?>
      </tbody>
      <tbody>
        <?php
        if(isset($_POST['submit1']))
        {
        $dis =" Select * from Student where first='$_POST[name]' ";
        $qdis = mysqli_query($con, $dis);

        if(mysqli_num_rows($qdis)>0)
        {
          foreach($qdis as $result) {
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
      }
      else{
        ?>
          <script>
            alert("No Record Found");
          </script>
        <?php

      }
    }
        ?>
      </tbody>

    </table>
  </div>

</body>
</html>
