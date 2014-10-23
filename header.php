<!DOCTYPE html>
<?php
session_start();
function knowifisLoggedIn(){
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<header>
			<ul id="navBar">
				<li class="left-bar"><h1>Post-It!</h1></li>
                <li class="right-bar">
                    <?php
                      if (isset($_SESSION['loggedUser'])):?>
                        <form method="post" action="main.php" >
                          <input name="logout"  type="submit" value="Logout" />  
                        </form>
                        <li class="right-bar"><p><?php echo 'Bienvenid@, '.$_SESSION['loggedUser']?></p></li>
                    <?php endif;
                    ?>
                </li>
				

			</ul>
		</header>
