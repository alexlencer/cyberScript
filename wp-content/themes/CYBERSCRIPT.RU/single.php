<?php get_header(); ?>
<div class="content">
	<div class="container-fluid">
	<div class="row">
			<div class="col-md-9 main">
				<?php global $more;
while( have_posts() ) : the_post();
	if( is_sticky() ) : // проверяем, является ли текущая запись прилепленной
		$more = 1; // полный пост
	else :
		$more = 0; // анонс
	endif;
	the_title(); // заголовок
	the_content('Подробнее &rarr;'); // контент
endwhile; ?>
		</div>
		<div class="col-md-2 sidebar">	
			<?php include'sidebar.php'; ?>
		</div>
	</div>
	</div>
</div>
<?php get_footer(); ?>