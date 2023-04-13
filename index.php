<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include_once("db.php");
session_start()

?>
<html>
<head>

    <script>
              if(!window.location.pathname.startsWith("/cescosite/")){
                window.location.href = ".?page=home"

            }
        if (window.location.protocol != "https:") {
        window.location.protocol="https:";
    }
    
    </script>
	
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/inscriptionView.js" ></script>
    <script src="js/connectionView.js" ></script>
    <script src="js/settingsView.js" ></script>
	<title>Cescosite - Home</title>
	
</head>

<body>

<header>
  <div class="container"><h1 class="uptitle">CescoSite</h1></div>
  		
  		<div class="new_post">
    		<button onclick="window.location.href='?page=editor';" class="navigator"><p class="text_in_button">+ Nouveau Post</p></button>
	    </div>

	 	 <div class="profile">
	    	<button onclick="show_settings();" class="profile_photo_body"></button>
	 	 </div>
	    
	  	<div class="nav">
	    
	     
	    </div>


	       <div class="many_button">
	    
	      <button onclick="window.location.href='?page=home';" class="navigator"><p class="text_in_button">Home</p></button>
          

          <?php
                session_start();
                if (isset($_SESSION["user"])) {
                        echo "<button onclick=\"window.location.href='./api/deconect.php';\" class='navigator'><p class='text_in_button'>Deconnexion</p></button>";
                } else {
                        echo "<button onclick='show_connection();' class='navigator'><p class='text_in_button'>Connexion</p></button>";
                        echo "<button onclick='show_inscription();' class='navigator'><p class='text_in_button'>Inscription</p></button>";
                }
                ?>
                
	      <button onclick="window.location.href='?page=contact';" class="navigator"><p class="text_in_button">Contact</p></button>
	      <button onclick="window.location.href='?page=about';" class="navigator"><p class="text_in_button">A-propos</p></button>
		
		</div>

  		
</header>

<?php
    include("./components/connection.html");
    include("./components/inscription.html");
    include("./components/settings.html");
?>



<div id="overlay"></div>

<br><br>

    <?php

    
    $page = $_GET["page"];

 
    if ($page == "donate") {
        include("./pages/donnate.html");
    }elseif ($page == "about") {
        include("./pages/about.html");
    }elseif ($page == "contact") {
        include("./pages/contact.php");
    }elseif ($page == "editor") {
        include("./pages/editor.php");
    }elseif ($page == "home") {
        include("./pages/cescosite.php");
    }elseif($page =="connection"){
        echo "<script>show_connection();</script>";
    }elseif($page =="inscription"){
        echo "<script>show_inscription();</script>";
    }elseif($page =="settings"){
        echo "<script>show_settings();</script>";
    }else{
        include("./pages/cescosite.php");
    }
    


    ?>




</body>
</html>
