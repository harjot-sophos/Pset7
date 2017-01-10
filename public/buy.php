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
	  $shares = $_POST["shares"];
	  
	 // upper case 
	  $symbol = strtoupper($stock)
	  
    //Look for the stock entered
     $sbuy= lookup($symbol);
       if ($sbuy=== false)
        {
            apologize("Entered stock symbol was invalid.");
        }
        else
        {
          $price = $sbuy["price"];
	 		$cash = CS50:: query("SELECT cash FROM users WHERE id = $id");
	 		$cost = $price*$shares; 
	 		
	 		if($cost > $cash[0]["cash"])
		 	{
		 		apologize("You don't have enough money to buy ". $shares . " shares from " . $symbol.".");
			}
		 	else
		 	{
		 	  CS50::  query("INSERT INTO Portfolios (id, symbol, shares) VALUES($id, '$symbol', $shares) 
		 	  ON DUPLICATE KEY UPDATE shares = shares + $shares");
		 	 
		 	  CS50:: query("UPDATE users SET cash = cash - $cost WHERE id = $id");
		 	 
		 	  render("../templates/buy.php", ["title" => "Buy", "stock" => $symbol, "cost" => $cost, "shares" => $shares]);
		    }
        }
    
}
else
{
  // else render form
  render("buy_form.php", ["title" => "Buy"]);
}

?>