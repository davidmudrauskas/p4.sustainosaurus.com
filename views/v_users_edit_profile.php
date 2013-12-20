<form method='POST' action='/users/p_edit_profile'>
	<label for='interests'>Interests</label><br><br>

	<textarea name='interests' id='interests'></textarea><br><br>
	
	<label for='favorite_cat'>Favorite cat</label><br><br>

	<textarea name='favorite_cat' id='favorite_cat'></textarea><br><br>
	
	<?php if(isset($error)): ?>
	<div class='error'>
		Please provide your details.
	</div><br>

	<?php endif; ?>
	
	<input type='submit' value='Update profile'>

</form>