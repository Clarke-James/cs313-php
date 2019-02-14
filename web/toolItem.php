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
    <title>Tool View</title>
</head>
<body>
    <?php

    if (isset($_POST['part_number'])){
        $partNumber = htmlspecialchars(strtoupper($_POST['part_number']));
    }
    if (isset($_POST['location_type'])) {
        $locType = $_POST['location_type'];
    }
    ?>
    <div id="searchOutput">
        <?php
        if (isset ($_POST['part_number'])){
        //echo $partNumber;
            $stmt = $db->query("SELECT * FROM bushings AS b JOIN location AS l ON b.bushing_id = l.bushing_id 
          WHERE part_number = '$partNumber'");
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo $results;
        }
        ?>
    </div>
<div id="dbOutput">
    
    <?php
    if (isset ($_POST['location_type'])){
        echo $locType;
    echo '<table>';
    echo '<tr><th>Bushing ID</th><th>Bushing Name</th><th>Part Number </th><th>Manufacturer</th><th>Location Type</th><th>Location</th></tr>';

    foreach ($db->query("SELECT * FROM bushings AS b  JOIN location AS l ON b.bushing_id = l.bushing_id 
          WHERE location_type = '$locType'")as $row)
    {
        echo '<tr>';
        echo '<td>' . $row['bushing_id'] . '</td>';
        echo '<td>' . $row['bushing_name'] . '</td>';
        echo '<td>' . $row['part_number'] . '</td>';
        echo '<td>' . $row['manufacturer'] . '</td>';
        echo '<td>' . $row['location_type'] . '</td>';
        echo '<td>' . $row['location'] . '</td>';
        echo '</tr>';
    }
        echo '</table>';
    }
    ?>
</body>
</html>