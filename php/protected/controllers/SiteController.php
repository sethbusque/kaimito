<?php
ini_set('max_execution_time', 300);
Yii::import('application.vendors.*');
		
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		/*
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

		// assign access token on each page load
		$cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

		$reply = (array) $cb->statuses_homeTimeline();
		*/
		$reply = array();
		$this->render('index',array('reply'=>$reply));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}