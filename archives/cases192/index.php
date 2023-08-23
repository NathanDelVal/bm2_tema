<?php

	// get_header();

	// $id_page = get_the_ID();

	$arrayGET = $_GET;
	$allArgs = array();
	$resultadoBusca = "";

	if ( isset($_GET['buscar']) ) {
		$resultadoBusca = $_GET['buscar'];
	}

	if(empty($allArgs)){
		$allArgs = '';
	}
?>

	<section class="at-cases">
		<div class="container">
			<?php
				$arrayQuery = array(
					'post_type'			=> array( 'cases192' ),
					'orderby' 			=> 'menu_order',
					'order' 			=> 'ASC',
					'posts_per_page'	=> '-1',
					's'					=> $resultadoBusca,
					'tax_query'			=> array(
						'relation' => 'AND',
						array($allArgs)
					),
				);
				$query = new WP_Query($arrayQuery);
				if ( $query->have_posts() ) {
			?>
				<div class="row">
					<?php
						while ( $query->have_posts() ) {
							$query->the_post();

							$caseID = get_the_ID();
					?>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
							<div class="at-cases_box">
								<figure>
									<?php
										$wsg_case_item_img_id = get_post_meta( $caseID, 'wsg_case_item_img_id', true );
										getImageThumb($wsg_case_item_img_id, '316x300');
									?>
								</figure>
								<div class="at-cases_box_info">
									<div class="at-cases_box_info_header">
										<h3><?php echo get_the_title( $caseID ) ?></h3>
									</div>
									<a href="<?php echo get_the_permalink( $caseID ); ?>">
										Mais sobre o projeto <span class="flaticon-arrow-right"></span>
									</a>
								</div>
							</div>
						</div>
					<?php }wp_reset_query(); ?>
				</div>
			<?php } else{ ?>
				<div>
					<h2>Não encontramos nada.</h2>
					<a href="<?php bloginfo('url') ?>/cases">Ver todos</a>
				</div>
			<?php } ?>

			<div class="at-load-page">
				<p><a href="#">Carregar Mais</a></p>
			</div>
		</div>
	</section>

<?php get_footer(); ?>