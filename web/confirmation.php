<?php session_start();  ?>
<!DOCTYPE html>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="cartCss.css">
       <title>Purchase Confirmation</title>
       <h1>Confirmation of order</h1>
   </head>
   <body>
       <p>Shipping Information:</p>
   <?php
   echo "Name: ";
   echo htmlspecialchars($_POST['name']);
   echo "<br>";
   echo "Address: ";
   echo htmlspecialchars($_POST['address']);
   echo "<br>";
   echo "City: ";
   echo htmlspecialchars($_POST['city']);
   echo "<br>";
   echo "State: ";
   echo htmlspecialchars($_POST['state']);
   echo "<br>";
   echo "Zip code: ";
   echo htmlspecialchars($_POST['zipCode']);
   echo "<br>";
   echo "Email: ";
   echo htmlspecialchars($_POST['email']);
   echo "<br> <p>You ordered the following pens: <br>";
   if ($_SESSION['pen1'] != ""){
       echo $_SESSION['pen1'];
       echo "<br>";
   }
   if ($_SESSION['pen2'] != ""){
       echo $_SESSION['pen2'];
       echo "<br>";
   }
   if ($_SESSION['pen3'] != ""){
       echo $_SESSION['pen3'];
       echo "<br>";
   }
   if ($_SESSION['pen4'] != ""){
       echo $_SESSION['pen4'];
       echo "<br>";
   }
   echo "</p>";
   ?>
   </body>
</html> 