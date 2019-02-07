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

foreach ($db->query('SELECT bushing_id, bushing_name, part_number, manufacturer, picture_name FROM bushings') as $row)
{
    echo 'Bushing ID: ' . $row['bushing_id'];
    echo '  Bushing Name: ' . $row['bushing_name'];
    echo '  Part Number: ' . $row['part_number'];
    echo '  Manufacturer: ' . $row['manufacturer'];
    echo '  Picture: ' . $row['picture_name'];
    echo '<br/>';
}

echo '<br/>';
foreach ($db->query('SELECT bushing_id, location_type, location FROM location') as $row)
{
    echo 'Bushing ID: ' . $row['bushing_id'];
    echo '  Location Type: ' . $row['location_type'];
    echo '  Location: ' . $row['location'];
    echo '<br/>';
}

echo '<br/>';
$stmt = $db->prepare('SELECT * FROM bushings WHERE bushing_id=:bushing_id AND bushing_name=:bushing_name');
$stmt->bindValue(':bushing_id', $bushing_id, PDO::PARAM_INT);
$stmt->bindValue(':bushing_name', $bushing_name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo $rows[$bushing_name];
?>

</div>


</body>
</html>
