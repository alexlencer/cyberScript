<?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
		<div class="img-post">
					<?php if ( has_post_thumbnail()) {the_post_thumbnail(array(600,300),array("class"=>"alignleft post_thumbnail  img-thumbnail "));} ?>
		</div>
		<?php the_content(); ?>
		<br>
		<a href="<?php the_permalink(); ?>"> <button type="button" class="btn btn-info">Читать далее..</button></a>
	</div>

	<?php } /* конец while */ ?>

	<div class="navigation">
		<div class="next-posts"><?php next_posts_link(); ?></div>
		<div class="prev-posts"><?php previous_posts_link(); ?></div>
	</div>

<?php
} // конец if
else 
	echo "<h2>Записей нет.</h2>";?>

