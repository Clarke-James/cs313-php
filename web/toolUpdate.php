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
<div id="searchOutput">
    <?php

    if (isset($_POST['part_number'])){
        $unSafe_partNumber = htmlspecialchars(strtoupper($_POST['part_number']));
    }

    if (isset ($_POST['part_number'])){

        //http://www.php.net/manual/en/function.pg-escape-string.php
        $partNumber = pg_escape_string($unSafe_partNumber);

        foreach ($db->query("SELECT * FROM bushings AS b  JOIN location AS l ON b.bushing_id = l.bushing_id 
                WHERE part_number = '$partNumber'")as $rows)
        {
            echo "<form method='post' action='toolAdd.php'>";
            echo "<input type='text' name='part_name' placeholder='" . $rows['bushing_name'] . "'> Name<br>";
            echo "<input type='text' name='part_number' placeholder='". $rows['part_number'] . "'> Part Number<br>";
            echo "<input type='text' name='manufacturer' placeholder='" . $rows['manufacturer']. "> Manufacturer<br>";
            echo "<input type='text' name='picture_name' placeholder='" . $rows['picture_name'] . "> Image name<br>";
            echo "<input type='text' name='location_type' placeholder='" . $rows['location_type'] . "> 1 = James, 2 = Richard<br>";
            echo "<input type='text' name='location' placeholder='" . $rows['location'] . "'> Location<br>";
            echo "<input type='submit'' value='Update Tool' formaction='toolAdd.php'>";
            echo '</form>';

            //echo 'Name: ' . $rows['bushing_name'] . '<br>';
            //echo 'Part Number: ' . $rows['part_number'] . '<br>';
            //echo 'Manufacturer: ' . $rows['manufacturer'] . '<br>';
            //echo 'Owner: ' . $rows['location_type'] . '<br>';
            //echo 'Location: ' . $rows['location'] . '<br>';
            //echo 'Picture Name: ' . $rows['picture_name'] . '"><br>';
            //echo '<img src = "/images/' . $rows['picture_name'] . '"><br>';

        }
        if (!$rows){
            echo 'Part not found in database.';
            $newPage = "toolData.php";
            header("Location: $newPage");
            die();
        }
    }
    ?>
</div>

</body>
</html>
