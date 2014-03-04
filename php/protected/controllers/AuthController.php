<?php

ini_set('max_execution_time', 300);
Yii::import('application.vendors.*');

class AuthController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function connect()
	{
		$this->connectToTwitter();
	}

	private function connectToTwitter(){
		require_once('codebird/codebird.php');
		\Codebird\Codebird::setConsumerKey('K6zFXmFlPi6GlfSyruD5Q', 'xufv0Po4RgeK7LTIHnylBylIK6XokOxnaTH8zOsaM');
		$cb = \Codebird\Codebird::getInstance();

		session_start();

		if (! isset($_SESSION['oauth_token'])) {
		    // get the request token

		    $reply = $cb->oauth_requestToken(array(
		        'oauth_callback' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
		    ));

		    // store the token
		    $cb->setToken($reply['oauth_token'], $reply['oauth_token_secret']);
		    $_SESSION['oauth_token'] = $reply['oauth_token'];
		    $_SESSION['oauth_token_secret'] = $reply['oauth_token_secret'];
		    $_SESSION['oauth_verify'] = true;

		    // redirect to auth website
		    $auth_url = $cb->oauth_authorize();
		    header('Location: ' . $auth_url);
		    die();

		} elseif (isset($_GET['oauth_verifier']) && isset($_SESSION['oauth_verify'])) {
		    // verify the token
		    $cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		    unset($_SESSION['oauth_verify']);

		    // get the access token
		    $reply = $cb->oauth_accessToken(array(
		        'oauth_verifier' => $_GET['oauth_verifier']
		    ));

		    // store the token (which is different from the request token!)
		    $_SESSION['oauth_token'] = $reply['oauth_token'];
		    $_SESSION['oauth_token_secret'] = $reply['oauth_token_secret'];

		    // send to same URL, without oauth GET parameters
		    header('Location: ' . basename(__FILE__));
		    die();
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}