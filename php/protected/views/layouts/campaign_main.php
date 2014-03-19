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
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="campaign-body">

<?php echo $content; ?>

<div id="campaign-footer" style="color:white">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/kaimito-512.png',"Kaimito Logo",array("class"=>'logo-footer')); ?>
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/navbrand.png'); ?>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
				<h5 class="group-heading">SUPPORT</h5>
				<?php
					$this->widget('bootstrap.widgets.TbMenu', array(
						'items'=>array(
							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contact','url'=>array('/site/contact')),
						),
						'htmlOptions'=>array(
							'class'=>'nav-footer'
						)
					));
				?>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
				<h5 class="group-heading">COMPANY</h5>
				<?php
					$this->widget('bootstrap.widgets.TbMenu', array(
						'items'=>array(
							array('label'=>UserModule::t('Privacy Policy'), 'url'=>array('#')),
	    					array('label'=>UserModule::t('Terms of Service'), 'url'=>array('#')),	
						),
						'htmlOptions'=>array(
							'class'=>'nav-footer'
						)
					));
				?>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
				<h5 class="group-heading">CONNECT</h5>
				<?php
					$this->widget('bootstrap.widgets.TbMenu', array(
						'items'=>array(
							array('label'=>UserModule::t('Facebook'), 'url'=>array('#')),
	    					array('label'=>UserModule::t('Twitter'), 'url'=>array('#')),
	    					array('label'=>UserModule::t('Google+'), 'url'=>array('#')),	
						),
						'htmlOptions'=>array(
							'class'=>'nav-footer'
						)
					));
				?>
			</div>
		</div>
		<div class="row" style="margin-top:20px">
			<div class="span12" style="text-align:center">
				<p style="margin-top:20px;color:white">Copyright &copy; <?php echo date('Y'); ?> by Seth Marquin Busque. All Rights Reserved.</p>
			</div><!-- footer -->
		</div>
	</div>
</div><!-- page -->
</body>
</html>