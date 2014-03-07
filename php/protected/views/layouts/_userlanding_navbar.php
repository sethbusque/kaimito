<?php /* @var $this Controller */ ?>
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'type'     => 'inverse',
	'fixed'    => 'top',
	// 'brand'    => Yii::app()->name,
	'brand'    => CHtml::image(Yii::app()->request->baseUrl . '/images/navbrand.png'),
	'brandUrl' => array('/site/index'),
	'collapse' =>true,
	'items'=>array(
		array(
			'class' => 'bootstrap.widgets.TbMenu',
			'items'=>array(
				array(
					'url'=>Yii::app()->getModule('user')->loginUrl, 
					'label'=>Yii::app()->getModule('user')->t("Login"), 
					'visible'=>Yii::app()->user->isGuest
				),
				array(
					'url'=>Yii::app()->getModule('user')->registrationUrl, 
					'label'=>Yii::app()->getModule('user')->t("Register"), 
					'visible'=>Yii::app()->user->isGuest
				),
				array(
					'url'=>Yii::app()->getModule('user')->profileUrl, 
					'label'=>Yii::app()->getModule('user')->t("Profile"), 
					'visible'=>!Yii::app()->user->isGuest
				),
				array(
					'url'=>Yii::app()->getModule('user')->logoutUrl, 
					'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 
					'visible'=>!Yii::app()->user->isGuest
				),
			),
			'htmlOptions'=>array(
				'class'=>'navbar-right'
			)
		)
	),
)); ?>