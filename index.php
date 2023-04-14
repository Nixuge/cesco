<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include_once("db.php");
session_start()

?>
<html>
<head>

    <script>
              if(window.location.pathname.startsWith != "/cescosite/"){
                window.location.href = ".?page=home"

            }
        if (window.location.protocol != "https:") {
        window.location.protocol="https:";
    }
    
    </script>
	
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./style/style.css">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div id='settings_popup' class='settings_popup' style='display:none'>
    <div  class="settings">
		<form action="settings.php" method="post">
			<div class="top_settings">
				<div class="text_gear">
				<p class="settings_h1">Paramètres</p>
				<img class="gear" src="./img/gear.png" alt="gear icon">
				</div>
				<div class="line"></div>
			</div>

<?php
    include("./components/connection.html");
    include("./components/inscription.html");
    include("./components/settings.html");
?>



<div id="overlay"></div>
    <script src="js/inscriptionView.js" ></script>
    <script src="js/connectionView.js" ></script>
    <script src="js/settingsView.js" ></script>
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
    }else{
        include("./pages/cescosite.php");
    }
    


    ?>




</body>
</html>
