<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" rel="icon" type="image/x-icon" />

	<!-- blueprint CSS framework -->
	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/doc.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="campaign-body">
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'type'     => 'inverse',
	'fixed'    => null,
	// 'brand'    => Yii::app()->name,
	'brand'    => CHtml::image(Yii::app()->request->baseUrl . '/images/navbrand.png'),
	'brandUrl' => array('/site/index'),
	'collapse' =>true,
	'htmlOptions'=>array(
		'class'=>'campaign-navbar'
	),
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

<?php echo $content; ?>

<div id="campaign-footer" style="color:white">
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h4>SUPPORT</h4>
				<?php
					$this->widget('bootstrap.widgets.TbMenu', array(
						'items'=>array(
							array(
								'label'=>'About', 
								'url'=>array(
									'/site/page', 
									'view'=>'about'
								)
							),
							array(
								'label'=>'Contact',
								'url'=>array('/site/contact')
							)
						)
					));
				?>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h4>COMPANY</h4>
				<?php
					$this->widget('bootstrap.widgets.TbMenu', array(
						'items'=>array(
							array('label'=>UserModule::t('Privacy Policy'), 'url'=>array('#')),
	    					array('label'=>UserModule::t('Terms of Service'), 'url'=>array('#')),	
						)
					));
				?>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h4>CONNECT</h4>
				<?php
					$this->widget('bootstrap.widgets.TbMenu', array(
						'items'=>array(
							array('label'=>UserModule::t('Facebook'), 'url'=>array('#')),
	    					array('label'=>UserModule::t('Twitter'), 'url'=>array('#')),
	    					array('label'=>UserModule::t('Google+'), 'url'=>array('#')),	
						)
					));
				?>
			</div>
		</div>
		<div class="row" style="margin-top:20px">
			<div class="span12" style="text-align:center">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/navbrand.png'); ?>
				<p style="margin-top:20px;color:white">Copyright &copy; <?php echo date('Y'); ?> by Seth Marquin Busque. All Rights Reserved.</p>
			</div><!-- footer -->
		</div>
	</div>
</div><!-- page -->
</body>
</html>