<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
?>
<div class="row">
	<div class="col-xs-10 col-sm-8 col-md-8 col-lg-6 col-xs-offset-1 col-sm-offset-2 col-md-offset-2 col-lg-offset-3">
		<div class="panel panel-default">
		  	<div class="panel-body">
				<h1><?php echo UserModule::t("Registration"); ?></h1>
				<?php if(Yii::app()->user->hasFlash('registration')): ?>
					<div class="success">
						<?php echo Yii::app()->user->getFlash('registration'); ?>
					</div>
				<?php else: ?>
					<div class="form">
					<?php $form=$this->beginWidget('UActiveForm', array(
						'id'=>'registration-form',
						'enableAjaxValidation'=>true,
						'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
						),
						'htmlOptions' => array('enctype'=>'multipart/form-data', "class"=>"form-horizontal"),
					)); ?>

					<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
					
					<?php echo $form->errorSummary(array($model,$profile)); ?>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'username',array('class'=>"control-label col-xs-4 col-sm-4 col-md-4 col-lg-4")); ?>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<?php echo $form->textField($model,'username',array('class'=>"form-control")); ?>
							<?php echo $form->error($model,'username',array("class"=>"help-block")); ?>
						</div>
					</div>
					
					<div class="form-group">
					<?php echo $form->labelEx($model,'password',array('class'=>"control-label col-xs-4 col-sm-4 col-md-4 col-lg-4")); ?>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<?php echo $form->passwordField($model,'password',array('class'=>"form-control")); ?>
							<?php echo $form->error($model,'password',array("class"=>"help-block")); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'verifyPassword',array('class'=>"control-label col-xs-4 col-sm-4 col-md-4 col-lg-4")); ?>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<?php echo $form->passwordField($model,'verifyPassword',array('class'=>"form-control")); ?>
							<?php echo $form->error($model,'verifyPassword',array("class"=>"help-block")); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'email',array('class'=>"control-label col-xs-4 col-sm-4 col-md-4 col-lg-4")); ?>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<?php echo $form->textField($model,'email',array('class'=>"form-control")); ?>
							<?php echo $form->error($model,'email',array("class"=>"help-block")); ?>
						</div>
					</div>
					
					<?php 
						$profileFields=$profile->getFields();
						if ($profileFields) {
							foreach($profileFields as $field) {
							?>
							<div class="form-group">
								<?php echo $form->labelEx($profile,$field->varname,array('class'=>"control-label col-xs-4 col-sm-4 col-md-4 col-lg-4")); ?>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<?php 
									if ($widgetEdit = $field->widgetEdit($profile)) {
										echo $widgetEdit;
									} elseif ($field->range) {
										echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
									} elseif ($field->field_type=="TEXT") {
										echo $form->textArea($profile,$field->varname,array(
											'rows'=>6, 
											'cols'=>50, 
											'class'=>"form-control"
										));
									} else {
										echo $form->textField($profile,$field->varname,array(
											'size'=>60,
											'maxlength'=>(($field->field_size)?$field->field_size:255),
											'class'=>"form-control"
										));
									}
									 ?>
									<?php echo $form->error($profile,$field->varname,array("class"=>"help-block")); ?>
								</div>	
							</div>	
							<?php
							}
						}
					?>
					<?php if (UserModule::doCaptcha('registration')): ?>
					<div class="form-group">
						<?php echo $form->labelEx($model,'verifyCode',array('class'=>"control-label col-xs-4 col-sm-4 col-md-4 col-lg-4")); ?>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<?php $this->widget('CCaptcha'); ?>
							<?php echo $form->textField($model,'verifyCode',array('class'=>"form-control")); ?>
							<?php echo $form->error($model,'verifyCode',array("class"=>"help-block")); ?>
							
							<p class="help-block"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?> <?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
						</div>
					</div>
					<?php endif; ?>
					
					<?php echo CHtml::submitButton(UserModule::t("Register"),
					array(
						'class'=>"btn btn-primary btn-block btn-lg"
					)); ?>
				<?php $this->endWidget(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>