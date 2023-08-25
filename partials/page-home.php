<?php
// get_header();

$id_page = get_the_ID();

// echo '<pre>';
// echo print_r(get_post_meta($id_page));
// echo '</pre>';
?>

<section class="at-banner-main">
	<div class="swiper at-banner_carousel">
		<div class="swiper-wrapper">
			<?php
			$banner_items = get_post_meta($id_page, 'banner_items', true);
			if (!empty($banner_items)) {
				shuffle($banner_items);
				foreach ($banner_items as $key => $entry) {
			?>
					<div class="swiper-slide">
						<figure>
							<?php
							getImageThumb($entry['wsg_banner_items_img_id'], '1920x780');
							?>
						</figure>
						<figure class="at-banner-main_mobile">
							<?php
							getImageThumb($entry['wsg_banner_items_mobile_img_id'], '1020x860');
							?>
						</figure>
						<div class="at-banner-main_content">
							<div class="container">
								<div class="at-banner-main_box">
									<?php
									$wsg_banner_items_sobretitulo = $entry['wsg_banner_items_sobretitulo'];
									$wsg_banner_items_titulo = $entry['wsg_banner_items_titulo'];
									$wsg_banner_items_btn_link = $entry['wsg_banner_items_btn_link'];
									$wsg_banner_items_btn_texto = $entry['wsg_banner_items_btn_texto'];
									?>
									<?php if (!empty($wsg_banner_items_sobretitulo)) { ?>
										<span><?php echo $wsg_banner_items_sobretitulo; ?></span>
									<?php } ?>

									<?php if (!empty($wsg_banner_items_titulo)) { ?>
										<h1><?php echo $wsg_banner_items_titulo; ?></h1>
									<?php } ?>

									<?php if (!empty($wsg_banner_items_btn_texto)) { ?>
										<a class="at-btn-main" href="<?php echo $wsg_banner_items_btn_link; ?>"><?php echo $wsg_banner_items_btn_texto; ?></a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
	<script>
		var banner_carousel = new Swiper(".at-banner_carousel", {
			slidesPerView: 1,
			spaceBetween: 30,
			autoplay: {
				delay: 3500,
				disableOnInteraction: false,
			},
			loop: true,
			loopFillGroupWithBlank: true,
			navigation: {
				prevEl: ".at-banner_carousel .swiper-button-prev",
				nextEl: ".at-banner_carousel .swiper-button-next",
			},
		});
	</script>
</section>
<section class="at-cases">
	<div class="container">
		<header class="at-contrast-banner">
			<div class="at-contrast-banner_box">
				<span><?php echo get_post_meta($id_page, 'wsg_cases_sobretitulo', true); ?></span>
				<h2 class="at-title-main_01"><?php echo get_post_meta($id_page, 'wsg_cases_titulo', true); ?></h2>
			</div>
		</header>

		<div class="at-cases_carousel-container">
			<div class="swiper carousel_cases">
				<?php
				$wsg_cases_na_home = get_post_meta($id_page, 'wsg_cases_na_home', true);
				if (!empty($wsg_cases_na_home)) {
				?>
					<div class="swiper-wrapper">
						<?php
						foreach ($wsg_cases_na_home as $key => $caseID) {
						?>
							<div class="swiper-slide">
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
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
		<script>
			var carousel_cases = new Swiper(".carousel_cases", {
				slidesPerView: 4,
				spaceBetween: 30,
				autoplay: {
					delay: 2500,
					disableOnInteraction: false,
				},
				loop: true,
				loopFillGroupWithBlank: true,
				navigation: {
					prevEl: ".at-cases_carousel-container .swiper-button-prev",
					nextEl: ".at-cases_carousel-container .swiper-button-next",
				},
				breakpoints: {
					0: {
						slidesPerView: 1,
						spaceBetween: 30,
					},
					500: {
						slidesPerView: 2,
						spaceBetween: 30,
					},
					768: {
						slidesPerView: 3,
						spaceBetween: 30,
					},
					1024: {
						slidesPerView: 4,
						spaceBetween: 30,
					},
				}
			});
		</script>
	</div>
</section>


<section class="at-services">
	<div class="container">
		<h2 class="at-title-main_01"><?php echo get_post_meta($id_page, 'wsg_servicos_titulo', true); ?></h2>

		<div class="swiper carousel-servicos">
			<div class="swiper-wrapper">
				<?php
				$wsg_servicos_na_home = get_post_meta($id_page, 'wsg_servicos_na_home', true);
				if (!empty($wsg_servicos_na_home)) {
					foreach ($wsg_servicos_na_home as $key => $servicoID) {
				?>
						<div class="swiper-slide">
							<div class="at-services_box">
								<figure>
									<?php
									$wsg_servico_item_img_id = get_post_meta($servicoID, 'wsg_servico_item_img_id', true);
									getImageThumb($wsg_servico_item_img_id, 'full');
									?>
								</figure>
								<h3><?php echo get_the_title($servicoID) ?></h3>
								<?php echo wpautop(get_post_meta($servicoID, 'wsg_servico_item_resumo', true)); ?>
							</div>
						</div>
				<?php
					}
				}
				?>
			</div>
		</div>

		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div>
</section>

<script>
	var swiper = new Swiper(".carousel-servicos", {
		slidesPerView: 3,
		spaceBetween: 30,
		autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		},
		loop: true,
		loopFillGroupWithBlank: true,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {
			0: {
				slidesPerView: 1,
				spaceBetween: 30,
			},
			640: {
				slidesPerView: 1,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 30,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
		}
	});
</script>
<section class="at-estatisticas">
	<div class="container">
		<div class="row" style="gap:20px">
			<?php if(!empty(get_post_meta($id_page, 'wsg_estatisticas_texto', true))) { ?>
				<pre>
					<?= get_post_meta($id_page, 'wsg_estatisticas_texto', true); ?>
				</pre>
			<?php } ?>
			<ul class="d-flex align-items-center justify-content-center" style="gap:30px">
				<?php
					foreach(get_post_meta($id_page, 'estatisticas_itens', true) as $estatisticas) {
				?>
				<li class="d-flex flex-column align-items-center" style="gap:10px">
					<h1>
						<?= $estatisticas['wsg_estatisticas_itens']; ?>
					</h1>
					<p>
						<?= $estatisticas['wsg_estatisticas_itens_legenda']; ?>
					</p>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>
<!-- <section class="at-about">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="at-about_box">
					<figure>
						<?php
						//$wsg_sobre_img_id = get_post_meta($id_page, 'wsg_sobre_img_id', true);
						//getImageThumb($wsg_sobre_img_id, '550x550');
						?>
					</figure>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="at-about_box">
					<h2 class="at-title-main_01"><?php //echo get_post_meta($id_page, 'wsg_sobre_titulo', true); ?></h2>

					<?php //echo get_post_meta($id_page, 'wsg_sobre_texto', true); ?>
				</div>
			</div>
		</div>
	</div>
</section> -->
<section class="sobre-nos-banner">
		<?php if(!empty(get_post_meta($id_page, 'sobre_banner_md', true))) { ?>
			<figure>
				<img src="<?= get_post_meta($id_page, 'sobre_banner_md', true); ?>" class="display-md display-lg" alt="banner-md">
			</figure>
		<?php } ?>
		<?php if(!empty(get_post_meta($id_page, 'sobre_banner_sm', true))) { ?>
			<figure>
				<img src="<?= get_post_meta($id_page, 'sobre_banner_sm', true); ?>" class="display-sm" alt="banner-sm">
			</figure>
		<?php } ?>
</section>
<section class="at-client">
	<div class="container">
		<header>
			<h2 class="at-title-main_01"><?php echo get_post_meta($id_page, 'wsg_clientes_titulo', true); ?></h2>
		</header>
		<div class="row">
			<?php
			$wsg_clientes_imgs = get_post_meta($id_page, 'wsg_clientes_imgs', true);
			if (!empty($wsg_clientes_imgs)) {
				foreach ($wsg_clientes_imgs as $key => $value) {
			?>
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6">
						<div class="at-client_box">
							<figure>
								<?php getImageThumb($key, 'full'); ?>
							</figure>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</section>

<section class="at-team">
	<div class="container">
		<header>
			<h2 class="at-title-main_01"><?php echo get_post_meta($id_page, 'wsg_equipe_titulo', true); ?></h2>
		</header>
		<div class="row">
			<div class="owl-carousel">
			<?php
			$wsg_equipe_na_home = get_post_meta($id_page, 'wsg_equipe_na_home', true);
			if (!empty($wsg_equipe_na_home)) {
				foreach ($wsg_equipe_na_home as $key => $equipeID) {
			?>
						<div class="at-team_box">
							<figure>
								<?php
								$wsg_equipe_item_img_id = get_post_meta($equipeID, 'wsg_equipe_item_img_id', true);
								getImageThumb($wsg_equipe_item_img_id, '180x180');
								?>
							</figure>
							<h4><?php echo get_the_title($equipeID); ?></h4>
							<span><?php echo get_post_meta($equipeID, 'wsg_equipe_item_cargo', true); ?></span>
						</div>
			<?php
				}
			}
			?>
			</div>
		</div>
</section>

<?php //get_footer(); 
?>
		</div>
</section>