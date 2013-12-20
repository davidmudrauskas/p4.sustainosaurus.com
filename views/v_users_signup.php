<form method='POST' action='/users/p_signup'>
	First name<br>
	<input type='text' name='first_name'><br><br>

	Last name<br>
	<input type='text' name='last_name'><br><br>

	Email<br>
	<input type='text' name='email'><br><br>

	Password<br>
	<input type='password' name='password'><br><br>

	<?php if(isset($error)): ?>
	<div class='error'>
		Please complete all fields and check you've provided a unique, valid email address.
	</div><br>
	
	<?php endif; ?>

	<input type='submit' value='Sign up'>

</form>