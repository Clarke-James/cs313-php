<?php
require "./db_connect.php";

if (isset($_POST['part_number'])){
    $partNumber = ($_POST['part_number']);
}
if (isset($_POST['location'])) {
    $location = htmlspecialchars(strtoupper($_POST['location']));
}
if (isset($_POST['bushing_id'])){
   $bushingId = ($_POST['bushing_id']);
}

$stmt = $db->prepare("UPDATE location SET location = :location WHERE bushing_id = $bushingId");
$stmt->bindValue(':location', $location, PDO::PARAM_STR);
$stmt->execute();

$newPage = "toolData.php";
header("Location: $newPage");
die();
?>
