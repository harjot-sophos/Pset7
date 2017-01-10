<?php

// configuration
require("../includes/config.php");

// if form is submitted 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // if the user has specified stock symbol
        if (empty($_POST["stock"]))
        {
            apologize("Please enter the stock symbol.");
        }
    // if the amount to sell valid    
        if (empty($_POST["shares"]) || !is_numeric($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("Please enter the whole amount of shares!");
        }
      $id = $_SESSION["id"];
	  $stock = $_POST["stock"];
	  $shares = $POST["shares"];
    //Look for the stock entered
     $stock = lookup($_POST["stock"]);
        
}
?>