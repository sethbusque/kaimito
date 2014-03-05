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

<body>
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
					'label'=>'Home',
					'url'=>array('/site/index')
				)
			)
		),
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
<div class="container">
	<div class="row">
		<div class="span12">
			
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
			<?php endif?>

			<?php echo $content; ?>

			<div class="clear"></div>

			<div id="footer" style="text-align:center">
				<small class="text-muted">Copyright &copy; <?php echo date('Y'); ?> by Seth Marquin Busque. All Rights Reserved.</small>
			</div><!-- footer -->
		</div>
	</div>
</div><!-- page -->
</body>
</html>