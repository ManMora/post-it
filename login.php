<?php
	include("header.php");
?>
	<div class="outerWrapper">
		<div class="loginWrapper">
			<form class="block-form" method="POST" action="main.php">
                <h1 class="form-title">Log in</h1>
                <?php
                	if(isset($_SESSION['invalid']))
						{
							echo "Te chingaste";
						}
                ?>
                <input type="email" name= "mail" placeholder="E-Mail" id="mail" required/>
                <input type="password" name= "password" placeholder="Password" id="mes" required/>
	            <input type="submit" class="login centered-button" name="login" value="Submit" id="login"/>
	            <h4>Or</h4>
	            <input type="button" id="link"name="linkSignUp" value="Sign Up" onclick="window.location.href='signup.php'"/>
	        </form>
		</div>
	</div>
<?php
	include("footer.php");
?>
