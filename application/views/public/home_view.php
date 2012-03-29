<h3>Login</h3>

<div id="login-form">
	<form method="post" action="<?php echo base_url('home/login'); ?>">
		<input type="text" name="username" value="" id="username" placeholder="username" required autofocus />
		<input type="password" name="password" value="" id="password" placeholder="password" required />
		<input type="submit" value="Login" />
	</form>
</div>