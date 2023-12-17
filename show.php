<?php include "function.php"; 

$id = $_REQUEST['id'];

$sql = "SELECT * FROM user_info where id = '$id'";

$query = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($query)) {
  $id = $row['id'];
  $profile_pic = $row['profile_pic'];
  $username = $row['username'];
  $email = $row['email'];
  $password = $row['password'];
  $submit_date = $row['submit_date'];
}
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show user info</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css"> 
  </head>
  <body>
 
    <form action="index.php" method="post">
      <h1>Login Form</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <input type="hidden" name="id" value="<?php echo $id ?>" >        
        <label ><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="username" value="<?php echo $username ?>" readonly >        
        <label ><strong>Email</strong></label>
        <input style="width: 100%;
    padding: 16px 8px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;"  type="email" placeholder="Enter email " name="email" value="<?php echo $email ?>" readonly>
    <label ><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" value="<?php echo $password ?>" readonly >
        <label ><strong>Image</strong></label>
        <br>
        <img src="<?php echo $profile_pic ?>" width="200px" height="200px">  
      </div>
      <button type="submit" name="submit" value="submit">Back </button>
      
    </form>




  </body>
</html>

