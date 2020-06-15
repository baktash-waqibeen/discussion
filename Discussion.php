<?php
session_start();

if(!isset($_SESSION['login'])){
header('Location: connexion.php');
}

$login = $_SESSION['login'];
$db = mysqli_connect('localhost','root','','discussion') or die('Could not connect');
$req_login = "SELECT id FROM utilisateurs WHERE login='$login'";
$execute_req_login = mysqli_query($db, $req_login);
$resultat_req_login = mysqli_fetch_array($execute_req_login);
$id = $resultat_req_login['id'];

if(isset($_POST['send']))
{
	$message = $_POST['message'];
	$date = date('Y-m-d H:i:s');
	$requete="INSERT INTO `messages` (`id`,`message`,`id_utilisateur`,`date`) VALUES (NULL, '$message', '$id', '$date')";
	$query = mysqli_query($db, $requete);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="css/login.css">

</head>

	<body>
	<header>

	<div class="topnav">
	<a class="index.php" href="#home">Home</a>
	<a href="inscription.php">Sign Up</a>
	<a href="deconnexion.php">Disconnect your page</a>
	</div>
	</header>
	<main>
	<div class="box">
	<a href="#" class="btn btn-white btn-animation-1"></a> 
	</div>

	<section>
		<?php
			$db = mysqli_connect('localhost','root','','discussion');
			$request="SELECT login,date,message FROM `messages` INNER JOIN utilisateurs ON utilisateurs.id = messages.id_utilisateur";
			$query = mysqli_query($db, $request);
			$allmessage = mysqli_fetch_all($query);
			
			foreach($allmessage as $onemessage)
			{
				?>
					<article class="msg-section0">
					<div>
				<?php
//for user//
					echo "$onemessage[0]";
				?> 
					</div>
				</article>
				
				<article class="msg-section1">
					<div>
						<?php
					
//for date//
					echo "$onemessage[1]";
				?>
					</div>
					</article>

					<article class="msg-section2">
					<div>
				<?php
//for messeges//
					echo "$onemessage[2]";
				?>
					</div>
					</article>
				
				<?php
			}
		
		?>
	</section>		

	</main>

	<footer>
		

		<footer id="footer">
		<form action="" method="post">
			<input class="inputone" class="footer" name="message" type="text">
			<input class="submitone" type="submit" name="send" value="Send message">
		</form>
		


	</footer>
<body id ="background3">
<div id="all">
	</div>
	
</footer>
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



	
.inputone {
	width: 80%;
	height: 30%;
	border-radius: 10px;
	padding: 2%;
	color: black;
}

.submitone {
	padding: 1%;	
	
}
body{
	background:url('resources/images/startup-593327_960_720.webp');
	background-attachment: fixed;
	background-size: 100% 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 1000px;

    }
    header{
        height: 80px;
    }
    main{
		margin-top: 100px;
		margin-bottom: 300px;
    }
.footer {
    display: flex;
    width: 80%;
    height: 30%;
    background-color: white;
    margin-right: 40px;
    border-radius: 15px;
	font-size: 30px;
	font-family: cursive;
	color: black;
}

.msg-section0 {
	width: 10%;
	height: 30px;
	display: flex;
	margin-left: 30%;
	background-color: whitesmoke;
	border-radius: 10px;
	justify-content: center;
	margin-top: 10px;
	font-weight: bold;
	font-family:sans-serif;
}
.msg-section1{
	width: 10%;
	height: 30px;
	display: flex;
	margin-left: 30%;
	background-color: green;
	border-radius: 10px;
	justify-content: center;
	margin-top: 10px;
	font-weight: bold;
	font-family:sans-serif;
	
}

.msg-section2{
	width: 35%;
	height: 100px;
	display: flex;
	justify-content: center;
	text-align: center;
	margin: 0 auto;
	background-color: blue;
	text-align: bottom;
	margin-top: 50px;
	border-radius: 10px;
	
}

}
.commentsection	{
	display: flex;
	height: 60%;
	width: 50%;
	justify-items: center;
	border-radius: 20px;
	margin:0;
	color: black;
	


	}
</style>


<style>
 

@import url('https://fonts.googleapis.com/css?family=Inconsolata|Lato:300,400,700');
html, body, h1, h2, h3, h4, h5, h6, p, li, ol, ul, pre {
	margin: 0;
	padding: 0;
}
html, body { min-height: 100%; }

code {
	background: #fff1;
	font-family: 'Inconsolata', monospace;
	padding: .2em .4em;
}

