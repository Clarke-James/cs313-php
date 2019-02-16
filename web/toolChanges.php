<?php
require "./db_connect.php";

if (isset($_POST['part_number'])){
    $partNumber = htmlspecialchars(strtoupper($_POST['part_number']));
}
if (isset($_POST['location_type'])) {
    $locType = htmlspecialchars($_POST['location_type']);
}
if (isset($_POST['location'])) {
    $location = htmlspecialchars(strtoupper($_POST['location']));
}
if (isset($_POST['part_name'])) {
    $bName = htmlspecialchars($_POST['part_name']);
}
if (isset($_POST['manufacturer'])) {
    $manufacturer = htmlspecialchars($_POST['manufacturer']);
}
if (isset($_POST['picture_name'])) {
    $imgName = htmlspecialchars($_POST['picture_name']);
}
if (isset($_POST['bushing_id'])) {
    $bushingId = htmlspecialchars($_POST['bushing_id']);
}

$stmt = $db->prepare("UPDATE bushings SET bushing_name = ':bushingName', manufacturer = ':manufacturer', picture_name = ':pictureName' WHERE part_number = '$partNumber'");
$stmt->bindValue(':bushingName', $bName, PDO::PARAM_STR);
$stmt->bindValue(':manufacturer', $manufacturer, PDO::PARAM_STR);
$stmt->bindValue(':pictureName', $imgName, PDO::PARAM_STR);
$stmt->execute();

$stmt2 = $db->prepare("UPDATE location SET location_type = ':locationType', location = ':location' WHERE bushing_id = '$bushingId'");
$stmt2->bindValue(':locationType', $locType, PDO::PARAM_INT);
$stmt2->bindValue(':location', $location, PDO::PARAM_STR);
$stmt2->execute();

$newPage = "toolData.php";
header("Location: $newPage");
die();