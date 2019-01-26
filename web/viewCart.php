<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="cartCss.css">
       <title>ViewCart</title>
       <div id="title">
            <h1>Shopping Cart</h1>
       </div>
   </head>
   <body>
    <?php

    if (isset($_POST['pen1'])){
        $_SESSION{'pen1'} = $_POST['pen1'];
    }
    if (isset($_POST['pen2'])){
        $_SESSION{'pen2'}  = $_POST['pen2'];
    }
    if (isset($_POST['pen3'])){
        $_SESSION{'pen3'}  = $_POST['pen3'];
    }
    if (isset($_POST['pen4'])){
        $_SESSION{'pen4'}  = $_POST['pen4'];
    }
    ?>
<div id="itemNames">
<form action="checkout.php" method="post">
<table>
    <tr>
        <th>Item Name</th>
        <th></th>
    </tr>
<ul id="cartItemName">
    <tr>
        <td>
            <?php
    if ($_SESSION['pen1'] != ""){
        echo $_SESSION['pen1'];
        echo"</td><td>";
        echo "<button type=\"submit\" name=\"pen1\" value=\"\" formaction=\"viewCart.php\">Remove Item</button>";
    }
    ?>
        </td>
    </tr>
    <tr>
        <td>
    <?php
    if ($_SESSION['pen2'] != ""){
        echo $_SESSION['pen2'];
        echo "</td><td>";
        echo "<button type=\"submit\" name=\"pen2\" value=\"\" formaction=\"viewCart.php\">Remove Item</button>";
    }
    ?>
        </td>
    <tr>
        <td>
    <?php
    if ($_SESSION['pen3'] != ""){
        echo $_SESSION['pen3'];
        echo "</td><td>";
        echo "<button type=\"submit\" name=\"pen3\" value=\"\" formaction=\"viewCart.php\">Remove Item</button>";
    }
    ?>
        </td>
    <tr>
        <td>
    <?php
    if ($_SESSION['pen4']!= ""){
        echo $_SESSION['pen4'];
        echo "</td><td>";
        echo "<button type=\"submit\" name=\"pen4\" value=\"\" formaction=\"viewCart.php\">Remove Item</button>";
    }
    ?>
        </td>
    <tr>
   
</table>
    <div id="checkOut">
    <button  type="submit" name="checkout" value="checkout" formaction="checkout.php">Checkout</button>
    </div>
</form>
</div>

<form action="browseItems.php" method="post">
    <div id="backProduct">
        <button type="submit" name="back" value="Back" formaction="browseItems.php">Continue Shopping</button>
    </div>
</form>
   </body>
</html> 