.content {
	background-color: #fff;
	border-radius: 8px;
	box-sizing: border-box;
	color: #666;
	font-size: 1.6em;
	line-height: 1.4em;
	margin: 20px auto;
	margin-top: 80px;
	padding: 20px;
	width: 100%;
	max-width: 800px;
}
.content ul {
	margin: .5em 2em;
	padding: 0;
}

#footer {
	background-color: #246c;
	background-image: linear-gradient(to bottom, transparent, #0009);
	border-top: 1px solid #fff3;
	box-shadow: inset 0 1px 0 #fff3, 0 0 32px #000;
	overflow: hidden;
	padding: 8px;
	position: fixed;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 9001;
	width: 80%;
	height: 10%;

}
#footer a {
	color: #85c6f6;
	padding: 1em 0;
	text-decoration: none;
}
#footer ul {
	display: flex;
	list-style: none;
	justify-content: center;
	font-size: 2em;
	font-weight: 300;
}
#footer ul li {
	padding: 0 .5em;
}

/* Appearance */
.links {
	background-color: #123;
	background-image: linear-gradient(to bottom, #0003, transparent);
	border-bottom: 1px solid #0003;
	box-shadow: 0 0 32px #0003;
	font-size: 2em;
	font-weight: 300;
}
.links > a {
	color: #9ab;
	padding: .75em;
	text-align: center;
	text-decoration: none;
	transition: all .5s;
}
.links > a:hover {
	background: #ffffff06;
	color: #adf;
}
.links > .line {
	background: #68a;
	height: 1px;
	pointer-events: none;
}

/* The Magic */
#header {
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
}
.links {
	display: grid;
	grid-template-columns: repeat(var(--items), 1fr);
	position: relative;
}
.links > .line {
	opacity: 0;
	transition: all .5s;
	position: absolute;
	bottom: 0;
	left: var(--left, calc(100% / var(--items) * (var(--index) - 1)));
	width: var(--width, calc(100% / var(--items)));
	--index: 0;
}
.links > a:hover ~ .line {
	opacity: 1;
}

.links > a:nth-of-type(1):hover ~ .line { --index: 1; }
.links > a:nth-of-type(2):hover ~ .line { --index: 2; }
.links > a:nth-of-type(3):hover ~ .line { --index: 3; }
.links > a:nth-of-type(4):hover ~ .line { --index: 4; }
.links > a:nth-of-type(5):hover ~ .line { --index: 5; }
.links > a:nth-of-type(6):hover ~ .line { --index: 6; }
.links > a:nth-of-type(7):hover ~ .line { --index: 7; }
.links > a:nth-of-type(8):hover ~ .line { --index: 8; }
.links > a:nth-of-type(9):hover ~ .line { --index: 9; }
.links > a:nth-of-type(10):hover ~ .line { --index: 10; }
.links > a:last-of-type:hover ~ .line { --index: var(--items); }
</style>


<style>
with
</style>
<!-- </style>


<style>
body{
  background:lightblue;
  text-align:center;
  box-sizing:border-box;
  font-family:"Lato",Sans-serif;
/*   position:relative; */
}

.box{
  position:absolute;
  top:50%;
  left:50%;
  transform : translate(-50% ,-50%);
}

.btn:link,
.btn:visited{

  text-decoration: none;
  text-transform:uppercase;
  position:relative;
  top:360px;
  left:500px;
  padding:20px 40px;
  border-radius:100px;
  display:inline-block;
  transition: all .5s;
  
  
}

.btn-white{
  background:#fff;
  color:#000;
}

.btn:hover{
   box-shadow:0px 10px 10px rgba(0,0,0,0.2);
   transform : translateY(-3px);
}

.btn:active{
  box-shadow:0px 5px 10px rgba(0,0,0,0.2)
  transform:translateY(-1px);

}

.btn-bottom-animation-1{
  animation:comeFromBottom 1s ease-out .8s;

}

.btn::after{
  content:"";
  text-decoration: none;
  text-transform:uppercase;
  position:absolute;
  width:100%;
  height:100%;
  top:0;
  left:0;
  border-radius:100px;
  display:inline-block;
  z-index:-1;
  transition: all .5s;
}

.btn-white::after {
    background: #fff;
}

.btn-animation-1:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}

@keyframes comeFromBottom{
  0%{
    opacity:0;
    transform:translateY(40px);
  } 
  100%{
    opacity:1;
    transform:translateY(0);
  }

  

</style>
