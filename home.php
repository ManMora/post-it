<?php
    include("header.php");
    isLoggedIn();
    //session_destroy();
?>
   <div class="postCollection">
        <div class="postWrapper">
            <div class="postIt">
                <input class="title" maxlength="20" type="text" name="title">
                <hr/>
                <textarea class="post"></textarea>
            </div>
        </div>

    </div>
<?php
	include("footer.php");
?>
