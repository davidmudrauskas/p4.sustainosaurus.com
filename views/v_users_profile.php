<table class="group_content">
	<tr>
		<td>
			<?=$user->first_name?> <?=$user->last_name?> 
			
			<div class="follow_link">
				<a href="/users/edit_profile">Edit profile</a>
			</div>
		
		</td>
	</tr>
	
	<?php foreach($profile_details as $profile_detail): ?>	
	<tr>
		<td>Interests: <?=$profile_detail['interests']?></td>
	</tr>
	
	<tr>
		<td>Favorite cat: <?=$profile_detail['favorite_cat']?></td>
	</tr>

</table>

<?php endforeach; ?>