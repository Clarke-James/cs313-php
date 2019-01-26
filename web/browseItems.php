<?php session_start();

?>
<!DOCTYPE html>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="cartCss.css">
       <title>Browse Items</title>
       
   </head>
   <?php include "./navbar.php"; ?>
   <body>
       <div id="title">
            <h1>Pens and Pencils</h1>
       </div>
   <?php

       // Set session variables
   if (empty($_SESSION)) {
       $_SESSION['pen1'] = "";
       $_SESSION['pen2'] = "";
       $_SESSION['pen3'] = "";
       $_SESSION['pen4'] = "";
   }
    if (isset($_POST['pen1'])){
        $pen1 = $_POST['pen1'];
    }
    if (isset($_POST['pen2'])){
        $pen2 = $_POST['pen2'];
    }
    if (isset($_POST['pen3'])){
        $pen3 = $_POST['pen3'];
    }
    if (isset($_POST['pen4'])){
        $pen4 = $_POST['pen4'];
    }
   ?>
   <form action = "viewCart.php" method="post">
       <div id="image1"><img src="SteamPunk.jpg" alt="Steam Punk Pen."></div>
            <div id="checkBox1"><input type="checkbox" name="pen1" value="Steam Punk Pen" <?php if ($_SESSION['pen1'] == "Steam Punk Pen")
            {echo "checked";}?> >Steam Punk Pen</div><br>

        <div id="image2"><img src="Electric.jpg" alt="Electric Pen."></div>
           <div id="checkBox2"><input type="checkbox" name="pen2" value="Electric Circuit Pen" <?php if ($_SESSION['pen2'] == "Electric Circuit Pen")
            {echo "checked";}?> >Electric Circuit Pen</div><br>

        <div id="image3"><img src="CivilWar.jpg" alt="Civel War Pen"></div>
                       <div id="checkBox3"><input type="checkbox" name="pen3" value="Civil War Pen" <?php if ($_SESSION['pen3'] == "Civil War Pen")
                        {echo "checked";}?> >Civil War Pen</div><br>

        <div id="image4"><img src="clickSet.jpg" alt="Click Set"></div>
            <div id="checkBox4"><input type="checkbox" name="pen4" value="Click Pen and Pencil Set" <?php if ($_SESSION['pen2'] == "Click Pen and Pencil Set")
            {echo "checked";}?> >Click Pen and Pencil Set</div><br>
        <div id="sendCart">
        <button type="submit" name="submit" value="Submit" formaction="viewCart.php">View Cart</button>
        </div>
   </form>

   </body>
</html>