<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		<div id="sidebar">
		<?php
			$this->widget('bootstrap.widgets.TbMenu', array(
				'items'=>$this->menu
			));
		?>
		</div><!-- sidebar -->
	</div>
	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>