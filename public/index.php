<?php

    // configuration
    require("../includes/config.php"); 


 $id = $_SESSION["id"];
 
    // get user's portfolio
    $rows =	query("SELECT * FROM portfolios WHERE id = ?", $id );
   
    // create new array to store all info for portfolio table
	$positions = [];

	// for each of user's stocks
	foreach ($rows as $row)	
	{   $stock = lookup($row["symbol"]);
	   if ($stock !== false)
	   {
	         	  $positions[] = [
		         "symbol" => $row["symbol"],
		         "name" => $stock["name"],
		         "shares" => $row["shares"],
		         "total"=> $row["shares"]*$stock["price"]
		         
		  ];
	   }
	}
	
	// Balance left with user 
	$cash = query("SELECT username, cash FROM users WHERE id = $id");
    
    // render portfolio
       render("portfolio.php", ["title" => "Positions", "positions" => $positions, "users" => $users]);
	

?>    
