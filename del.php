<?php

include 'db.php';

$id=$_GET['id'];

mysqli_query($con , "delete from student where id=$id");

?>

<script type="text/javascript">
window.location="search.php";
</script>
