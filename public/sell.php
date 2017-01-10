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
		
		// Display error if the user doesn't own any of the stock entered
	    if(!$shares =CS50:: query("SELECT shares FROM Portfolios WHERE id = $id AND symbol = '$stock'"))
	    {
	        apologize("You don't own any shares of this stock");
     	}
	   else
	   {
		
	    	$value = lookup("$stock");
	    	$shares = $shares[0]["shares"];
	 	    $price = $value["price"];
	    	$profit = $shares*$price;
	 	
	    	// Delete the stock from the user's portfolio 
	         $delete = CS50:: query("DELETE FROM Portfolios WHERE id = $id AND symbol = '$stock'");
	         if ($delete === false)
             {
               apologize("Error while selling shares.");
             }
	   
	         //update the balance in the user's portfolio
	          $update = CS50:: query("UPDATE users SET cash = cash + $profit WHERE id = $id");
      	    if ($update === false)
             {
                apologize("Error while selling shares.");
             }
	 	
    	 	render("../templates/sell.php", ["title" => "Sell", "value" => $value , "profit" => $profit]);
	     } 
    }
 }
 else
 {
     // else render form
  render("sell_form.php", ["title" => "Sell"]);
 }
    


?>
	 	
