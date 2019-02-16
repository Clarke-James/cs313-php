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
        //http://www.php.net/manual/en/function.pg-escape-string.php
        $partNumber = pg_escape_string($unSafe_partNumber);
    }

    if (isset ($_POST['part_number'])){




        foreach ($db->query("SELECT * FROM bushings AS b  JOIN location AS l ON b.bushing_id = l.bushing_id 
                WHERE part_number = '$partNumber'")as $rows)
        {
            echo "Allowed Changes for part number: " . $rows['part_number'] . "<br>";
            echo "<form method='post' action='toolChanges.php'>";
            echo "<input type='hidden' name='part_number' value='" . $rows['part_number'] . "'><br>";
            echo "<input type='text' name='location'  placeholder='" . $rows['location'] . "'> Location<br>";
            echo "<input type='hidden' name='bushing_id' value='" . $rows['bushing_id'] . "'><br>";
            echo "<input type='submit'' value='Update Location' formaction='toolChanges.php'>";
            echo "<input type='submit'' value='Delete Tool' formaction='toolDelete.php'>";
            echo '</form>';
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
