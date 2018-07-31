<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#5d5d5d66">
	<?php wp_head(); ?>
</head>
<body>
<?php include'lego/nav_menu.php'; ?>
<?php if ( is_active_sidebar( 'true_head' ) ) : 
		dynamic_sidebar( 'true_head' ); 
 endif; ?>
