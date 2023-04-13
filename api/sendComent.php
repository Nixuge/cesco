



<?php




include_once("./utils/db.php");
include_once("./utils/isBadSentence.php");
session_start();

if(isset($_SESSION["user"])){
    $content = $conn -> real_escape_string(htmlspecialchars($_POST["textC"]));
    $articlePK = $_POST["articlePK"];
    $user = $_SESSION["userPK"];


    if (isBadSentence($content) == False) {
        $sql = "INSERT INTO aj_coments (content, USER_FK, ARTICLE_FK) VALUES ('$content', '$user', '$articlePK')";

        if (mysqli_query($conn, $sql)) {



         //   header('Location: #' . "art" . $articlePK);

        } else {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }


    }else{
        echo ("SOYEZ RESPECTUEUX !");
    }

}else{
    header('Location: .?page=connection');
}






?>