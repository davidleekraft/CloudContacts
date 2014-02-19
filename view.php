<? require_once('import.php'); require_once('cred.php');
   require_once('view-process.php'); require_once('header.html');
   require_once('userbanner.php'); ?>

<table class="table">
	<caption> <h2> Contact View </h2> </caption>
	<thead>
		<tr>
			<th class="th"> Last Name
				<a href="<?=htmlspecialchars($_SERVER['PHP_SELF'] . '?' . http_build_query(array('p'=> $page,'s'=> 1)))?>">v</a>
                <a href="<?=htmlspecialchars($_SERVER['PHP_SELF'] . '?' . http_build_query(array('p'=> $page,'s'=> 0)))?>">^</a>
            </th>
			<th class="th"> First Name </th>
			<th class="th"> MI </th>
			<th class="th"> Actions </th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="4">
				Displaying Results 
                <?=htmlspecialchars($page * PAGE_SIZE + 1)?> - <?=htmlspecialchars(min(($page + 1) * PAGE_SIZE, $contact_count))?> 
                of <?=htmlspecialchars($contact_count)?>
    		</td>
    	</tr>
    	<tr>
    		<td colspan="4">
    			<?php
    				if($page == 0)
    				{
    					echo "First | <- Previous";
    				}
    				else
    				{
    					?> <a href="<?=htmlspecialchars($_SERVER['PHP_SELF'] . '?' . http_build_query(array('p'=> 0, 's'=>$sort_index)))?>">First</a>
    					 | <a href="<?=htmlspecialchars($_SERVER['PHP_SELF'] . '?' . http_build_query(array('p'=> $page - 1, 's'=>$sort_index)))?>"><- Previous</a> <?php
    				}
    				
    				if($count < PAGE_SIZE)
    				{
    					echo " | Next -> | Last";
    				}
    				else
    				{
    					?> | <a href="<?=htmlspecialchars($_SERVER['PHP_SELF'] . '?' . http_build_query(array('p'=> $page + 1, 's'=>$sort_index)))?>">Next -></a>
    					 | <a href="<?=htmlspecialchars($_SERVER['PHP_SELF'] . '?' . http_build_query(array('p'=> (ceil($contact_count / PAGE_SIZE) - 1), 's'=>$sort_index)))?>">Last</a> <?php
    				}
    			?>
    		</td>
    	</tr>
    	<tr>
    		<td colspan="4">
    			<a href="index.php"> Return To Home Screen </a>
    		</td>
    	</tr>
    </tfoot>
    <tbody>
    	<?php
    		if($count == 0)
    		{
    			?> <tr><td> No Contacts To Display </td></tr><?php
    		}
    		else
    		{
    			foreach($statement as $contact)
    			{
    				?><tr>
    					<td>
    						<?php echo htmlspecialchars($contact['lname']); ?>
    					</td>
    					<td>
    						<?php echo htmlspecialchars($contact['fname']); ?>
    					</td>
    					<td>
    						<?php echo htmlspecialchars($contact['minitial']); ?>
    					</td>
    					<td>
    						<a href="details.php?<?php echo http_build_query(array('d' => $contact['id']))?>">
    						VIEW </a>
    						
    					</td>
    				</tr> <?php
    			}
    		}
    	?>
    </tbody>
</table>
		

<? require_once('footer.html'); ?>