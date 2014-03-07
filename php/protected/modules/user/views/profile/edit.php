<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Edit Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'), 'icon'=>'cog')
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user'), 'icon'=>'list'),
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile'), 'icon'=>'user'),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword'), 'icon'=>'lock'),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout'), 'icon'=>'log-out'),
);
?>
<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
	'type'=>'horizontal'
)); ?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	</div>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname,array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<?php if ($widgetEdit = $field->widgetEdit($profile)) {
				echo $widgetEdit;
			} elseif ($field->range) {
				echo $form->dropDownList($profile,$field->varname,Profile::range($field->range),array('class'=>"form-control"));
			} elseif ($field->field_type=="TEXT") {
				echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>"form-control"));
			} else {
				echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>"form-control"));
			}
			echo $form->error($profile,$field->varname,array("class"=>"help-block")); ?>
		</div>
		</div>
			<?php
			}
		}
	?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>"form-control")); ?>
			<?php echo $form->error($model,'username',array("class"=>"help-block")); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>"form-control")); ?>
			<?php echo $form->error($model,'email',array("class"=>"help-block")); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'submit',
			    'label'=>$model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'icon'=>'floppy-disk'
			)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
