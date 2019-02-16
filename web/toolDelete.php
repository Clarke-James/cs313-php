<?php
require "./db_connect.php";

if (isset($_POST['part_number'])){
    $partNumber = ($_POST['part_number']);
}
if (isset($_POST['bushing_id'])){
    $bushingId = ($_POST['bushing_id']);
}

$stmt = $db->prepare("DELETE FROM location WHERE bushing_id = $bushingId");
$stmt->execute();

$stmt2 = $db->prepare("DELETE FROM bushings WHERE part_number = '$partNumber'");
$stmt2->execute();

$newPage = "toolData.php";
header("Location: $newPage");
die();
?>