<?php
include_once("./utils/alert.php");
include_once("../db.php");
include_once("./utils/isBadUsername.php");
session_start();


if (isset($_POST['username']))
{
    $username = $conn -> real_escape_string(htmlspecialchars($_POST['username']));
    $passwd = hash("sha256", $_POST['passwd'] ) ; 
    $mail =  $_POST["mail"];
    

    if(str_replace(' ', '', $_POST["mail"] == "") || str_replace(' ', '', $_POST['passwd'] == "") || !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
    alert( "Veuillez saisir un nom d'utilisateur, un mot de passe ainsi que un email valide.");
    }else{
        if(isBadUsername($username)){
            alert( "Votre nom d'utulisateur contient des mot interdis.");
        }else{
            $mail_hash = hash('sha256', $mail);
            $sql = "SELECT username FROM aj_Users WHERE username = '$username'";
            $sqlM = "SELECT mail FROM aj_Users WHERE mail = '$mail_hash' and is_validate = 1";
            //echo $sql ; 
            $result = $conn->query($sql);
            $resultM = $conn->query($sqlM);
    
            if ($result->num_rows > 0 ) {
                alert( "Ce nom d'utilisateur est déja utilisé, veuillez en choisir un autre...");
                
            }elseif($resultM->num_rows > 0){

                alert("Ce mail est déja utilisé.");
            }else{
        
            //send verification email :

                $subject = "Code de vérification";
                $code = rand(100000000, 9999999999) ;
                $message = "<p>Salut ".$username.", <br><br> Voici votre liens de vérification : <p><a href='https://rmbi.ch/cescosite/pages/mailverify.php?code=$code&user=$username'>rmbi.ch/cescosite/pages/mailverify.php</a>";
                
                    $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    
                        
                
                
                if (mail($mail, $subject, $message, $headers)) {
                    $mail_hash = hash('sha256', $mail);
                    $code_hash = hash('sha256', $code);
                    $sql = "INSERT INTO aj_Users (username, passwd, mail, is_validate, verif_code) VALUES ('$username', '$passwd', '$mail_hash', 'no', '$code_hash')";
                
            
                    if (mysqli_query($conn, $sql)) {
                        
                        alert("Veuillez vérifier votre mail.");
                        
                        
                    
        

                    
                        
                    }else{
                        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
                    }
        
                    
                    

                } else {
                    alert("error : L'envoi du code de vérification a échoué. Erreur : ".error_get_last());
                }



        
                    
            }

        }
    }
    echo "<script>window.location.href='index.php' </script>";

} 
    
    



?>          






