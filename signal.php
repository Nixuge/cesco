<?php



$id = $_GET["id"];

$destinataire = 'asterjdm@protonmail.com';

mail($destinataire, 'Signalement de l\'article : '.$id , "L'article avec l'id : ".$id." a été signalé");


header('Location: #art'.$id);

?>