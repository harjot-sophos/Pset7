<?php

// configuration
require("../includes/config.php");

// if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// If the symbol doensn't exist, display error message
	$stock = lookup($_POST["symbol"]);
	 if($stock === false)
	 {
	 	apologize("No such stock available");
	 }
   render("quote_display.php", ["title" => "Quote", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => $stock["price"]]);


}
else
{
    
  // else render form
  render("quote_form.php", ["title" => "Quote"]);
}
?>