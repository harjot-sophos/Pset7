<?php
 
    // configuration
    require("../includes/config.php"); 
 

    // if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $rows =CS50:: query("SELECT * FROM Portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
 
        if (count($rows) == 0)
        {
            apologize("You do not own any shares of {$_POST["symbol"]}");
        }
 
        $row = $rows[0];
 
       
        
            CS50:: query("DELETE FROM Portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        
      
        $stock = lookup($_POST["symbol"]);
 
        CS50:: query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["shares"]*$stock["price"], $_SESSION["id"]);
 
       CS50:: query("INSERT INTO history (user_id, type, symbol, volume) VALUES (?, ?, ?, ?)", $_SESSION["id"], "SELL",  strtoupper($_POST["symbol"]), $_POST["shares"]);
 
        redirect("/");
 
    }
    else
 {
     // else render form
  render("sell_form.php", ["title" => "Sell"]);
 }
 
?>
