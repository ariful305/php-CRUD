<?php include "function.php"; 
if (isset($_POST['submit'])) {
      
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pass = md5($password);

   $profile_pic = $_FILES['profile_pic'];

    $name = $profile_pic['name'];
    $temp_name = $profile_pic['tmp_name'];

    if (!empty($name)) {

      $loc="uploads/";

      if (move_uploaded_file($temp_name ,$loc.$name )) {
        
       $path = $loc.$name;
      
      }
    
 


  $sql = "INSERT INTO user_info(profile_pic,username, email, password) VALUES ('$path','$username','$email','$pass')";

    $query = mysqli_query($conn,$sql);

    if (!$query) {
       echo "Data not inserted".mysqli_error();
    }
    else {
      header('location:index.php?created');      
    }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form validation</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
 
    <form action="create.php" method="post" enctype="multipart/form-data">
      <h1>Create User</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label ><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="username" required >        
        <label ><strong>Email</strong></label>
        <input style="width: 100%;
    padding: 16px 8px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;"  type="email" placeholder="Enter email " name="email" required>
    <label ><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" required >
        <label ><strong>Image</strong></label>
        <input style="width: 100%;
    padding: 16px 8px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;" type="file" placeholder="Select an Image" name="profile_pic" onchange="preview()" > 
         <br>
      <img id="frame" src=""/>
      </div>
      <button type="submit" name="submit" value="submit">Sign Up</button>
      
    </form>

<script>

function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>


  </body>
</html>

