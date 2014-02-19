<? require_once('import.php'); require_once('cred.php'); 
   require_once('details-process.php');
   require_once('header.html'); require_once('userbanner.php'); ?>
   

   
   <table class="details">
   		<thead>
   			<tr>
   				<td colspan="2">
   					<? if(isset($contact['image']))
   						{
   							?><img src="image.php?d=<?=$_GET['d']?>" alt="Cannot Display Image" /><?
   						}?>
   					<h2> <?=$contact['fname'];?> <?=$contact['minitial'];?> <?=$contact['lname'];?> </h2>
   				</td>
   			</tr>
   		</thead>
   		<tfoot>
   			<tr>
   				<td colspan="2">
   					<div class="options-container">
						<div class="button2"> <h3> <a style="display:block" href="edit.php?<?php echo http_build_query(array('d' => $contact['id']))?>"> EDIT </a> </h3> </div>
						<div class="button2"> <h3> <a style="display:block" href="delete.php?<?php echo http_build_query(array('d' => $contact['id']))?>"> DELETE </a> </h3> </div> <br />
						<div class="button2" style="width: 98%"> <h3> <a style="display:block" href="view.php"> GO BACK </a> </h3> </div>
   					</div>
   				</td>
   			</tr>
   		</tfoot>
   		<tr>
   			<td class="td"> FIRST NAME: </td>
   			<td> <?= $contact['fname'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> MIDDLE INITIAL: </td>
   			<td> <?= $contact['minitial'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> LAST NAME: </td>
   			<td> <?= $contact['lname'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> EMAIL: </td>
   			<td> <?= $contact['email'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> STREET ADDR: </td>
   			<td> <?= $contact['street'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> STREET 2: </td>
   			<td> <?= $contact['street2'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> APT: </td>
   			<td> <?= $contact['apt'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> CITY: </td>
   			<td> <?= $contact['city'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> STATE: </td>
   			<td> <?= $contact['state'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> ZIP CODE: </td>
   			<td> <?= $contact['zip'];?> </td>
   		</tr>
   		<tr>
   			<td class="td"> HOME PHONE: </td>
   			<td> <? if((isset($contact['hphonepre'])) && (strlen($contact['hphonepre']) > 0))
   					{
   						?>(<?= $contact['hphonepre'];?>) <?
   					}?>
   					<?= $contact['hphone'];?><?
   					if((isset($contact['hphoneext'])) && (strlen($contact['hphoneext']) > 0))
   					{
   						?> EXT. <?= $contact['hphoneext'];?><?
   					}?>
   			</td>
   		</tr>
   		<tr>
   			<td class="td"> MOBILE PHONE: </td>
   			<td> <? if((isset($contact['mphonepre'])) && (strlen($contact['mphonepre']) > 0))
   					{
   						?>(<?= $contact['mphonepre'];?>) <?
   					}?>
   					<?= $contact['mphone'];?>
   			</td>
   		</tr>
   	</table>
   
   <? require_once('footer.html'); ?>