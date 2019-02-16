<?php
require "./db_connect.php";

if (isset($_POST['part_number'])){
    $partNumber = htmlspecialchars(strtoupper($_POST['part_number']));
}
if (isset($_POST['location'])) {
    $location = htmlspecialchars(strtoupper($_POST['location']));
}
if (isset($_POST['bushing_id'])){
    $unSafe_bushingId = htmlspecialchars(strtoupper($_POST['bushing_id']));
    //http://www.php.net/manual/en/function.pg-escape-string.php
    $bushingId = pg_escape_string($unSafe_bushingId);
}

$stmt2 = $db->prepare("UPDATE location SET location = '$location' WHERE bushing_id = $bushingId");
//$stmt2->bindValue(':bushingId', $bushingId, PDO::PARAM_INT);
//$stmt2->bindValue(':location', $location, PDO::PARAM_STR);
$stmt2->execute();

$newPage = "toolData.php";
header("Location: $newPage");
die();