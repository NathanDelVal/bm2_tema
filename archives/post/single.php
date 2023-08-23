<?php
	get_header();

	$id_page = get_page_by_path( 'blog', OBJECT, 'page' )->ID;
?>

	<?php
		if (have_posts()) : while (have_posts()) : the_post();
			$attachID = get_post_thumbnail_id(get_the_ID());
			$categories = get_the_terms( get_the_ID(), 'category' );
			$htmlCategory = '';
			if ( $categories && ! is_wp_error( $categories ) ){
				$draught_links = array();
				foreach ($categories as $category) {
					$item = '<a href="'.get_term_link($category->term_id, "category").'" title="'.$category->name.'" > '.$category->name.'</a>';
					array_push($draught_links, $item);
				}
				$htmlCategory = implode(' | ', $draught_links);
			}
	?>

	<section data-aos="fade" class="wq-blog">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 col-xm-12 col-12">
					<div class="wq-blog-listagem">
						<article class="wq-blog-box">
							<figure>
								<?php echo getImageThumb(get_post_thumbnail_id(), '970x630'); ?>
							</figure>
							<div class="wq-conteudo">
								<ul>
									<li><?php echo $htmlCategory; ?></li>
									<li><?php echo get_the_date('d', $item->ID); ?>.<?php echo get_the_date('m', $item->ID); ?>.<?php echo get_the_date('Y', $item->ID); ?></li>
								</ul>
								<h2><?php the_title(); ?></h2>
								<?php echo wpautop(the_content()); ?>
							</div>
						</article>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>

	<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>

<?php get_footer(); ?>