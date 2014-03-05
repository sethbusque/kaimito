<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user'),'icon'=>'list'),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit'),'icon'=>'pencil'),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword'),'icon'=>'lock'),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout'),'icon'=>'log-out'),
);
?>
<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="media">
	<div class="profile-image pull-left" style="width:128px;height:128px">
		<?php $this->widget('ext.yii-gravatar.YiiGravatar', array(
		    'email'=>$model->email,
		    'size'=>128,
		    'defaultImage'=>Yii::app()->request->getBaseUrl(true) . '/images/kaimito-512.png',
		    'secure'=>false,
		    'rating'=>'r',
		    'emailHashed'=>false,
		    'htmlOptions'=>array(
		        'alt'=>'Gravatar image',
		        'title'=>'Gravatar image',
		        'class'=>'img-rounded'
		    )
		)); ?>
	</div>
	<div class="media-heading">
		<h1><?php echo $model->username; ?></h1>
	</div>
	<div class="media-body">
		<table class="dataGrid">
			<tr>
				<th class="label label-info"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
			    <td><?php echo CHtml::encode($model->username); ?></td>
			</tr>
			<?php 
				$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
				if ($profileFields) {
					foreach($profileFields as $field) {
						//echo "<pre>"; print_r($profile); die();
					?>
			<tr>
				<th class="label label-info"><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
		    	<td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
			</tr>
					<?php
					}//$profile->getAttribute($field->varname)
				}
			?>
			<tr>
				<th class="label label-info"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
		    	<td><?php echo CHtml::encode($model->email); ?></td>
			</tr>
			<tr>
				<th class="label label-info"><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
		    	<td><?php echo $model->create_at; ?></td>
			</tr>
			<tr>
				<th class="label label-info"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
		    	<td><?php echo $model->lastvisit_at; ?></td>
			</tr>
			<tr>
				<th class="label label-info"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
		    	<td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
			</tr>
		</table>
	</div>
</div>
