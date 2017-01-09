<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    render("portfolio.php", ["title" => "Portfolio"]);

 $id = $_SESSION["id"];
 
    // get user's portfolio
    $rows =	query("SELECT * FROM portfolios WHERE id = ?", $id );
   
    // create new array to store all info for portfolio table
	$portfolios = [];

	// for each of user's stocks
	foreach ($rows as $row)	
	{   $stock = lookup($row["symbol"]);
	   if ($stock !== false)
	   {
	         	  $portfolios[] = [
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
       render("portfolio.php", ["title" => "Portfolios", "portfolios" => $portfolios, "users" => $users]);
	
	
	
?>    
