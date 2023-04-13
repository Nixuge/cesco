

  


<?php
include_once("./db.php");
include_once("./utils/alert.php");
if (isset($_POST['username']))
{



  $username = $conn -> real_escape_string($_POST['username']);

  $passwd =  hash("sha256", $_POST['passwd'])  ; 
  
  $sql = "SELECT passwd, username, users_PK, is_validate FROM aj_Users WHERE username = '$username' AND passwd = '$passwd'";
  //echo $sql ;

  
  if (!mysqli_query($conn, $sql)) {
    echo mysqli_error($conn);

  }
  
  


  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  



  
  if ($result->num_rows > 0) {
    if($row['is_validate'] == 1) {
      session_start();
      $_SESSION["user"] = $username;
      $_SESSION["userPK"] = $row["users_PK"];
      
      header('Location: .?page=home');
    }
    else {
      alert("Veuillez vérifiez votre mail.");
    }
    

  } else {
    alert( "Le mot de passe et le nom d'utulisateur doivent être juste... .");
  }

  $conn->close();
}
?> 

