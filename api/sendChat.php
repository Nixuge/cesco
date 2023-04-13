
<html>

<?php
$CHAT_LIMIT = 10;



session_start();
include_once("./db.php");
include_once("./utils/isBadSentence.php");


if(isset($_POST['text'])){

    if(isset($_SESSION['user'])){
        
        
        $text = $conn -> real_escape_string(htmlspecialchars($_POST["text"]));
        $user = $_SESSION['userPK'];
        

        if($text !== "")
        {
            if(isBadSentence(strtolower($_POST["text"])) == FALSE){
                
                $sql = "INSERT INTO aj_chat (content, USER_FK) VALUES ('$text', '$user')";
            




                if (mysqli_query($conn, $sql)) {


                 
        
                }else{
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
                }

            }

        }


    }else{
     
        echo "<script>show_connection();</script>";

    }
}
?>







</html>
