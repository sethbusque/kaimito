<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
?>

<div class="row">
	<div class="col-xs-8 col-sm-6 col-md-6 col-lg-4 col-xs-offset-2 col-sm-offset-3 col-md-offset-3 col-lg-offset-4">
		<div class="panel panel-default">
		  	<div class="panel-body">
		  		<h1><?php echo UserModule::t("Login"); ?></h1>
				<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

				<div class="success">
					<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
				</div>

				<?php endif; ?>
				<?php echo CHtml::beginForm('','post'); ?>

					<?php echo CHtml::errorSummary($model); ?>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model,'username',array('class'=>"control-label")); ?>
						<?php echo CHtml::activeTextField($model,'username',array('class'=>"form-control")) ?>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model,'password',array('class'=>"control-label")); ?>
						<?php echo CHtml::activePasswordField($model,'password',array('class'=>"form-control")) ?>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
						<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
					</div>

					<?php echo CHtml::submitButton(UserModule::t("Login"),
						array(
							'class'=>"btn btn-primary btn-block btn-lg"
						)); ?>
					
				<?php echo CHtml::endForm(); ?>
				<hr>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<span class="pull-left">
							<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?>
						</span>
						<span class="pull-right">
							<?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
						</span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<span class="pull-left">
							Sign in with your account
						</span>
						<span class="pull-right">
							<?php $this->widget('application.modules.hybridauth.widgets.renderProviders',array(
								'target'=>'login'
							)); ?>
						</span>
					</div>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>