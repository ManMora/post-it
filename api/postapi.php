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

    $con = openDB("manmora.com","team5","team5","team5");
    
    if(isset($_POST['postoperation']) && $_POST['postoperation'] == '1'){
    if(isset($_POST['mail'])){
        if(isset($_POST['postid']) && $_POST['postid'] != '' ){
            $id = $_POST['postid'];
            updatePost($con,$id,$_POST['posttitle'],$_POST['postcontent']);
            echo $id;
        }else{
           echo  createPost($con,$_POST['mail'],$_POST['posttitle'],$_POST['postcontent']);

            http_response_code(200);

        }

        }else{

        http_response_code(413);

        }

    }else if(isset($_POST['postoperation']) && $_POST['postoperation'] == '2'){
        if($_POST['mail'] != ""){
            if(checkEmail($mail)){
                //Mail con formato
                $con = openDB("manmora.com","team5","team5","team5");
                $valid = validMail($con, $mail);
                if( $valid == 0 ){
                    //Email libre 
                    echo "0";
                }else{
                    //Email ocupado
                    echo "2";
                }
            }else{
                //Mail sin formato
                echo "1";
            }
        }else{

        }
    }else{

    }
    closeDB($con);

}

function closeDB($db){

    mysqli_close($db);

}

function updatePost($con,$id,$title,$content){
    $title = preg_quote($title, '/');
    $content = preg_quote($content, '/');
    $query = "UPDATE post SET Title='".$title."', Content='".$content."' WHERE ID = ".$id;
    //var_dump($query);
    $result = mysqli_query($con,$query);
    return $result;

}

function createPost($con,$mail,$title,$content){
    $query = "INSERT INTO post VALUES('','".$content."','".$title."','".$mail."')";
    //var_dump($query);
    $result = mysqli_query($con,$query);
    return $con->insert_id;
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

function getName($con, $mail){
    $query = "SELECT Nombre FROM user WHERE MAIL = '".$mail."' LIMIT 1";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)){
        $user['nombre'] = $row['Nombre'];
        $user['mail'] = $row['Mail'];
    }
    return $user['nombre'];
}

function getAllPosts($con,$mail){
    $posts = array();

    $result = mysqli_query($con,"SELECT * FROM post WHERE Mail ='".$mail."'");
    // var_dump("SELECT * FROM post WHERE Mail = `".$mail."`");
    while($row = mysqli_fetch_array($result)) {
          $post['title'] = $row['Title'];
          $post['content'] = $row['Content'];
          $post['id'] = $row['ID'];
          array_push($posts,$post);
    }
    return $posts;

}

function createUser($con, $mail, $name, $password){
    $password = md5($password);
    
    $query = "INSERT INTO user VALUES('".$name."','".$password."','".$mail."',1)";
    $result = mysqli_query($con, $query);
    
}

function deleteUser($con, $mail){
    $query = "UPDATE user SET Active=0 WHERE MAIL = '". $mail ."'";
    $result = mysqli_query($con, $query);
    
    //var_dump($query);
    return $result;
}

function updateUser($con, $mail, $name, $password){
    $password = md5($password);
    $query = "UPDATE user SET Nombre = '" . $name . "', Password = '" . $password . "' WHERE Mail = '". $mail . "'";
    $result = mysqli_query($con, $query);
    return $result;
}

function readUser($con, $mail){
    $query = "SELECT * FROM user WHERE MAIL = '".$mail."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)){
        $user['nombre'] = $row['Nombre'];
        $user['mail'] = $row['Mail'];
    }
    return $user;
}

function checkEmail($email) {
        if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
            list($username,$domain)=split('@',$email);
            if(!checkdnsrr($domain,'MX')) {
                return false;
            }
            return true;
        }
        return false;
    }

function isValid($con, $mail, $password){
    $query = "SELECT Mail FROM user WHERE MAIL = '".$mail."' AND PASSWORD = '".$password."' LIMIT 1";
    $result = mysqli_query($con, $query);
    return $result->num_rows;
}

function validMail($con, $mail){
    $query = "SELECT Nombre FROM user WHERE MAIL = '".$mail."' LIMIT 1";
    $result = mysqli_query($con, $query);
    return $result->num_rows;
}

?>
