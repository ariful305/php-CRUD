<?php include "function.php"; 

  $profile = $_REQUEST['profile_pic'];  
  
if (isset($_POST['submit'])) {
   
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $profile_pic = $_FILES['profile_pic'];


    $name = $profile_pic['name'];
    $temp_name = $profile_pic['tmp_name'];

    if (!empty($name)) {      
    
      $loc="uploads/";

      if (move_uploaded_file($temp_name ,$loc.$name )) {
        
       $path = $loc.$name;
      
      }
    }
    unlink($profile);
    
    
     
 $sql = " UPDATE user_info SET username='$username',email='$email',password='$password',profile_pic ='$path' WHERE  id = '$id'";

    $query = mysqli_query($conn,$sql);

    if (!$query) {
       echo "Data not inserted".mysqli_error();
    }
    else {
      header('location:index.php?updated');      
    }
}


$id = $_REQUEST['id'];

$sql = "SELECT * FROM user_info where id = '$id'";

$query = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($query)) {
  $id = $row['id'];
  $username = $row['username'];
  $profile_pic =  $row['profile_pic'];
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
 
    <form action="edit.php" method="post" enctype="multipart/form-data">
      <h1>Login Form</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <input type="hidden" name="id" value="<?php echo $id ?>" >        
        <label ><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="username" value="<?php echo $username ?>" required >        
        <label ><strong>Email</strong></label>
        <input style="width: 100%;
    padding: 16px 8px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;"  type="email" placeholder="Enter email " name="email" value="<?php echo $email ?>" required>
    <label ><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" value="<?php echo $password ?>" required >
        <label ><strong>Old Image</strong></label>
        <br>
        <img src="<?php echo $profile_pic ?>" width="200px" height="200px">  
        <input style="width: 100%;
    padding: 16px 8px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;" type="file" placeholder="Select an Image" name="profile_pic" onchange="preview()" > 
         <br>
      <img id="frame" src=""/>
      </div>
      <button type="submit" name="submit" value="submit">Update Info</button>
      
    </form>

<script>

function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>

    
    
    

  </body>
</html>


