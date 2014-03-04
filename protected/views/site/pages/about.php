<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<div class="row">
	<div class="col-md-3">
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
		    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		    'stacked'=>true, // whether this is a stacked menu
		    'items'=>array(
		        array('label'=>'Buttons', 'url'=>'#', 'active'=>true),
		        array('label'=>'Button Groups', 'url'=>'#'),
		        array('label'=>'Navigation', 'url'=>'#'),
		        array('label'=>'Tables', 'url'=>'#'),
		        array('label'=>'Forms', 'url'=>'#'),
		        array('label'=>'Hero Unit', 'url'=>'#'),
		        array('label'=>'Thumbnails', 'url'=>'#'),
		        array('label'=>'Alert', 'url'=>'#'),
		        array('label'=>'Progress', 'url'=>'#'),
		        array('label'=>'Labels', 'url'=>'#'),
		        array('label'=>'Badges', 'url'=>'#'),
		        array('label'=>'Javascript Plugins', 'url'=>'#'),
		        
		    ),
		)); ?>
	</div>
	<div class="col-md-9">
		<div class="jumbotron">
			<h1>Yii-Bootstrap</h1>
			<p>Bringing together the <a href="http://www.yiiframework.com/">Yii PHP framework</a> 
				and <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap.</a></p>
			<p><a href="http://www.yiiframework.com/extension/bootstrap/">Yii-Bootstrap</a> 
				is an extension for Yii that provides a wide range of widgets that allow 
				developers to easily use Bootstrap with Yii. All widgets have been developed 
				following Yii's conventions and work seamlessly together with Bootstrap and 
				its jQuery plugins. Now, Bootstrap 3 has been supported.</p>
		</div>
		<?php $this->renderPartial('pages/button'); ?>
		<?php $this->renderPartial('pages/buttonGroup'); ?>
		<?php $this->renderPartial('pages/breadcrumbs'); ?>
		<?php $this->renderPartial('pages/menus'); ?>
		<?php $this->renderPartial('pages/navbar'); ?>
	</div>
</div>