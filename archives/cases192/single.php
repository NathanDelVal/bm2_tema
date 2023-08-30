	<section class="at-header_title">
		<div class="container">
			<h2 class="at-title-main_01"><?php the_title(); ?></h2>
		</div>
	</section>

	<div class="at-cases-banner">
		<div class="container">
			<div class="row" style="gap: 30px">
				<figure>
					<?php
					$wsg_case_interna_banner_img_id = get_post_meta(get_the_ID(), 'wsg_case_interna_banner_img_id', true);
					getImageThumb($wsg_case_interna_banner_img_id, '1300x560');
					?>
				</figure>
				<?php
				$carrossel_itens = get_post_meta(get_the_ID(), 'wsg_case_carrossel', true);
				if (!empty($carrossel_itens)) { ?>
					<div class="owl-carousel case-carousel">
						<?php foreach ($carrossel_itens as $item) { ?>
								<figure>
									<img src="<?= $item['wsg_case_carrossel_itens'] ?>" alt="">
								</figure>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<section class="at-cases_interno">
		<div class="container">
			<?php echo wpautop(get_post_meta(get_the_ID(), 'wsg_case_interna_conteudo', true)); ?>
		</div>
	</section>

	<section class="at-cases at-cases-relacionado">
		<div class="container">
			<h2 class="at-title-main_01">Outros Trabalhos</h2>
			<div class="row">
				<?php
				$arrayQueryRelacionados = array(
					'post_type'				=> array('cases192'),
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'posts_per_page'		=> '4',
					'post__not_in'			=> array(
						get_the_ID()
					),
				);
				$queryRelacionados = new WP_Query($arrayQueryRelacionados);
				while ($queryRelacionados->have_posts()) {
					$queryRelacionados->the_post();

					$caseID = get_the_ID();
				?>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
						<div class="at-cases_box">
							<figure>
								<?php
								$wsg_case_item_img_id = get_post_meta($caseID, 'wsg_case_item_img_id', true);
								getImageThumb($wsg_case_item_img_id, '316x300');
								?>
							</figure>
							<div class="at-cases_box_info">
								<div class="at-cases_box_info_header">
									<h3><?php the_title(); ?></h3>
								</div>
								<a href="<?php the_permalink(); ?>">Mais sobre o projeto <span class="flaticon-arrow-right"></span></a>
							</div>
						</div>
					</div>
				<?php }
				wp_reset_query(); ?>
			</div>
		</div>
	</section>