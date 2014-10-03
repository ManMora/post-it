<?php 
	include("header.php");
?>
	<div class="outerWrapper">
		<div class="loginWrapper">
			<form class="block-form" method="POST" action="main.php">      
                <h1 class="form-title">Log in</h1>
                <input type="mail" name= "mail" placeholder="E-Mail" id="mail"/>
                <input type="password" name= "password" placeholder="Password" id="mes"/>
	            <input type="submit" class="login centered-button" name="login" value="Submit" id="login"/>
	        </form>
		</div>
	</div>
<?php
	include("footer.php");
?>