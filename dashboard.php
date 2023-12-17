<?php 
session_start();

if (isset($_SESSION['username'])) {

  if ((time() - $_SESSION['current_timestamp'] ) > 60 ) {

    header('location:logout.php');
    
      }
   
}
else {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="css/bootstrap.css"> 
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        <?php echo "{$_SESSION['username']}";?>
        </a>
        <div class="dropdown-menu">
         
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div> 
      </li>

    </ul>
    <form action="search.php" method="POST" class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="search"placeholder="Enter your username" name="username" required  aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>
  </div>
</nav>
<h1>
        
        welcome to dashboard <?php echo "{$_SESSION['username']}";?>
       
        
</h1>
<script src="js/jquery.slim.min.js" 
></script>
    <script src="js/bootstrap.bundle.min.js" 
   ></script>

  </body>
</html>

