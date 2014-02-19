<? require_once('import.php'); require_once('cred.php');
   require_once('new-process.php'); require_once('header.html');
   require_once('userbanner.php'); ?>
   

<form method="post" action="" enctype="multipart/form-data">
				
	<table class="details" style="width: 50%">
		<thead>
			<caption>
				<h2> ADD NEW CONTACT </h2>
				Required fields are denoted by <span class="red">*</span>
			</caption>
		</thead>
		<tfoot>
			<tr>
				<td colspan="2"> <input type="submit" value="Add" /> OR <a href="main.php"><input type="button" value="Cancel" /></a> </td>
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td class="td"> FIRST NAME <span class="red">*</span> </td>
				<td> <input type="text" name="fname" value="<? echo htmlspecialchars($data['fname']['value']); ?>"> </td>
			</tr>
			<? if(count($data['fname']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['fname']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
			<tr>
				<td class="td"> MIDDLE INITIAL </td>
				<td> <input type="text" name="minitial" maxlength="1" size="1" value="<? echo htmlspecialchars($data['minitial']['value']); ?>"> </td>
			</tr>
			<? if(count($data['minitial']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['minitial']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
			
			<tr>
				<td class="td"> LAST NAME <span class="red">*</span> </td>
				<td> <input type="text" name="lname" value="<? echo htmlspecialchars($data['lname']['value']); ?>"> </td>
			</tr>
			<? if(count($data['lname']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							<span class="error"><?
							foreach($data['lname']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
				
				<tr>
				<td class="td"> EMAIL ADDRESS </td>
				<td> <input type="text" name="email" value="<? echo htmlspecialchars($data['email']['value']); ?>"> </td>
			</tr>
			<? if(count($data['email']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							<span class="error"><?
							foreach($data['email']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
				
				<tr>
				<td class="td"> STREET ADDRESS </td>
				<td> <input type="text" name="street" value="<? echo htmlspecialchars($data['street']['value']); ?>"> </td>
			</tr>
			<? if(count($data['street']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['street']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
				
			<tr>
				<td class="td"> STREET 2 </td>
				<td> <input type="text" name="street2" value="<? echo htmlspecialchars($data['street2']['value']); ?>"> </td>
			</tr>
			<? if(count($data['street2']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['street2']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
				
			<tr>
				<td class="td"> UNIT / APT </td>
				<td> <input type="text" name="apt" value="<? echo htmlspecialchars($data['apt']['value']); ?>"> </td>
			</tr>
			<? if(count($data['apt']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['apt']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
				
			<tr>
				<td class="td"> CITY </td>
				<td> <input type="text" name="city" value="<? echo htmlspecialchars($data['city']['value']); ?>"> </td>
			</tr>
			<? if(count($data['city']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['city']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
				
			<tr>
				<td class="td"> STATE </td>
				<td> <input type="text" name="state" size="2" maxlength="2" value="<? echo htmlspecialchars($data['state']['value']); ?>"> </td>
			</tr>
			<? if(count($data['state']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['state']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
			<tr>
				<td class="td"> ZIP CODE </td>
				<td> <input type="text" name="zip" maxlength="10" value="<? echo htmlspecialchars($data['zip']['value']); ?>"> </td>
			</tr>
			<? if(count($data['zip']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['zip']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
				
			<tr>
				<td class="td"> HOME PHONE </td>
				<td> (<input type="text" name="hphonepre" size="3" maxlength="3" value="<? echo htmlspecialchars($data['hphonepre']['value']); ?>">) 
						<input type="text" name="hphone" size="7" maxlength="7" value="<? echo htmlspecialchars($data['hphone']['value']); ?>">
						 EXT <input type="text" name="hphoneext" size="5" maxlength="5" value="<? echo htmlspecialchars($data['hphoneext']['value']); ?>"> </td>
			</tr>
			<? if((count($data['hphonepre']['errors']) > 0) || (count($data['hphone']['errors']) > 0) || (count($data['hphoneext']['errors']) > 0))
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['hphonepre']['errors'] as $error)
							{
								echo "Error: $error";
							}
							foreach($data['hphone']['errors'] as $error)
							{
								echo "Error: $error";
							}	
							foreach($data['hphoneext']['errors'] as $error)
							{
								echo "Error: $error";
							}?> 
							</span> 		
						</td> 
					</tr> <?
				} ?>
				
			<tr>
				<td class="td"> MOBILE PHONE </td>
				<td> (<input type="text" name="mphonepre" size="3" maxlength="3" value="<? echo htmlspecialchars($data['mphonepre']['value']); ?>">)
						<input type="text" name="mphone" size="7" maxlength="7" value="<? echo htmlspecialchars($data['mphone']['value']); ?>" </td>
			</tr>
			<? if((count($data['mphonepre']['errors']) > 0) || (count($data['mphone']['errors']) > 0))
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['mphonepre']['errors'] as $error)
							{
								echo "Error: $error";
							}	
							foreach($data['mphone']['errors'] as $error)
							{
								echo "Error: $error";
							}?> </span> 		
						</td> 
					</tr> <?
				} ?>
				
			<tr>
				<td class="td"> ADD PHOTO </td>
				<td> <input type="file" name="file"> </td>
			</tr>
			<? if(count($data['file']['errors']) > 0)
				{?> 
					<tr>
						<td colspan="2">
							?><span class="error"><?
							foreach($data['file']['errors'] as $error)
							{
								echo "Error: $error";
							}	?> </span> 		
						</td> 
					</tr> <?
				} ?>
		</tbody>
	</table>
	
	
	
	
	
	
	

		

	

   
<? require_once('footer.html'); ?>