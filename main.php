<?php

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

    if ((isset($_POST['signup'])) && ($_POST['signup'] == 'Register')){
        //Valida nulo
        if ($_POST['mail'] != null && $_POST['name'] != null && $_POST['password'] != null){
            //Valida Mail
            if (checkEmail($_POST['mail'])){
                //Valida Password
                if (strlen($_POST['password']) > 6){
                    

                    //Muestra Post-its
                    header('Location:home.php');
                }else{
                    //Password incorrecto
                    header('Location:signup.php');
                }
            }else{
                //Email incorrecto
                header('Location:signup.php');
            }

        }else{
            //Datos incompletos
            header('Location:signup.php');
        }
    }

?>