<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('/user'),
	UserModule::t('Manage'),
);

$this->menu=array(
    array('label'=>UserModule::t('Create User'), 'url'=>array('create'),'icon'=>'plus'),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin'),'icon'=>'cog'),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'),'icon'=>'list-alt'),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user'),'icon'=>'list'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle(500);
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>
<h1><i class="glyphicon glyphicon-user"></i> <?php echo UserModule::t("Manage Users"); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'button',
    'url'=>'#',
    'label'=>UserModule::t('Advanced Search'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'icon'=>'search',
    'toggle'=>true,
    'htmlOptions'=>array(
    	'class'=>'search-button pull-right'
    )
)); ?>
</h1>
<div class="panel panel-default search-form" style="display:none">
	<div class="panel-body">
	   <?php $this->renderPartial('_search',array(
	    'model'=>$model,
	)); ?>
	</div>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
		'create_at',
		'lastvisit_at',
		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
			'filter'=>User::itemAlias("AdminStatus"),
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
			'filter' => User::itemAlias("UserStatus"),
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
