<?php
    include("api/postapi.php");
    include("header.php");
    isLoggedIn();
    //session_destroy();
?>
<script>
    window.user = '<?php echo $_SESSION['mail'];?>'

</script>
 <div class="postCollection">
<?php
    $con = openDB("manmora.com","team5","team5","team5");
    $posts = getAllPosts($con,$_SESSION['mail']);
    
    foreach($posts as $post): ?>
        
        
  
        <div class="postWrapper">
            <div class="postIt">
                <input value="<?php echo $post['title']; ?>" class="title" maxlength="20" type="text" name="title">
                <input class="id" value="<?php echo $post['id']; ?>"  name"id" hidden='true'  type"text" />
                <hr/>
                <textarea class="post"><?php echo $post['content']; ?></textarea>
            </div>
        </div>


        
    <?php endforeach; ?>
 

  
        <div class="postWrapper">
            <div class="postIt">
                <input class="title" maxlength="20" type="text" name="title">
                <input class="id" value=""  name"id" hidden='true'  type"text" />
                <hr/>
                <textarea class="post post-end"></textarea>
            </div>
        </div>

    </div>
<?php
	include("footer.php");
?>
