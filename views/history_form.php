<div>
	<div id="message">
		<?php
			print(" History ");
		?>
	</div>
	
    <table class="table table-striped">
		
			
			<tr>
		<th class="text-center">Transaction type</th>
		<th class="text-center">Date/Time</th>
		<th class="text-center">Symbol</th>
		<th class="text-center">Volume</th>
		<th class="text-center">Price</th>
	</tr>


		  
		<?php foreach ($history as $history): ?>			{	  
				print("<tr>");
				print("<td>" . $history["type"] . "</td>");
				print("<td>" . $history["date"] . "</td>");
				print("<td>" . $history["symbol"] . "</td>");
				print("<td>" . $history["volume"] . "</td>");
				print("<td>" . sprintf("%.2f",$history["price"]) . "</td>");
				print("</tr>");
				print("</br>");
		<?php endforeach ?>
				
			

	</table>
