<?php include "function.php"; 

$id = $_REQUEST['id'];
$profile_pic = $_REQUEST['profile_pic'];

$sql = "DELETE FROM user_info where id='$id'";

$query = mysqli_query($conn,$sql);

if ($query) {
    echo unlink($profile_pic);
    header('location:index.php?deleted');
}


?>