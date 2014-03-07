<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
if(UserModule::isAdmin()) {
	$this->layout='//layouts/column2';
	$this->menu=array(
	    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'), 'icon'=>'user'),
	    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'),'icon'=>'th-list'),
	);
	$this->pageTitle = UserModule::t("List User");
}
?>
<?php if(!UserModule::isAdmin()) { ?>
<h1><?php echo UserModule::t("List User") ?></h1>
<?php }
?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
		'create_at',
		'lastvisit_at',
	),
)); ?>
