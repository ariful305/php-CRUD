<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
 
    <form action="check.php" method="POST" >
      <h1>Log in</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label ><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="username" required >        
        <label ><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" required >
       
      </div>
      <button type="submit" name="submit" value="submit">log in</button>
      
    </form>


  </body>
</html>

