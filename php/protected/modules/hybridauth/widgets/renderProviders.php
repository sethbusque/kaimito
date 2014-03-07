<?php

class renderProviders extends CWidget {

	public $config;
	private $_assetsUrl;
	public $target;
	
	public function init() {
		// this method is called by CController::beginWidget()
		$this->config = Yii::app()->getModule('hybridauth')->getConfig();
		$this->_assetsUrl = Yii::app()->getModule('hybridauth')->getAssetsUrl();
	}

	public function run() {
		
		// this method is called by CController::endWidget()
		$cs = Yii::app()->getClientScript();
		
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		$cs->registerCssFile($cs->getCoreScriptUrl(). '/jui/css/base/jquery-ui.css'); 
		$cs->registerScriptFile($this->_assetsUrl . '/script.js');
		$cs->registerCssFile($this->_assetsUrl . '/styles.css');
		$providers = $this->config['providers'];
		
		foreach ($providers as &$provider) {
			$provider['active']=false;
		}
		if (!Yii::app()->user->isGuest) {
			foreach (HaLogin::getLogins(Yii::app()->user->id) as $login) {
				$providers[$login->loginProvider]['active']=true;
			}
		}
		$this->render('providers', array(
			'baseUrl'=>Yii::app()->request->getBaseUrl(true)."/hybridauth",
			'providers' => $providers,
			'assetsUrl' =>  $this->_assetsUrl,
			'target'=>$this->target,
		));

	}
}