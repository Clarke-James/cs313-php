<?php include "./navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="navBar.css">
    <title>Tool Database</title>
</head>
<body>
    <form>
        Part Name: <input type="text"><br>
        Part Number: <input type="text"><br>
        Manufacturer: <input type="text"><br>
        Picture Name: <input type="text"><br>
        Location Type: <input type="text"><br>
        Location: <input type="text"><br>
    </form>
    
<?php
try
{
$dbUrl = getenv('DATABASE_URL');

$dbOpts = parse_url($dbUrl);

$dbHost = $dbOpts["host"];
$dbPort = $dbOpts["port"];
$dbUser = $dbOpts["user"];
$dbPassword = $dbOpts["pass"];
$dbName = ltrim($dbOpts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $ex)
{
echo 'Error!: ' . $ex->getMessage();
die();
}

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
foreach ($db->query('SELECT * FROM bushings AS b JOIN location AS l ON b.bushing_id = l.bushing_id;') as $row)
{
    echo 'Bushing ID: ' . $row['b.bushing_id'];
    echo '  Bushing Name: ' . $row['b.bushing_name'];
    echo '  Part Number: ' . $row['b.part_number'];
    echo '  Manufacturer: ' . $row['b.manufacturer'];
    echo '  Picture: ' . $row['b.picture_name'];

    echo ' Location Bushing ID: ' . $row['l.bushing_id'];
    echo '  Location Type: ' . $row['l.location_type'];
    echo '  Location: ' . $row['l.location'];
    echo '<br/>';
}
?>
?>



</body>
</html>
