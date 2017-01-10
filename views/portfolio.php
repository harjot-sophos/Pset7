<div>
	<div id="message">
		<?php
			print("Welcome, ". $users[0]["username"] .". Your current balance is " . sprintf("%.2f",$users[0]["cash"]).".");
		?>
	</div>
	<table id="overview">
		<?php
			print("<tr>");
				print("<th>Symbol  </th>");
				print("<th>Name</th>");
				print("<th>Shares</th>");
				print("<th>Total value</th>");
			print("</tr>");
				  
			foreach ($positions as $position)
			{	  
				print("<tr>");
				print("<td>" . $position["symbol"] . "</td>");
				print("<td>" . $position["name"] . "</td>");
				print("<td>" . $position["shares"] . "</td>");
				print("<td>" . $position["total"] . "</td>");
				print("</tr>");
			}
		?>
	</table>
</div>