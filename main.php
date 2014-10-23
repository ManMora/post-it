<?php
    include("api/postapi.php");
    session_start();

    function logout(){

        session_destroy();

    }

    if(isset($_POST['logout'])){
        logout();
        header('Location:login.php');
    }

    if ((isset($_POST['signup'])) && ($_POST['signup'] == 'Register')){
        //Valida nulo
        if ($_POST['mail'] != null && $_POST['name'] != null && $_POST['password'] != null){
            //Valida Mail
            if (checkEmail($_POST['mail'])){
                //Valida Password
                if (strlen($_POST['password']) > 6){

                    $con = openDB("manmora.com","team5","team5","team5");
                   
                    createUser($con, $_POST['mail'], $_POST['name'], $_POST['password']);
                    closeDB($con);
                    header('Location:login.php');
                    //Muestra Post-its
                    
                }else{
                    //Password incorrecto
                    echo 'password';
                }
            }else{
                //Email incorrecto
                echo 'email';
            }

        }else{
            //Datos incompletos
            echo 'incompletos';
        }
    }

    if((isset($_POST['login'])) && ($_POST['login'] == 'Submit')){

        $mail = $_POST['mail'];

        $password = md5($_POST['password']);
        //if is in DB
        $con = openDB("manmora.com","team5","team5","team5");
        $nombre = getName($con,$mail);
        
        $valid = isValid($con, $mail, $password);
        
        closeDB($con);
        if($valid == 1)
        {
            $_SESSION['loggedUser'] = $nombre;
            $_SESSION['mail'] = $mail;
            //echo $_SESSION['loggedUser'];
            header('Location:home.php');
        }else{
            $_SESSION['invalid'] = true;
            header('Location:login.php');
        }
    }
?>
