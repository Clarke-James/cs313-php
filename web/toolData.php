<?php include "./navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tool Database</title>
</head>
<body>
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

echo "Database output";
$stmt = $db->prepare('SELECT * FROM bushings WHERE bushingId=:bushing_id AND bushingName=:bushing_name');
//AND partNumber=:part_number AND manufacturer=:manufacturer AND pictureName=:picture_name//
$stmt->execute(array(':bushingName' => $bushingName, ':bushingId' => $bushingId));
       // ':partNumber' => $partNumber, ':manufacturer' => $manufacturer,  ':pictureName' => $pictureName//));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($db->query('SELECT bushing_id, bushing_name FROM bushings') as $row)
{
    echo 'Bushing ID: ' . $row['bushing_id'];
    echo ' Bushing Name: ' . $row['bushing_name'];
    echo '<br/>';
}
?>


</body>
</html>
