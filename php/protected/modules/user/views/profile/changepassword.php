<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'), 'icon'=>'cog')
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user'), 'icon'=>'list'),
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile'), 'icon'=>'user'),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit'), 'icon'=>'pencil'),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout'), 'icon'=>'log-out'),
);
?>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'type'=>'horizontal'
)); ?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	</div>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'oldPassword',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<?php echo $form->passwordField($model,'oldPassword',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'oldPassword',array("class"=>"help-block")); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<?php echo $form->passwordField($model,'password',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'password',array("class"=>"help-block")); ?>
			<p class="hint help-block">
				<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
			</p>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'verifyPassword',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<?php echo $form->passwordField($model,'verifyPassword',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'verifyPassword',array("class"=>"help-block")); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'submit',
			    'label'=>UserModule::t('Save'),
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'icon'=>'floppy-disk'
			)); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->