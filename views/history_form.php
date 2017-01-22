<div>
	<div id="message">
		<?php
			print(" History ");
		?>
	</div>
	
    <table class="table table-striped">
		
			
			<tr>
		<th class="text-center">Transaction type</th>
	    <th class="text-center">Symbol</th>
		<th class="text-center">Volume</th>

	</tr>


		  
	
		<?php foreach ($history as $history): ?>
    <tbody>
        <tr>
            <td><?= $history["type"] ?></td>
            <td><?= $history["symbol"] ?></td>
            <td><?= $history["volume"] ?></td>
            
        </tr>
<?php endforeach ?>
				
			

	</table>
