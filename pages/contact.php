<?php
    $mess = $_POST["message"];



    session_start();
    $user = $_SESSION["user"];




    $destinataire = 'asterjdm@protonmail.com';
    mail($destinataire, 'Message de '.$user , $_SERVER['REMOTE_ADDR'].$mess);

    echo "Votre message a bien été envoyé !";


    header('Location: .?page=home');



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>

</head>

<body>
<section class = "mail">

        <h2>Contacter AsterJdM :</h2>

        <form action="contact.php" method="post">  
        
            <textarea name="message" id="message" class="intext" minlength="1"></textarea>
            <br>
            <button class="send" type="submit">ENVOYER</button>
        
        </form>


    </section>
</body>
</html>
