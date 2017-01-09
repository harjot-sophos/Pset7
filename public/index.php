<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    render("portfolio.php", ["title" => "Portfolio"]);

 $id = $_SESSION["id"];
 
    // get user's portfolio
    $rows =	query("SELECT * FROM portfolio WHERE id = ?", $id );
?>
