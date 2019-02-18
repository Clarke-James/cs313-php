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
    <title>Tool Owner View</title>
</head>
<body>
    <div id="dbOutput">

        <?php
        if (isset($_POST['location_type'])) {
            $locType = $_POST['location_type'];
        }
        echo '<table>';
        echo '<tr><th>Bushing Name</th><th>Part Number </th><th>Manufacturer</th><th>Location</th></tr>';

        foreach ($db->query("SELECT * FROM bushings AS b  JOIN location AS l ON b.bushing_id = l.bushing_id 
          WHERE location_type = '$locType'")as $row)
        {
            echo '<tr>';
            echo '<td>' . $row['bushing_name'] . '</td>';
            echo '<td>' . $row['part_number'] . '</td>';
            echo '<td>' . $row['manufacturer'] . '</td>';
            echo '<td>' . $row['location'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
        <a href="toolData.php" class="button buttonView">Return to Main</a>
    </div>
</body>
</html>