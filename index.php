<!DOCTYPE html>
<?php session_start();?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Disscusion - Home</title>
</head>
<body>
<div class="container">
  <label class="btn btn-open" for="nav">OPEN NAV</label>
  <input type="checkbox" id="nav" class="nav-opener" />
  <div class="nav">
    <div class="nav-header">
      <div class="nav-title">MENU</div>
      <label class="btn btn-nav" for="nav">
        <svg style="width: 25px; height: 25px" viewBox="0 0 24 24">
        </svg>
        CLOSE
      </label>
      
    </div>
    
    <input type="radio" name="image" id="image1" class="nav-link-opener" checked="checked" />
 
<?php
if(isset($_SESSION['login']))
{
?>
    <ul class="nav-links">
      <a href=""><li class="nav-link"><label for="image1">Home</label></li></a>
      <a href="Discussion.php"><li class="nav-link"><label for="image4">Disscusion</label></li></a>
      <a href="deconnexion.php"><li class="nav-link"><label for="image4">Disconnect your page</label></li></a>      
    </ul>
<?php
}
else
{
?>
   <ul class="nav-links">
      <a href=""><li class="nav-link"><label for="image1">Home</label></li></a>
      <a href="connexion.php"><li class="nav-link"><label for="image2">Sign In</label></li></a>
      <a href="inscription.php"><li class="nav-link"><label for="image3">Sign Up</label></li></a>      
    </ul>
<?php
}
?>
    <div class="nav-images">
      <div class="nav-image image-1"></div>

 

<header>
<?php

if (isset($_SESSION['login']))
 {
?>

<?php 

}
else
 {
?>


<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="Inscription.php">Inscription</a></li>
        <li><a href="Connexion.php">Connexion</a></li>
        <li><a href="planning.php">Planning</a></li>
     </ul>
</nav>

<?php
 }
?>
</header>
 
      </form>
    </div>
  </div>
</div>
</body>
</html>