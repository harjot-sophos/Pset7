<?php

    // configuration
    require("../includes/config.php"); 


 $id = $_SESSION["id"];
 
    // get user's portfolio
    $rows =CS50:: query("SELECT  id, symbol, shares FROM Portfolios WHERE id = ?", $id );
   
    // create new array to store all info for portfolio table
	$positions = [];

	// for each of user's stocks
	foreach ($rows as $row)	
	{   
		$stock = lookup($row["symbol"]);
	   if ($stock !== false)
	   {
	         	  $positions[] = [
		         "symbol" => $row["symbol"],
		         "price" => $stock["price"],
		         "name" => $stock["name"],
		         "shares" => $row["shares"],
		         "total"=> $row["shares"]*$stock["price"]
		         
		  ];
	   }
	}
	
	// Balance left with user 
	$users =CS50:: query("SELECT username, cash FROM users WHERE id = $id");
    
    // render portfolio
       render("portfolio.php", ["title" => "Positions", "positions" => $positions, "users" => $users, "price" => $stock["price"]]);
	

?>    
