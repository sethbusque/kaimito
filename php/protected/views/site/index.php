<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => 'span.timeago',
));
?>

<div class="row">
	<div class="col-md-6 offset-3">
		<?php foreach($reply as $tweet){ ?>
			<div class="media" id="<?php echo $tweet['id']; ?>" style="border-top:#CCC 1px solid; padding-top:15px">
				<div class="pull-left">
					<img class="img-rounded" src="<?php echo $tweet['user']['profile_image_url']; ?>">
				</div>
				<div class="media-heading">
					<strong><?php echo $tweet['user']['screen_name']; ?></strong>
					<span class="text-muted"><?php echo $tweet['user']['name'] ?></span>
					<small class="pull-right">
						<span class="text-muted timeago" title="<?php echo date("c", strtotime($tweet['created_at'])); ?>"></span>
					</small>
				</div>
				<div class="media-body">
					<?php echo $tweet['text']; ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>