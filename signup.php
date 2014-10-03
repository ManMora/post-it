<?php 
	include("header.php");
?>
	<div class="outerWrapper">
		<div class="loginWrapper">
			<form class="block-form" method="POST" action="main.php">      
                <h1 class="form-title">Sign Up</h1>
                	<input type="mail" name= "mail" placeholder="E-Mail" id="mail"/>
                    <input type="text" name= "name" placeholder="Name" id="name"/>
                    <input type="password" name= "password" placeholder="Password" id="mes"/>
	                <input type="submit" class="login centered-button" name="signup" value="Register" id="signup"/>
	        </form>
		</div>
	</div>
<?php
	include("footer.php");
?>