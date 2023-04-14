<?php
include_once("./db.php");



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

    $sqlC = "SELECT username FROM aj_Users WHERE users_PK = " . $chatData[$i]["USER_FK"];

    $creator = $conn->query($sqlC)->fetch_assoc()["username"];
    $chatData[$i]["username"] = $creator;
}


header('Content-Type: application/json; charset=utf-8');

echo json_encode($chatData);


?>