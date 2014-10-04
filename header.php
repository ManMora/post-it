<!DOCTYPE html>
<?php
session_start();
function isLoggedIn(){

    if (!isset($_SESSION['loggedUser'])){
       //var_dump($_SESSION);
        header('Location:login.php');
    }

}

?>
<html>
	<head>
		<title>Post-It</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<header>
			<ul id="navBar">
				<li class="left-bar"><h1>Post-It!</h1></li>
                <li class="right-bar">
                    <form method="post" action="main.php" >
                        <input name="logout"  type="submit" value="Logout" />
                   </form>
                </li>
				<li class="right-bar"><p>Username</p></li>

			</ul>
		</header>
