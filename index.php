<?php include "function.php"; 
session_start();

$sql = "SELECT * FROM user_info";

$query = mysqli_query($conn,$sql);

$count = mysqli_num_rows($query );


if (isset($_REQUEST['multiple_delete'])) {
      
  $all_data = $_REQUEST['check_data'];

   $delet_id = implode(",",$all_data);
   $sql = "DELETE FROM user_info where id in ($delet_id) ";

  $query = mysqli_query($conn,$sql);
  if ($query) {
    
    header('location:index.php');
}

}
?>



  
<!doctype html>
<html lang="en">
  <head>  

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
  

    <title>PHP CRUD</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Create User</a>
      </li>
      <?php 
      if (isset($_SESSION['username'])) {
       echo '<li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="dashboard.php" role="button" data-toggle="dropdown" aria-expanded="false">'.
       $_SESSION['username'].'
       </a>
       <div class="dropdown-menu">
       <a class="dropdown-item" href="dashboard.php">Dashboard</a>
         <a class="dropdown-item" href="logout.php">Logout</a>
       </div> 
     </li>';
      }
      else{

        echo '<li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
        ';
      }
      ?>
    
    </ul>
    <form action="search.php" method="POST" class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="search"placeholder="Enter your username" name="username" required  aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>
  </div>
</nav>
<div class="d-flex justify-content-center mt-5">
    <div class="col-md-10">
<form action="index.php" method="post">


  <table class="table" >
        <thead class="thead-dark">
            <tr>
                <th>Serial no.</th>
                <th>ID</th>
                <th>picture</th>
                <th>username</th>
                <th>email</th>
                <th>password</th>
                <th>Submite Date</th>
                <th>view</th>
                <th>Edit</th>
                <th>delete</th>
                <th><button type="submit" class="btn btn-danger" name="multiple_delete">multiple delete</button></th>
</tr>
          
</thead>

<?php


$i=0;
while ($row = mysqli_fetch_assoc($query)) {
    $id = $row['id'];
    $profile_pic = $row['profile_pic'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $submit_date = $row['submit_date'];
    $i++;
?> 
 <tbody>
      
      <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $id ?></td>
          <td><img src="<?php echo $profile_pic ?>" width="50px" height="50px"></td>
          <td><?php echo $username ?></td>
          <td><?php echo $email ?></td>
          <td><?php echo $password ?></td>
          <td><?php echo $submit_date ?></td>
          <td><a href="show.php?id=<?php echo $id ?>" class="btn btn-warning" type="submit">view</a></td> 
          <td><a href="edit.php?id=<?php echo $id ?>&profile_pic=<?php echo $profile_pic ?>" class="btn btn-primary" type="submit">Edit</a></td> 
          <td><a href="delete.php?id=<?php echo $id ?>&profile_pic=<?php echo $profile_pic ?>" class="btn btn-danger" type="submit">delete</a></td> 
          <td><center><input type="checkbox" name="check_data[]" class="center" value="<?php echo $id ?>"></center></td> 
      </tr>

      
  </tbody>

<?php
}
?>
</table>

</form>
 </div>

</div>



<script src="js/jquery.slim.min.js" 
></script>
    <script src="js/bootstrap.bundle.min.js" 
   ></script>
  </body>
</html>
