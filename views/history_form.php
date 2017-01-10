<div>
    <table id="overview">
		<?php
			print("<tr>");
				print("<th>Type</th>");
				print("<th>Date/Time</th>");
				print("<th>Symbol</th>");
				print("<th>Volume</th>");
				print("<th>Price</th>");
			print("</tr>");
				  
			foreach ($history as $history)
			{	  
				print("<tr>");
				print("<td>" . $history["type"] . "</td>");
				print("<td>" . $history["date"] . "</td>");
				print("<td>" . $history["symbol"] . "</td>");
				print("<td>" . $history["volume"] . "</td>");
				print("<td>" . sprintf("%.2f",$history["price"]) . "</td>");
				print("</tr>");
			}
		?>
	</table>
</div>