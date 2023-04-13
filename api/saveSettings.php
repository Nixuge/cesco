

<?php
	
	include_once("./db.php");
	include_once("./utils/isBadUsername.php");
	include_once("./utils/alert.php");
	session_start();
	if(isset($_SESSION['user']) == FALSE){
		echo "<script>show_connection();</script>";
	}
	$userPK = $_SESSION['userPK'];
	
	
	if (isset($_POST["newPseudo"])) {

	
		$newPseudo = $conn -> real_escape_string($_POST["newPseudo"]);

		if(isBadUsername($newPseudo)){
			alert( "ERREUR : Votre pseudo contient des mots interdits");

		}else{
			$sql = "UPDATE aj_Users SET username = '$newPseudo' WHERE users_PK = '$userPK'";
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
			

			$sql = "SELECT username FROM aj_Users WHERE users_PK = '$userPK' AND passwd = MD5(MD5('$OldPasswd'))";

			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
			if ($result->num_rows > 0) {
				//old passwd OK:
				$sql = "UPDATE aj_Users SET passwd = MD5(MD5('$NewPasswd')) WHERE users_PK = '$userPK'";

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

	echo "<script>window.location.href='index.php' </script>";
?>


