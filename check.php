<?php include "function.php"; 

session_start();
if (isset($_REQUEST['submit'])) {
      
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $pass = md5($password);

     $sql ="SELECT * FROM user_info WHERE username= '$username' && password='$pass'";

    $query = mysqli_query($conn,$sql);

    $result = mysqli_num_rows($query);

    if (!$result) {
       echo "invalid login";
    }
    else {
    $_SESSION['username']=$username;
    $_SESSION['current_timestamp']=time();
      header('location:dashboard.php');      
    }
  }

?>