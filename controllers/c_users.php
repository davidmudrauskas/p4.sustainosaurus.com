<?php
class users_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();
	} 

	public function index() {
		
		# Send users to the homepage if they get lost
		Router::redirect("/");
	}

	public function signup($error = NULL) {
		
		# Setup view
		$this->template->content = View::instance('v_users_signup');
		$this->template->title   = "Sign up";
		$this->template->content->error = $error;
		
		# Render template
		echo $this->template;
	}

	public function p_signup() {
		
		# Set up the view
		$this->template->content = View::instance("v_users_p_signup");
		$this->template->title   = "Sign up";

		# Check form is filled out properly
		if(
			empty($_POST["first_name"]) or
			empty($_POST["last_name"]) or
			empty($_POST["email"]) or
			empty($_POST["password"]) or
			strpos($_POST["email"],"@") == false
			) {
			Router::redirect("/users/signup/error");
		}

		# Check email is unique
		$email = $_POST["email"];
		$userObj = new User();
		if(!$this->userObj->confirm_unique_email($email)) {
			Router::redirect("/users/signup/error"); 
		}

		# More data we want stored with the user
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		# Encrypt the password  
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);			

		# Create an encrypted token via their email address and a random string
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

		# Insert this user into the database 
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);

		# Render the view
		echo $this->template;
	}

	public function login($error = NULL) {
		
		# Set up the view
		$this->template->content = View::instance("v_users_login");
		$this->template->title   = "Log in";

		# Pass data to the view
		$this->template->content->error = $error;

		# Render the view
		echo $this->template;
	}

	public function p_login() {
		
		# Check that user has filled out fields
		if(
			empty($_POST["email"]) or
			empty($_POST["password"])
			) {
			Router::redirect("/users/login/error");
		}

		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token 
			FROM users 
			WHERE email = '".$_POST['email']."' 
			AND password = '".$_POST['password']."'";

		$token = DB::instance(DB_NAME)->select_field($q);
				
		# Login failed
		if(!$token) {
			# Note the addition of the parameter "error"
			Router::redirect("/users/login/error"); 
		}
		
		# Login passed
		else {
			setcookie("token", $token, strtotime('+2 weeks'), '/');
			Router::redirect("/");
		}
	}

	public function logout() {
		
		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);

		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

		# Delete their token cookie by setting it to a date in the past - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');

		# Send them back to the main index.
		Router::redirect("/");
	}

	public function profile($user_name = NULL) {
		
		# If user is blank, they're not logged in; redirect them to the login page
		if(!$this->user) {
			Router::redirect('/users/login');
		}

		# If they weren't redirected away, continue:
		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile -- ".$this->user->first_name." ".$this->user->last_name;

		# Look up user profile details
		$q = "SELECT *
			FROM profiles where user_id = ".$this->user->user_id;

		$profile_details = DB::instance(DB_NAME)->select_rows($q);

		# Pass profile details to the view
		$this->template->content->profile_details = $profile_details;

		# Render template
		echo $this->template;
	}

	public function edit_profile($error = NULL) {

		# If user is blank, they're not logged in; redirect them to the login page
		if(!$this->user) {
			Router::redirect('/users/login');
		}

		# Set up the view
		$this->template->content = View::instance("v_users_edit_profile");
		$this->template->title   = "Edit profile";

		# Pass data to the view
		$this->template->content->error = $error;

		# Render template
		echo $this->template;
	}

	public function p_edit_profile() {

		# If user is blank, they're not logged in; redirect them to the login page
		if(!$this->user) {
			Router::redirect('/users/login');
		}
		
		# Set up the view
		$this->template->content = View::instance("v_users_p_edit_profile");

		if(
			empty($_POST["interests"]) or
			empty($_POST["favorite_cat"])
			) {
			Router::redirect("/users/edit_profile/error");
		}

		# Sanitize the user entered data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		# Associate profile changes with this user
		$_POST['user_id']  = $this->user->user_id;

		# Unix timestamp of when this profile was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		# Clear out any pre-existing profile details and insert new ones
		DB::instance(DB_NAME)->delete('profiles', "where user_id = ".$_POST['user_id']);
		DB::instance(DB_NAME)->insert('profiles', $_POST);

		# Render template
		echo $this->template;
	}
		
}
