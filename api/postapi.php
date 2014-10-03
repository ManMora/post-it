<?php

isLoggedIn();

function openDB($route,$username,$password,$db){

    $con=mysqli_connect($route,$username,$password,$db);
    if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();

    }else{

        return $con;
    }
}

function isLoggedIn(){

    if(!isset($POST['username'])){

        $con = openDB("localhost","root","","postdb");
        $mail = "manu.mora.24@gmail.com";
        var_dump(getSingle($con,28));
    }else{

    http_response_code(403);

    }
    closeDB($con);

}

function closeDB($db){

    mysqli_close($db);

}

function updatePost($con,$id,$title,$content){

    $query = "UPDATE post SET Title='".$title."', Content='".$content."' WHERE ID = ".$id;
    var_dump($query);
    $result = mysqli_query($con,$query);
    return $result;

}

function createPost($con,$mail,$title,$content){
    $query = "INSERT INTO post VALUES('','".$title."','".$content."','".$mail."')";
    //var_dump($query);
    $result = mysqli_query($con,$query);

}

function deletePost($con,$id){

    $query = "DELETE FROM post WHERE ID = ".$id;
    //var_dump($query);
    $result = mysqli_query($con,$query);
    return $result;
}

function getSingle($con,$id){

    $query = "SELECT * FROM post WHERE ID =".$id;
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result)) {
        $post['title'] = $row['Title'];
        $post['content'] = $row['Content'];

    }
    return $post;

}

function getAllPosts($con,$mail){
    $posts = array();

    $result = mysqli_query($con,"SELECT * FROM post WHERE Mail ='".$mail."'");
    // var_dump("SELECT * FROM post WHERE Mail = `".$mail."`");
    while($row = mysqli_fetch_array($result)) {
          $post['title'] = $row['Title'];
          $post['content'] = $row['Content'];
          array_push($posts,$post);
    }
    return $posts;

}



?>
