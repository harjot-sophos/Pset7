<?php
    // configuration
    require("../includes/config.php"); 
    
    // if form is submitted
 if($_SERVER["REQUEST_METHOD"] == "POST")
  {	
     // if the user gave input
    if(empty($_POST["stock"]))
	{
		apologize("Please enter the symbol of the stock you want to sell");
	}
	else
	{
		$id = $_SESSION["id"];
		$stock = $_POST["stock"];
		
		$value = lookup("$stock");
	 	$shares = $shares[0]["shares"];
	 	$price = $value["price"];
	 	$profit = $shares*$price;
	 	
	 	// Delete the stock from the user's portfolio 
	   $delete = CS50:: query("DELETE FROM portfolio WHERE id = $id AND symbol = '$stock'");
	   
	   //update the balance in the user's portfolio
	   $update = CS50:: query("UPDATE users SET cash = cash + $profit WHERE id = $id");
	 	
	 	
	}
}

?>
	 	
