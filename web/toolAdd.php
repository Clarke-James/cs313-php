<?php
include "./navbar.php";
include "./db_connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="navBar.css">
    <link rel="stylesheet" type="text/css" href="toolCss.css">
    <title>Tool Database</title>
</head>
<body>

<div id="dbOutput">
    <?php
    if (isset($_POST['part_number'])){
        $partNumber = htmlspecialchars(strtoupper($_POST['part_number']));
    }
    if (isset($_POST['location_type'])) {
        $locType = $_POST['location_type'];
    }
    if (isset($_POST['location'])) {
        $location = $_POST['location'];
    }
    if (isset($_POST['part_name'])) {
        $bName = $_POST['part_name'];
    }
    if (isset($_POST['manufacturer'])) {
        $manufacturer = $_POST['manufacturer'];
    }
    if (isset($_POST['picture_name'])) {
        $imgName = $_POST['picture_name'];

    }$  $newId = $pdo->lastInsertId(bushing_id_seq);

    $stmt = $db->prepare("INSERT INTO bushings(bushing_name, part_number, manufacturer, picture_name) 
          VALUES (:bushingName, :partNumber, :manufacturer, :pictureName) AND INSERT INTO location(bushing_id, location_type, location)
          VALUES ('$newId',:locationType, :location)");
    $stmt->bindValue(':bushingName', $bName, PDO::PARAM_STR);
    $stmt->bindValue(':partNumber', $partNumber, PDO::PARAM_STR);
    $stmt->bindValue(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $stmt->bindValue(':pictureName', $imgName, PDO::PARAM_STR);
    $stmt->bindValue(':locationType', $locType, PDO::PARAM_INT);
    $stmt->bindValue(':location', $location, PDO::PARAM_STR);
    $stmt->execute();

    $newPage = "toolData.php";
    header("Location: $newPage");
    die();
    ?>
</div>


</body>
</html>