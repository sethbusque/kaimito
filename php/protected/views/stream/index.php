<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => 'span.timeago',
));
?>
<?php $this->widget('application.modules.hybridauth.widgets.renderProviders'); ?>
