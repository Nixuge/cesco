

<?php
	
	include_once("../db.php");
	include_once("../utils/isBadUsername.php");
	include_once("../utils/alert.php");
	session_start();
	if(isset($_SESSION['user'])){
		
		$userPK = $_SESSION['userPK'];
		
		
		if ($_POST["newPseudo"] != "") {

		
			$newPseudo = $conn -> real_escape_string($_POST["newPseudo"]);

			if(isBadUsername($newPseudo)){
				alert( "ERREUR : Votre pseudo contient des mots interdits");

			}else{
				$sql = "UPDATE aj_users SET username = '$newPseudo' WHERE users_PK = '$userPK'";
				if (mysqli_query($conn, $sql)) {
					alert("Votre pseudo a été mis a jour.");
				}else{
					alert( "Erreur : " . $sql . "<br>" . mysqli_error($conn));
				}
			}
			
		}

		if($_POST['newPass'] != ""){
			if (isset($_POST['oldPass']) && isset($_POST['newPass'])) {
				$OldPasswd = $conn -> real_escape_string($_POST['oldPass']) ; 
				$NewPasswd = $conn -> real_escape_string($_POST['newPass']) ; 
				

				$sql = "SELECT username FROM aj_users WHERE users_PK = '$userPK' AND passwd = MD5(MD5('$OldPasswd'))";

				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				
				if ($result->num_rows > 0) {
					//old passwd OK:
					$sql = "UPDATE aj_users SET passwd = MD5(MD5('$NewPasswd')) WHERE users_PK = '$userPK'";

					if (mysqli_query($conn, $sql)) {
						alert("Votre mot de passe a été mis a jour.");
					}else{
						alert("Erreur : " . $sql . "<br>" . mysqli_error($conn));
					}

				}else{
					alert( "Ancien mot de passe incorrect");
				}
			
			}

		}
		alert(isset($_FILES["pdp"]) == TRUE);
		if(isset($_FILES["pdp"]) && $_FILES["pdp"]["error"] == UPLOAD_ERR_OK){
		
			$allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
			$detectedType = exif_imagetype($_FILES["pdp"]["tmp_name"]);
			if (!in_array($detectedType, $allowedTypes)) {
				$error = "Le fichier téléchargé n'est pas une image valide.";
				alert($error);
			}
			$maxFileSize = 10 * 1024 * 1024; // 10 Mo
			if ($_FILES["pdp"]["size"] > $maxFileSize) {
				$error = "La taille de fichier dépasse la limite autorisée de 10 Mo.";
				alert($error);
			}

			$uploadDir = "../uploads/";
			$fileName = $_SESSION["userPK"] . ".png";
			$uploadPath = $uploadDir . $fileName;
			
			if (!move_uploaded_file($_FILES["pdp"]["tmp_name"], $uploadPath)) {
				$error = "Erreur lors de l'enregistrement du fichier.";
				alert($error);
			}else{
				alert("Votre photo de profil, à bien été mise à jour.");
			}
		
			
		}

		echo "<script>window.location.href='../index.php' </script>";
	}
?>


