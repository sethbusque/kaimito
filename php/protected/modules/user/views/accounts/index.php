<?php
$this->pageTitle = "Accounts";
/* @var $this AccountsController */

$this->breadcrumbs=array(
	'Accounts',
);
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php $this->widget('application.modules.hybridauth.widgets.renderProviders'); ?>
	</div>
</div>