<div>
<?php echo $message; ?>
</div>
<form action="login/validasi" method="post">
	<div><h2>Login</h2>
	</div>
	<div>
		<label>Username : </label>
		<input type="text" name="username">
	</div>
	<div>
		<label>Password : </label>
		<input type="password" name="password">
	</div>
	<div>		
		<input type="submit" value="Login">
	</div>
</form>