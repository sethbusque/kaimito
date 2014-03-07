<?php

class LogoutController extends Controller
{
	public $defaultAction = 'logout';
	
	/**
	 * Logout the current user and redirect to returnLogoutUrl.
	 */
	public function actionLogout()
	{
		$usersConnections = new UsersConnections();

		$usersConnections->user_id = Yii::app()->user->id;
		$usersConnections->hybridauth_session = Yii::app()->getModule('hybridauth')->hybridAuth->getSessionData();
		$usersConnections->updated_at = date("Y-m-d H:i:s");
		$usersConnections->save();

		Yii::app()->user->logout();
		$this->redirect(Yii::app()->controller->module->returnLogoutUrl);
	}
	
}