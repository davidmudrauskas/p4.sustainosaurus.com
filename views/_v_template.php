<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- Common CSS/JS -->
	<link rel="stylesheet" href="/css/app.css" type="text/css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	<div id='menu'>
		<div id="logo">
			<a href='/'><?=APP_NAME?></a>
		</div>

		<!-- Menu for users who are logged in -->
		<?php if($user): ?>
		<div class="menu_link">
			<a href='/users/logout'>Log out</a>
		</div>
		
		<div class="menu_link">
			<a href='/users/profile'>Your profile</a>
		</div>
		
		<div class="menu_link">
			<a href='/posts/users'>All users</a>
		</div>

		<!-- Menu options for users who are not logged in -->
		<?php else: ?>
		<div class="menu_link">
			<a href='/users/signup'>Sign up</a>
		</div>

		<div class="menu_link">
			<a href='/users/login'>Log in</a>
		</div>

		<?php endif; ?>

	</div><br>
	
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

</body>
</html>