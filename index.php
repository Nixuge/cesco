<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include_once("db.php");
session_start();


?>
<html>
<head>

    <script>
    
        if (window.location.protocol != "https:") {
        window.location.protocol="https:";
    }
    
    </script>
	
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/setUpIndex.js" defer></script>
	<link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" type="text/css" href="./style/chat.css">
    <link rel="stylesheet" type="text/css" href="./style/posts.css">
    <link rel="stylesheet" type="text/css" href="./style/general.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CESCO - Home</title>
	<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script>
  function addDarkmodeWidget() {
    const options = {
        label: '🌓'
    }
    new Darkmode(options).showWidget();
  }
  window.addEventListener('load', addDarkmodeWidget);
</script>

</head>

<body>

<header class="darkmode-ignore">
  <div class="container"><h1 class="uptitle">CESCO</h1></div>
  		



	    
	  	<div class="nav">
	    <?php
            if (isset($_SESSION["user"])) {
                echo "
                <div class='new_post'>
                    <button onclick='window.location.href=\'?page=editor\';' class='navigator'><p class='text_in_button'>+ Nouveau Post</p></button>
                </div>
                ";
                echo "
                <div class='profile'>
                    <img onclick='show_settings();' class='profile_photo_body' id='profile_pict'/>
                </div>
                ";
            }
	     ?>
	    </div>


	       <div class="many_button">
	    
	      <button onclick="window.location.href='?page=home';" class="navigator"><p class="text_in_button">Home</p></button>
          

          <?php
               
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
    <script src="js/inscriptionView.js" ></script>
    <script src="js/connectionView.js" ></script>
    <script src="js/settingsView.js" ></script>
  </div>

  <?php

    
    $page = $_GET["page"];
   
 
    if ($page == "donate") {
        include("./pages/donnate.html");
    }elseif ($page == "about") {
        include("pages/about.html");
    }elseif ($page == "contact") {
        include("./pages/contact.php");
    }elseif ($page == "editor") {
        include("./pages/editor.html");
    }elseif ($page == "home") {
      include("./pages/cesco.html");
    }
    elseif($page == "test"){
        include("test.html");
    }else{
        include("./pages/cesco.html");
    }
    
    

  ?>

</body>

<input style="visibility: hidden;" type="text" id='user_pk' value=<?php 
                      
                      echo $_SESSION['userPK'];
             
               
      
      ?>>
</html>
