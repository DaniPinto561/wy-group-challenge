<!-- HERO -->
<?php 
	$title = get_field('title'); 
	$text = get_field('text'); 
	$bg_image = get_field('bg_image'); 
?>
<div class="row">
	<div class="col-12 bg-image-wrapper d-flex align-items-center justify-content-center" style="background-image:url(<?php echo $bg_image;?>)">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class=""><?php echo $title;?></h1>
				<p><?php echo $text;?></p>
			</div>
		</div>
	</div>
</div>

