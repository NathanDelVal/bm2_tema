<?php

// get_header();

// $id_page = get_the_ID();

$arrayGET = $_GET;
$allArgs = array();
$resultadoBusca = "";

if (isset($_GET['buscar'])) {
	$resultadoBusca = $_GET['buscar'];
}

if (empty($allArgs)) {
	$allArgs = '';
}
?>

<section class="at-cases">
	<div class="container">
		<?php
		$arrayQuery = array(
			'post_type'			=> array('cases192'),
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
		// echo '<pre>';
		// echo var_dump($query);
		// echo '</pre>';
		if ($query->have_posts()) {
		?>
			<div class="row" style="gap:50px">
				<h2 class="at-title-main_01">Conheça alguns de nossos maiores cases</h2>
				<div class="owl-carousel">
					<?php
					while ($query->have_posts()) {
						$query->the_post();

						$caseID = get_the_ID();
					?>
						<!-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12"> -->
						<div class="at-cases_box">
							<figure>
								<?php
								$wsg_case_item_img_id = get_post_meta($caseID, 'wsg_case_item_img_id', true);
								getImageThumb($wsg_case_item_img_id, '316x300');
								?>
							</figure>
							<div class="at-cases_box_info">
								<div class="at-cases_box_info_header">
									<h3><?php echo get_the_title($caseID) ?></h3>
								</div>
								<a href="<?php echo get_the_permalink($caseID); ?>">
									Mais sobre o projeto <span class="flaticon-arrow-right"></span>
								</a>
							</div>
						</div>
					<?php }
					wp_reset_query(); ?>
				</div>
				<h2 class="at-title-main_01">Conheça nossas principais campanhas</h2>
				<div class="owl-carousel video-carousel">
					<div><iframe src="https://www.youtube.com/embed/8AGQNwsj77A?si=ZSefWFiuxDKbB6dO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/Hih7ngzryrw?si=fI1MQTt7WsrLI0Yr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/jJBiVp8uROc?si=ii7nIVHPeYa28fB5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/mn0yCg-S2BA?si=hlPeYlfnmNmHkilc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/U5T8UlYxU5k?si=qi9UgyZQTYT4d-2_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/3PT81iNmmzA?si=kiV52152vN-NW6Ak" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/tWhGWva1_MI?si=yxdoSlVpz26rhI48" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/bce10RglpD0?si=EuGk6eJ1cdfgwmX5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/ogDbzav0Ak8?si=rWdXX1CSbYotbf4M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
					<div><iframe src="https://www.youtube.com/embed/yOR2GhnXGLw?si=UBXPRBIv8L_in8Lq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
				</div>
			</div>
			<?php //} else { 
			?>
			<!-- <div>
				<h2>Não encontramos nada.</h2>
				<a href="<?php //bloginfo('url') 
							?>/cases">Ver todos</a>
			</div> -->
		<?php } ?>

		<!-- <div class="at-load-page">
			<p><a href="#">Carregar Mais</a></p>
		</div> -->
	</div>
	<br>
</section>

<?php get_footer(); ?>