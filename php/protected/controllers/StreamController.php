<?php

ini_set('max_execution_time', 300);
Yii::import('application.vendors.*');

class StreamController extends Controller
{
	public function actionIndex()
	{
		require_once('codebird/codebird.php');
		\Codebird\Codebird::setConsumerKey('K6zFXmFlPi6GlfSyruD5Q', 'xufv0Po4RgeK7LTIHnylBylIK6XokOxnaTH8zOsaM');
		$cb = \Codebird\Codebird::getInstance();
		
		session_start();

		// assign access token on each page load
		$cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

		$reply = (array) $cb->statuses_homeTimeline();
		
		$this->render('index',array('reply'=>$reply));
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