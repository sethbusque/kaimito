<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<div class="jumbotron kaimito-jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<h1>Hastle-free social media dashboard.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis facere dolore aliquid porro iure asperiores perferendis. Et quos nisi sed magni repellendus repudiandae vitae repellat nesciunt iusto beatae. Enim, quae?</p>
				<p>
					<a class="btn btn-primary btn-lg">Learn more <i class="glyphicon glyphicon-chevron-right"></i></a>
				</p>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h2>Sign up for free.</h2>
				<hr>
				<form action="" method="POST" role="form">
						<div class="form-group">
							<input type="text" class="form-control" id="" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="" placeholder="E-mail address">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="" placeholder="Password">
						</div>
						<hr>
						<button type="submit" class="btn btn-primary btn-block btn-lg"><i class="glyphicon glyphicon-send"></i> Join Kaimito</button>
					</form>	
			</div>
		</div>
	</div>
</div>
<div class="social-campaign" style="text-align:center;padding-bottom:48px">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>All your social networks at one glance.</h1>
				<h3 class="text-muted">Unify your social media into one stream.</h3>
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/facebook_square.png',"Facebook Logo",array("style"=>"width:64px;height:64px")); ?>
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/twitter_square.png',"Twitter Logo",array("style"=>"width:64px;height:64px")); ?>
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/googleplus_square.png',"Google+ Logo", array("style"=>"width:64px;height:64px")); ?>
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/linkedin_square.png',"LinkedIn Logo",array("style"=>"width:64px;height:64px")); ?>
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/tumblr_square.png',"Tumblr Logo", array("style"=>"width:64px;height:64px")); ?>
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/wordpress_square.png',"Wordpress Logo",array("style"=>"width:64px;height:64px")); ?>
			</div>
		</div>
	</div>
</div>
<div class="feature-campaign">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/carousel1a.jpg','Carousel 1'); ?>
				<div class="carousel-caption">
					<h1>Heading 1</h1>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sapiente nulla aliquam id et adipisci sed maiores voluptatibus quo quasi. Explicabo, fuga ab nemo quaerat ad saepe optio molestias enim!
				</div>
			</div>
			<div class="item">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/carousel2b.jpg','Carousel 2'); ?>
				<div class="carousel-caption">
					<h1>Heading 2</h1>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sapiente nulla aliquam id et adipisci sed maiores voluptatibus quo quasi. Explicabo, fuga ab nemo quaerat ad saepe optio molestias enim!
				</div>
			</div>
			<div class="item">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/carousel3c.jpg','Carousel 3'); ?>
				<div class="carousel-caption">
					<h1>Heading 3</h1>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sapiente nulla aliquam id et adipisci sed maiores voluptatibus quo quasi. Explicabo, fuga ab nemo quaerat ad saepe optio molestias enim!
				</div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
</div>