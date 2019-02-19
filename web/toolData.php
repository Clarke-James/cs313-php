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
    <title>Tool Database</title>
</head>
<body>

<div id="title">
    <h1>Bushings for Pens</h1>
</div>
    <div id="formSearch">
        <form method="post" action="toolItem.php">
            <input type="search" name="part_number" placeholder="Search Part Number"><br>
            <input class="button" type="submit" value="Search" formaction="toolItem.php">
        </form>
        <a href="toolAllData.php" class="button buttonView">View Database</a>
    </div>

    <div id="formOwner">
        <form method="post" action="toolViewOwner.php">
            <input type="radio" name="location_type" value="1"> Show all owned by James<br>
            <input type="radio" name="location_type" value="2" > Show all owned by Richard<br>
            <input class="button" type="submit" value="Show Owned" formaction="toolViewOwner.php">
        </form>
    </div>

    <div id="formInput">
        <p>Input new part.</p>
        <form method="post" action="toolAdd.php">
            <input required type="text" name="part_name" placeholder="Part Name"><br>
            <input required type="text" name="part_number" placeholder="Part Number"><br>
            <input type="text" name="manufacturer" placeholder="Manufacturer Name"><br>
            <input type="text" name="picture_name" placeholder="Image Name (part number.jpg)"><br>
            <input type="radio" name="location_type" value="1"> Owned by James<br>
            <input type="radio" name="location_type" value="2" > Owned by Richard<br>
            <input required type="text" name="location" placeholder="Location"><br>
            <input class="button" type="submit" value="Add Item" formaction="toolAdd.php">
        </form>
    </div>

    <div id="formUpdate">
        <form method="post" action="toolUpdate.php">
            <p>Update location or Delete bushings.</p>
            <input type="search" name="part_number" placeholder="Search by Part Number"><br>
            <input class="button" type="submit" value="Update location" formaction="toolUpdate.php">
        </form>
    </div>
</body>
</html>