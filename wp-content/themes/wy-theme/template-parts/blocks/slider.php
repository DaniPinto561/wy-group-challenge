
<!-- GALERIA -->
<?php $i=0; $j=0;
$title = get_field('title');
$text = get_field('text');
?>

<div class="row">
	<div class="col-12 spacer"></div>
</div>
<div class="row">
	<div class="col-12">
		<div class="row">
			<div class="col-12 col-md-8 offset-md-2 mt-5 mb-5">
				<h2><?php echo $title;?></h2>
				<p><?php echo $text;?></p>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-12 p-0 ">
	<div id="wy-carousel" class="carousel slide carousel-fade" data-ride="carousel">
	
		<ol class="carousel-indicators">
		<?php if( have_rows('carousel') ):
		 while( have_rows('carousel') ) : the_row();  ?>
			<li data-target="#wy-carousel" data-slide-to="<?php echo $i;?>" class=" <?php if($i==0): echo 'active'; endif;?>"></li>	
		<?php $i++; endwhile; endif;?>
		</ol>
	
		<div class="carousel-inner">
		<?php if( have_rows('carousel') ):
		 while( have_rows('carousel') ) : the_row(); 
			$image = get_sub_field('imagem'); 
			?>
			<div class="carousel-item <?php if($j==0): echo 'active'; endif;?>">
				<div class="overlay-w"></div>
				<img class="d-block w-100" src="<?php echo $image;?>" alt="<?php echo $j;?>-slide">
			</div>
		<?php $j++; endwhile; endif;?>
		</div>
		<a class="carousel-control-prev" href="#wy-carousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#wy-carousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		</div>



	</div>
</div>