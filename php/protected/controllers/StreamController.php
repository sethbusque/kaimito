<?php

ini_set('max_execution_time', 300);
Yii::import('application.vendors.*');

class StreamController extends Controller
{
	public function actionIndex()
	{
		// require_once('codebird/codebird.php');
		// \Codebird\Codebird::setConsumerKey(Yii::app()->params['twitterConsumerKey'][0], Yii::app()->params['twitterConsumerKey'][1]);
		// $cb = \Codebird\Codebird::getInstance();
		

		// // $cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

		// // $reply = (array) $cb->statuses_homeTimeline();
		$ha = Yii::app()->getModule('hybridauth')->getHybridAuth();

		$this->render('index');
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