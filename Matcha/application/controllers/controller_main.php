<?php
class Controller_Main extends Controller
{
	function action_index()
	{	
		$this->view->generate('main_view.php', 'template_view.php');
	}

	public function action_signin() {
		$username = $_POST['login'];
		$user_password = $_POST['password'];
		if (!empty($username) and !empty($user_password))
		{
			$model_signin = new Model_Main();
			$res = $model_signin->authuser($username, $user_password);
			if ($res === TRUE) {
				session_start();
				$_SESSION['logged_in'] = $username;
				echo "true";
			} else {
				echo "false";
			}
			
		}
	}

	public function action_signup()
	{
		$username = $_POST['login'];
		$user_password = $_POST['password'];
		$user_email = $_POST['email'];
		if (isset($_POST['signup']) and !empty($username) and !empty($user_password) and !empty($user_email))
		{
			$user_password = password_hash($user_password, PASSWORD_DEFAULT);
			$model_signup = new Model_Main();
			$vkey = $model_signup->createuser($username, $user_password, $user_email);
			$to = $user_email;
			$subject = "TEST";
			$message = "http://localhost:8080/Main/verify?key=".$vkey;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$res = mail($to, $subject, $message, $headers);
			if ($res === TRUE) {
				header('Location: http://localhost:8080/Gallery');
			} else {
				echo "Foo";
			}
		}
	}

	public function action_verify()
	{
		$vkey = $_GET['key'];
		$model_verify = new Model_Main();
		$result = $model_verify->verify($vkey);
		if ($result === TRUE)
		{
			header('Location: http://localhost:8080/Main');
		}

	}
}	