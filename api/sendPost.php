<?php



include_once("../db.php");
include_once("./utils/isBadSentence.php");
session_start();
$CONTENT_TEXT_MAX_LENGHT = 1000;
$MAX_LENGHT_TITLE = 30;
if (isset($_SESSION['user'])) {
    if (isset($_POST['title'])) {

        $text = $_POST["data"];
        $title = $conn->real_escape_string(htmlspecialchars($_POST["title"]));
        $user = $_SESSION['userPK'];
        $clean_text = strip_tags($text);

        if(strlen($clean_text) > $CONTENT_TEXT_MAX_LENGHT || strlen($title) > $MAX_LENGHT_TITLE)
        {
            echo "Title or content is too long";
        }
        elseif ($clean_text == "" ) {
            echo "veuillez ajouter un contenu !";
        }
        else{
            $sql = "INSERT INTO aj_articles (title, content, USER_FK) VALUES ('$title', '$text', '$user')";
            if (mysqli_query($conn, $sql)) {

                header('Location: ../index.php?page=home');

            } else {
                echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
            }

        }


    }


} else {
    echo "<script>show_connection();</script>";
}
$conn->close();


?>

