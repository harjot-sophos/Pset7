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
    // if the amount to buy valid    
        if (empty($_POST["shares"]) || !is_numeric($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("Please enter the whole amount of shares!");
        }
      $id = $_SESSION["id"];
	  $stock = $_POST["stock"];
	  $shares = $_POST["shares"];
	   

	  
	 // upper case 
	 $symbol = strtoupper($stock);
	  
    //Look for the stock entered
        $input = lookup($symbol);
       if($input === false)
        {
            apologize("Entered stock symbol was invalid.");
        }
        else
        {
            $price = $input["price"];
	 		$cash = CS50:: query("SELECT cash FROM users WHERE id = $id");
	 		$cost = $price*$shares; 
	 		
	 		if($cost > $cash[0]["cash"])
		 	{
		 		apologize("You don't have enough money to buy ". $shares . " shares from " . $symbol.".");
			}
		 	else
		 	{
		 	    if(cs50:: query ("SELECT * FROM Portfolios WHERE user_id = $id and symbol =?", strtoupper($stock["symbol"])))
		 	    {
		 	        CS50::query("INSERT INTO Portfolios (user_id, symbol, shares) VALUES($id, ?, $shares)ON DUPLICATE KEY UPDATE shares = shares + $shares",strtoupper($stock));
		 	    }
		 	    else
		 	    {
		 	        CS50::query("INSERT INTO Portfolios (user_id, symbol, shares) VALUES($id, ?, $shares)",strtoupper($stock));
		 	    }
		 	 
		 	 
		 	  CS50:: query("UPDATE users SET cash = cash - ? WHERE id =?",$cost, $id);
		 	 
			CS50::	query("INSERT INTO history (user_id, symbol, type, volume) VALUES($id, ?, 'BUY', $shares)",$symbol);
             redirect("/");
           }
        }
    
}
else
{
  // else render form
  render("buy_form.php", ["title" => "Buy"]);
}

?>