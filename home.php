<?php
    include("header.php");
    isLoggedIn();
    //session_destroy();
?>
<script>
    window.user = '<?php echo $_SESSION['loggedUser'];?>'

</script>

<?php
/*    $r = new HttpRequest('api/postapi.php', HttpRequest::METH_POST);
    $r->setOptions(array('cookies' => array('lang' => 'en')));
    $r->addPostFields(array( 'username' => $_SESSION['loggedUser'] ));
    try {
            echo $r->send()->getBody();

    } catch (HttpException $ex) {
            echo $ex;

    }*/
?>

   <div class="postCollection">
        <div class="postWrapper">
            <div class="postIt">
                <input class="title" maxlength="20" type="text" name="title">
                <input class="id" value=""  name"id" hidden='true'  type"text" />
                <hr/>
                <textarea class="post"></textarea>
            </div>
        </div>

    </div>
<?php
	include("footer.php");
?>
