<?php
include_once("../db.php");

function getChatData($conn){
    $sql = "SELECT content, USER_FK, dat, CHAT_PK  FROM aj_chat";

    $result = $conn->query($sql);
    $MAX_MESSAGES = 20;
    
    $chatData = [];
    while ($row = $result->fetch_assoc()) {
    
        $chatData[] = $row;
    
    
    
    
    }
    
    if (count($chatData) > $MAX_MESSAGES) {
        $sql = "DELETE FROM aj_chat WHERE CHAT_PK = count($chatData)-1";
        mysqli_query($conn, $sql);
    }
    
    for ($i = 0; $i < count($chatData); $i++) {
    
        $sqlC = "SELECT username FROM aj_users WHERE users_PK = " . $chatData[$i]["USER_FK"];
    
        $creator = $conn->query($sqlC)->fetch_assoc()["username"];
        $chatData[$i]["username"] = $creator;
    }
    return $chatData;    
}



header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

while(true) {
  // Récupérer les données du chat depuis la base de données ou un fichier, etc.
  $chatData = getChatData($conn);
  
  // Envoyer les données au client sous forme de flux
  echo "event: chatUpdate\n";
  echo "data: " . json_encode($chatData) . "\n\n";

  // Attendre pendant un certain temps avant d'envoyer une nouvelle mise à jour
  sleep(1);
}

?>