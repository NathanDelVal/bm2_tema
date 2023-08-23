<?php
	// Template name: Blog

	get_header();

	
	var_dump(get_queried_object());
?>

	<?php echo get_template_part( '../archives/post/index' ); ?>

<?php get_footer(); ?>