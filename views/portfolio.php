<div>

	<div id="message">
		<?php
			print("Welcome, ". $users[0]["username"] .". Your current balance is " . sprintf("%.2f",$users[0]["cash"]).".");
		?>
	</div>
	
	<div> 	
	<table class = "table table-striped">
		<tr>
			<th class="text-center">Symbol</th>
			<th class="text-center">Name</th>
			<th class="text-center">Shares</th>
	        <th class="text-center">Price</th>
         	<th class="text-center">Total Value</th>
		</tr>
				  
		<?php	foreach ($positions as $position)
			{	  
				print("<tr>");
				print("<td>" . $position["symbol"] . "</td>");
				print("<td>" . $position["name"] . "</td>");
				print("<td>" . $position["shares"] . "</td>");
				print("<td>" . $position["price"] . "</td>");
				print("<td>" . $position["total"] . "</td>");
				print("</tr>");
			}
		?>
	</table>
	</div>
</div>