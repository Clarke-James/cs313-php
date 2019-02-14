<?php
include "./navbar.php";
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
    }

    
    ?>
</div>


</body>
</html>