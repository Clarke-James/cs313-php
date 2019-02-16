<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tool View</title>
</head>
<body>
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
//$stmt = $db->prepare("SELECT bushing_id FROM bushings WHERE part_number = '$partNumber''");
//$stmt->execute();
//$bushingId = $stmt[0];
echo $bushingId;
$stmt = $db->prepare("UPDATE location SET location = '$location' WHERE bushing_id = $bushingId");
$stmt->execute();

//$newPage = "toolData.php";
//header("Location: $newPage");
//die();
?>
</body>
</html>