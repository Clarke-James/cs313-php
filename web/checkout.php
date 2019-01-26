<?php session_start();  ?>
<!DOCTYPE html>
<html>
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="cartCss.css">
       <title>Checkout</title>
       <div id="title">
            <h1>Confirmation of Order</h1>
       </div>       

   </head>
   <body>
       
   <form action="confirmation.php" method="post">
       <div id="confirmation">
       <p>Please enter your shipping information.</p>
       Name: <input type="text" name="name"><br>
       E-mail: <input type="email" name="email"><br>
       Address: <input type="text" name="address"><br>
       City: <input type="text" name="city"><br>
       State: <input type="text" name="state"><br>    
       Zip Code: <input type="text" name="zipCode"><br>
       </div>
       <div id="conSubmit">
       <input type="submit" formaction="confirmation.php">
       </div>
   </form>
       <div id="back2Cart">
       <button>
           <a id="rtnCart" class="active" href="viewCart.php">Return to Cart</a>
       </button>
       </div>
   </body>
</html> 