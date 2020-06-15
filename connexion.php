<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'discussion') 
or die('Could not connect!');

if (isset($_POST['go']))
{
  if (!empty($_POST['username']))
  {
    if (!empty($_POST['password']))
   {
      $myusername = mysqli_real_escape_string($db, $_POST['username']);
      $mypassword = mysqli_real_escape_string($db, $_POST['password']);

      $sql = "SELECT password FROM utilisateurs WHERE login = '$myusername'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result);
       
      if(password_verify($_POST['password'], $row['password']))
      {
        $_SESSION["login"]=$myusername;
        header('Location:index.php');
      }
      else
      {
          echo "Your Login Name or Password is invalid!";
      }
    }
    else{
      echo "Type your password!";
    }
  }
  else{
    echo "Type your password!";
  }
}

//  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //       echo "The email address '$email' is valid.";
  //     } else {
//         echo "The email address '$email' not valid.";
//     }
//     $missed = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";

//     if(preg_match($missed, $email))  {
  //       echo "Email address '$email' valied.";
  //     } else {
    //         echo "address email '$email' valied.";
    
  // ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Sign In-</title>
</head>
<body>
  <header>
  <div class="topnav">
	<a class="" href="index.php">Home</a>
	<a href="inscription.php">Sign Up</a>
	<a href="inscription.php">Sign In</a>
	<a href="deconnexion.php">Disconnect your page</a>
	</div>
  </header>
    
  <form method="POST">
  <h1>Member Log in</h1>
  <div class="inset">
  <p>
    <label for="text">username</label>
    <input type="text" name="username" id="username" require>
    <label for="text">PASSWORD</label>
    <input type="password" name="password" id="email">

  </p>
  </div>




    <input type="submit" name="go" id="go" value="Log in">
  </p>
</form>
</body>
</html>



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
