<? require_once('signup_validate.php'); 
   require_once('header.html');?>
				
		<form method="post" action="">
				
					<h2> SIGN UP </h2>
					<p style="text-align:center"> Required fields are denoted by <span class="red">*</span></p>
					
					<p> Username <span class="red">*</span> <br />
					<input type="text" name="username" 
						value="<? echo htmlspecialchars($data['username']['value']); ?>"> <br />
						<span class="error"><? if(count($data['username']['errors']) > 0)
						{
							foreach($data['username']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span> <br /> 
					<span class="disclaim"> Username must be between 6 and 25 characters long, <br />and may not begin or end with a space. </span>
					</p>
					
					<p> Password <span class="red">*</span> <br /> <input type="password" name="passwd"
						value=""> <br />
						<span class="error"><? if(count($data['passwd']['errors']) > 0)
						{
							foreach($data['passwd']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span>
						<br /> 
					<span class="disclaim"> Password must be between 6 and 25 characters long, <br />and may not begin or end with a space. </span>
					</p>
						
					<p> Verify Password <span class="red">*</span> <br /> <input type="password" name="passwd2"
						value=""> <br />
						<span class="error"><? if(count($data['passwd2']['errors']) > 0)
						{
							foreach($data['passwd2']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span>
					</p>
						
					<p> First Name <span class="red">*</span> <br /> <input type="text" name="fname"
						value="<? echo htmlspecialchars($data['fname']['value']); ?>"> <br />
						<span class="error"><? if(count($data['fname']['errors']) > 0)
						{
							foreach($data['fname']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span>
						<br /> 
					<span class="disclaim"> First Name must be between 2 and 25 characters long, <br />and may not begin or end with a space. </span>
					</p>
						
					<p> Last Name <span class="red">*</span> <br /> <input type="text" name="lname"
						value="<? echo htmlspecialchars($data['lname']['value']); ?>"> <br />
						<span class="error"><? if(count($data['lname']['errors']) > 0)
						{
							foreach($data['lname']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span>
						<br /> 
					<span class="disclaim"> Last Name must be between 2 and 25 characters long, <br />and may not begin or end with a space. </span>
					</p>
					
					<p> Email <span class="red">*</span> <br /> <input type="text" name="email"
						value="<? echo htmlspecialchars($data['email']['value']); ?>"> <br />
						
						<span class="error"><? if(count($data['email']['errors']) > 0)
						{
							foreach($data['email']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span>
					</p>
					
					<p> Verify Email <span class="red">*</span> <br /> <input type="text" name="email2"
						value="<? echo htmlspecialchars($data['email2']['value']); ?>"> <br />
						
						<span class="error"><? if(count($data['email2']['errors']) > 0)
						{
							foreach($data['email2']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span>
					</p>
						
					<p> <input type="submit" value="Submit" /> <a href="index.php"><input type="button" value="Cancel" /></a></p>
				
				</form>
				
<? require_once('footer.html');