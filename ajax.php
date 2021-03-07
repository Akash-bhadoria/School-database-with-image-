<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "skill";

$con = mysqli_connect($server,$user,$password,$db);

if(isset($_POST['id'])){
  $id=$_POST['id'];
  $c = mysqli_query($con, "select * from state where country_id='$id'");
  while ($row=mysqli_fetch_array($c)){
    $id=$row['id'];
    $state=$row['state'];
    echo "<option value='$id'>$state</option>";
  }
}

?>
