<?php
	get_header();

	$id_page = get_page_by_path( 'blog', OBJECT, 'page' )->ID;
?>

	<?php get_template_part( "partials/inc","breadcrumbs"); ?>

	<section data-aos="fade" class="wq-blog">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 col-xm-12 col-12">
					<div class="wq-blog-listagem">
						<?php
							global $query_string;
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$query_args = explode("&", $query_string);
							// essa variavel não deve ser reuniciada
							$search_query = array();
							foreach($query_args as $key => $string) {
								$query_split = explode("=", $string);
								$search_query[$query_split[0]] = urldecode($query_split[1]);
							}
							$search_query['post_type'] = array('post');
							$search_query['posts_per_page'] = 5;
							$search_query['paged'] = $paged;

							$query = new WP_Query( $search_query );
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									$attachID = get_post_thumbnail_id( get_the_ID() );

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
							<article class="wq-blog-box">
								<figure>
									<?php echo getImageThumb(get_post_thumbnail_id(), '970x630'); ?>
								</figure>
								<div class="wq-conteudo">
									<ul>
										<li><?php echo $htmlCategory; ?></li>
										<li><?php echo get_the_date('d', get_the_ID()); ?>.<?php echo get_the_date('m', get_the_ID()); ?>.<?php echo get_the_date('Y', get_the_ID()); ?></li>
									</ul>
									<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php echo wpautop(the_excerpt()); ?>
									<a href="<?php echo get_permalink(); ?>" class="wq-btn btn-type-5">Saiba Mais <span class="flaticon-arrow-right"></span></a>
								</div>
							</article>
						<?php } } wp_reset_query(); ?>

						<?php
							if (function_exists("pagination")) {
								pagination($query);
							}
						?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>