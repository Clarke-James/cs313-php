<?php include "./navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="navBar.css">
    <link rel="stylesheet" type="text/css" href="toolCss.css">
    <title>Tool Database</title>
</head>
<body>
<div id="formSearch">
    <form method="post" action="">
        <input type="search" name="part_number" placeholder="Search Part Number"><br>
        <input type="radio" name="location_type" value="1"> Show all owned by James<br>
        <input type="radio" name="location_type" value="2" > Show all owned by Richard<br>
        <input type="button" name="submit" value="Submit">
    </form>
</div>
<div id="formInput">
    <p>Input new part.</p>
    <form method="post" action="">
        <input type="text" name="part_name" placeholder="Part Name"><br>
        <input type="text" name="part_number" placeholder="Part Number"><br>
        <input type="text" name="manufacturer" placeholder="Manufacturer Name"><br>
        <input type="text" name="picture_name" placeholder="Image Name (jpg)"><br>
        <input type="radio" name="location_type" value="1"> Owned by James<br>
        <input type="radio" name="location_type" value="2" > Owned by Richard<br>
        <input type="text" name="location" placeholder="Location"><br>
        <input type="button" name="submit" value="Submit">
    </form>
</div>

<div id="dbOutput">
<?php
include "./db_connect.php";
echo '<table>';
echo '<tr><th>Bushing ID</th><th>Bushing Name</th><th>Part Number </th><th>Manufacturer</th><th>Location Type</th><th>Location</th></tr>';

foreach ($db->query('SELECT * FROM bushings AS b  JOIN location AS l ON b.bushing_id = l.bushing_id') as $row)
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
echo '</table>'

?>

</div>


</body>
</html>