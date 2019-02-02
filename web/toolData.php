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
?>


<?php

echo "Database output";
$stmt = $db->prepare('SELECT * FROM bushings WHERE bushingId=:bushing_id AND bushingName=:bushing_name');
//AND partNumber=:part_number AND manufacturer=:manufacturer AND pictureName=:picture_name//
$stmt->execute(array(':bushingName' => $bushingName, ':bushingId' => $bushingId));
       // ':partNumber' => $partNumber, ':manufacturer' => $manufacturer,  ':pictureName' => $pictureName//));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
</body>
</html>
