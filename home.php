<?php
	get_header();

	get_template_part( "partials/inc","breadcrumbs");
?>

	<?php echo get_template_part( 'archives/post/index' ); ?>

<?php get_footer(); ?>