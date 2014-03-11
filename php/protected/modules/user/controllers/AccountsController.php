<?php

class AccountsController extends Controller
{
	public $defaultAction = 'accounts';
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionAccounts()
	{
		$model = $this->loadUser();
		
		$ha = Yii::app()->getModule('hybridauth')->getHybridAuth();
		$halogins = HaLogin::getLogins(Yii::app()->user->id);

		$this->layout = "//layouts/column2";
	    
	    $this->render('index',array(

	    ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=Yii::app()->controller->module->user();
			if($this->_model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}
}