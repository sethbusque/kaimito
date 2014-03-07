<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'),'icon'=>'cog')
		:array()),
    array('label'=>UserModule::t('Accounts'), 'url'=>array('/user/accounts'),'icon'=>'list'),
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
<div class="profile-masthead">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
						        'class'=>'img-circle',
						        'style'=>'width:128px;height:128px'
						    )
						)); ?>
					</div>
					<div class="media-heading">
						<h1 class="profile-masthead-title"><?php echo $model->username; ?></h1>
					</div>
					<div class="media-body">
						<span class="profile-masthead-detail" id="profile-status">
							<?php if($model->status == 0): ?>
								<i class="glyphicon glyphicon-remove"></i>
							<?php elseif($model->status == 1): ?>
								<i class="glyphicon glyphicon-ok"></i>
							<?php endif; ?>
							&nbsp;<?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?>
						</span>
						<span class="profile-masthead-detail" id="profile-email">
							<i class="glyphicon glyphicon-envelope"></i>
							&nbsp;<?php echo CHtml::encode($model->email); ?>
						</span>
						<span class="profile-masthead-detail" id="profile-status">
							<i class="glyphicon glyphicon-bookmark"></i>
							&nbsp;Member since <?php echo date("F j, Y",strtotime($model->create_at)); ?>
						</span>
						<span class="profile-masthead-detail" id="profile-status">
							<i class="glyphicon glyphicon-eye-open"></i>
							&nbsp;Last seen <?php echo date("F j, Y",strtotime($model->lastvisit_at)); ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="profile-actions">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php
					$this->widget('bootstrap.widgets.TbMenu', array(
						'type'=>'pills',
						'items'=>$this->menu
					));
				?>
			</div>
		</div>
	</div>
</div>
<div class="profile-header">
	<div class="container">

		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">Other Information</div>
					<table class="table">
						<?php 
							$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
							if ($profileFields) {
								foreach($profileFields as $field) {
									//echo "<pre>"; print_r($profile); die();
								?>
						<tr>
							<th><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
					    	<td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
						</tr>
								<?php
								}//$profile->getAttribute($field->varname)
							}
						?>
					</table>
				</div>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="" method="POST" role="form">
							<div class="form-group">
								<textarea class="form-control" id="" placeholder="What do you want to share today?"></textarea>
							</div>
							<button type="submit" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-share"></i>&nbsp;Share</button>
						</form>
					</div>
				</div>
				<?php 
					$posts = array(
						'Bacon ipsum dolor sit amet sirloin turkey ribeye drumstick jerky landjaeger brisket tongue ground round hamburger meatball leberkas flank. Venison pig chicken rump ribeye, short ribs cow pork chop tenderloin salami pork loin meatball biltong. Strip steak turkey pig bresaola chicken. Filet mignon shank pork belly ham hock tri-tip kevin shoulder andouille boudin pork. Pork tail pork belly shoulder venison strip steak filet mignon brisket spare ribs. Andouille sausage short loin, pork belly porchetta landjaeger flank ball tip sirloin brisket short ribs pastrami tongue tri-tip corned beef. Cow kielbasa drumstick, corned beef shankle filet mignon tail ball tip ribeye pastrami kevin pork.',

'Bresaola short loin brisket leberkas kielbasa ham hock fatback ground round doner rump cow landjaeger tri-tip. Meatball pork belly filet mignon pork chop bresaola shoulder flank pancetta ribeye ball tip tail beef. Short loin pork belly swine, rump biltong meatball corned beef leberkas. Leberkas tenderloin turducken kielbasa turkey pork loin boudin ground round. Chicken ham hock sausage, leberkas salami chuck meatball pork belly pastrami. Bacon brisket leberkas porchetta pork meatball. Spare ribs tenderloin frankfurter pork loin pancetta.',

'Chicken pork belly pig tri-tip brisket, short ribs landjaeger leberkas bacon tongue shankle spare ribs tail. Kielbasa biltong flank, turkey landjaeger short ribs pork loin porchetta ground round salami shankle pig ham. Pork meatball boudin pancetta sirloin. Salami biltong venison cow tri-tip drumstick turkey shankle beef ribs pig shoulder.',

'Pork loin pig doner, tongue salami turducken pastrami pork chop ham hock. Kielbasa rump ham hock, sirloin meatloaf hamburger flank kevin bacon venison. Bresaola ground round drumstick pork loin pork belly jerky leberkas doner. Turducken fatback shank, turkey porchetta beef ribs shankle filet mignon drumstick. Biltong short loin ham hock, pig bresaola pancetta kevin salami ball tip.',

'Biltong ball tip corned beef turkey pork loin. Swine jerky biltong tongue sausage. Pork chop capicola strip steak short loin biltong. Capicola doner bresaola tail.',

'Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
					);
					foreach ($posts as $post) {
					?>
					<div class="media">
						<?php $this->widget('ext.yii-gravatar.YiiGravatar', array(
						    'email'=>$model->email,
						    'size'=>48,
						    'defaultImage'=>Yii::app()->request->getBaseUrl(true) . '/images/kaimito-512.png',
						    'secure'=>false,
						    'rating'=>'r',
						    'emailHashed'=>false,
						    'htmlOptions'=>array(
						        'alt'=>'Gravatar image',
						        'title'=>'Gravatar image',
						        'class'=>'img-rounded pull-left',
						        'style'=>'width:48px;height:48px'
						    )
						)); ?>
						<div class="media-heading">
							<h4 class="media-title"><?php echo $model->username; ?></h4>
						</div>
						<div class="media-body">
							<?php echo $post; ?>
						</div>
					</div>
					<?php
					}
				?>
			</div>
		</div>
	</div>
</div>
