<? 
require_once('login.php');
require_once('header.html');
?>
		
			<div class="login">
				<h3 style="text-align: center; color: white;"> LOG IN </h3>
				
				<form method="post" action="">
				
					<p style="color: white"> Username 
					<input type="text" name="username" value="<? echo htmlspecialchars($data['username']['value']); ?>"/><br />
					<span class="error"><? if(count($data['username']['errors']) > 0)
						{
							foreach($data['username']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span></p>
					<p style="color: white"> Password 
					<input type="password" name="passwd" /><br />
					<span class="error"><? if(count($data['passwd']['errors']) > 0)
						{
							foreach($data['passwd']['errors'] as $error)
							{
								echo "Error: $error";
							} 
						} ?></span></p>
					<p style="color: white"> <input type="submit" /><input type="reset" /> <br />
					<a style="color: white" href="signup.php"> Register as New User </a></p>
					
					
				
				</form>
				
			</div>

<? require_once('footer.html'); ?>