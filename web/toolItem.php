<?php
include "./navbar.php";
require "./db_connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="stylesheet" type="text/css" href="navBar.css">
    <link rel="stylesheet" type="text/css" href="toolCss.css">
    <script type="text/javascript" src="toolJS.js"></script>
    <title>Tool View</title>
</head>
<body>
    <?php

    if (isset($_POST['part_number'])){
        $unSafe_partNumber = htmlspecialchars(strtoupper($_POST['part_number']));
    }
    ?>
    <div id="searchOutput">
        <?php
        if (isset ($_POST['part_number'])){

            //http://www.php.net/manual/en/function.pg-escape-string.php
            $partNumber = pg_escape_string($unSafe_partNumber);

            foreach ($db->query("SELECT * FROM bushings AS b  JOIN location AS l ON b.bushing_id = l.bushing_id 
                WHERE part_number = '$partNumber'")as $rows)
            {

                echo 'Name: ' . $rows['bushing_name'] . '<br>';
                echo 'Part Number: ' . $rows['part_number'] . '<br>';
                echo 'Manufacturer: ' . $rows['manufacturer'] . '<br>';
                echo 'Owner: ' . $rows['location_type'] . '<br>';
                echo 'Location: ' . $rows['location'] . '<br>';
                echo '<img id="bushings" src = "/images/' . $rows['picture_name'] . '"><br>';
            }
            if (!$rows){
                echo 'Part not found in database.';
            }
        }
        ?>
        <a href="toolData.php" class="button">Return to Main</a>
    </div>
</body>
</html>