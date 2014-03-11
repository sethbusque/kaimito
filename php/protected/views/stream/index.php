<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => 'span.timeago',
));
?>
<div class="row">
	<?php 
	$x = 0;
	while($x < 4){ ?>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<?php $y = 0;
		while ($y < 30){ ?>
		<?php $this->renderPartial("_post"); ?>
		<?php $y++; } ?>
	</div>
	<?php $x++; } ?>
</div>
