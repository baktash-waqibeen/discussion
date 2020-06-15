<?php
$db = mysqli_connect('localhost','root','','discussion')
or die ("Could not connect!");

if(isset($_POST["Submit"])){

   $login = $_POST['login'];
   $name = $_POST ['prenom'];
   $last = $_POST['nom'];
   $email = $_POST['email'];
   $password = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]); 
   $confirm_password = $_POST['password_confirm'];
   $request = "INSERT INTO utilisateurs (login,prenom,nom,password,email) VALUES ('$login','$name','$last','$password','$email');";
   $query=mysqli_query($db,$request);  
  
   }
   // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   //    echo "The email address '$email' is valid.";
   //  } else {
   //      echo "The email address '$email' not valid.";
   //  }
   //  $missed = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";

   //  if(preg_match($missed, $email))  {
   //    echo "Email address '$email' valied.";
   //  } else
   //   {
   //      echo "address email '$email' valied.";


?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <title>Discussion - Sign In</title>
   </head>
      
   <body id="signup">
      <header>
  <div class="topnav">
	<a class="index.php" href="#home">Home</a>
	<a href="inscription.php">Sign Up</a>
	<a href="connexion.php">Sign In</a>
	<a href="deconnexion.php">Disconnect your page</a>
	</div>
      </header>
      <form action="" method="POST">
      <h1>Member Log in</h1>
      <div class="inset">
         <p>
         <label for="text">login</label>
            <input type="text" name="login" id="" require>
            <label for="text">First Name</label>
            <input type="text" name="prenom" id="" require>
            <label for="text">Last Name</label>
            <input type="text" name="nom" id="" require>
            <label for="email">Email</label>
            <input type="email" name="email" id="" require>
            <label for="password">Password</label>
            <input type="password" name="password" id="" require>
            <label for="password">Password_Confirm</label>
            <input type="password" name="password_confirm" id="" require>
               <input type="submit" name="Submit" id="go" value="Submit" require>
               
            </p>
         </div>
      </form>
      </html>
   </body>

   <style>
  .topnav {
  background-color: #333;
  overflow: hidden;
}

.topnav a {
  float: left;
  color: yellow;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}


</style>
