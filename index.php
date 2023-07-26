<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CESCO</title>
    <link rel="stylesheet" type="text/css" href="style/global.css">
    <link rel="stylesheet" type="text/css" href="style/post.css">
    <link rel="stylesheet" type="text/css" href="style/newPostEditor.css">
    <link rel="stylesheet" type="text/css" href="style/signup.css">
    <!-- <script src="script/hide_show_navigation_panel.js" defer ></script> -->
</head>
<body>
    <header onclick="window.location.href='index.php?page=home'">
        <h1 class="cesco-title">CESCO</h1>
    </header>

    <?php
    session_start();

    $page = $_GET["p"];

    if($page == "home"){
        include_once("pages/home.html");
    }elseif($page == "newPost"){
        include_once("pages/newPostEditor.php");
    }elseif($page == "signup"){
        include_once("pages/signup.html");
    }elseif($page == "signin"){
        include_once("pages/signin.php");
    }else{
        include_once("pages/home.html");
    }

    ?>

    <div class="bottom">
        <footer id="foot">
        <div class="main-buttons">
            <?php
            if (!isset($_SESSION["userId"])) {
                echo '<button onclick="window.location.href=\'index.php?p=signin\'" class="main-button" id="butConnect">Connexion</button>';
                echo '<button onclick="window.location.href=\'index.php?p=signup\'" class="main-button" id="butInscript">Inscription</button>';

            }else{
                echo '<button onclick="window.location.href=\'api/disconnect.php\'" class="main-button" id="butConnect">Déco</button>';
            }
            ?>

            <button onclick="window.location.href='index.php?p=newPost'" class="new-post">+</button>
            <button onclick="window.location.href='index.php?p=home'" class="main-button">Home</button>


        </div>

        </footer>
    </div>
</body>
</html>