<?php
$id_logo = get_page_by_path('configuracoes-da-logo', OBJECT, 'gerais')->ID;
$id_telefones = get_page_by_path('telefones', OBJECT, 'contatos')->ID;
$id_email = get_page_by_path('email', OBJECT, 'contatos')->ID;
$id_endereco = get_page_by_path('endereco', OBJECT, 'contatos')->ID;
?>

<footer class="footer-main">
	<div class="container">
		<div class="row">

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<div class="at-footer_box">
					<figure class="at-logo_footer">
						<img src="<?php bloginfo('template_url'); ?>/img/img-logo-bm2.png" alt="Logomarca BM2">
					</figure>
				</div>
			</div>

			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12">
				<div class="at-footer_box">
					<ul class="footer-list-info">
						<?php
						$entries = get_post_meta($id_telefones, 'wsg_telefone_items', true);

						foreach ((array) $entries as $key => $entry) {

							if (isset($entry['wsg_telefone_nmr'])) {
								$wsg_telefone_nmr = $entry['wsg_telefone_nmr'];
							}
							if (isset($entry['wsg_telefone_titulo'])) {
								$wsg_telefone_titulo = $entry['wsg_telefone_titulo'];
							}
							if (isset($entry['wsg_telefone_link'])) {
								$wsg_telefone_link = $entry['wsg_telefone_link'];
							}
							if (isset($entry['wsg_telefone_icone'])) {
								$wsg_telefone_icone = $entry['wsg_telefone_icone'];
							}
						?>
							<li>
								<a href="<?php echo $wsg_telefone_link; ?>" target="_blank">
									<span class="flaticon-<?php echo $wsg_telefone_icone; ?>"></span>
									<?php echo $wsg_telefone_nmr; ?>
								</a>
							</li>
						<?php } ?>
						<li>
							<a href="<?php echo get_post_meta($id_endereco, 'wsg_endereco_link', true); ?>">
								<span class="flaticon-placeholder-2"></span>
								<?php echo get_post_meta($id_endereco, 'wsg_endereco', true); ?>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="at-footer_box ajust-footer">
					<h4>Conecte-se conosco</h4>
					<ul class="list-media-social">
						<?php
						$arrayQuery_Midias_Sociais = array(
							'post_type'			=> array('redes_sociais'),
							'posts_per_page'	=> '-1',
							'orderby' 			=> 'menu_order',
							'order' 			=> 'ASC',
						);

						$query_Midias_Sociais = new WP_Query($arrayQuery_Midias_Sociais);

						while ($query_Midias_Sociais->have_posts()) {
							$query_Midias_Sociais->the_post();
						?>
							<li>
								<a href="<?php echo get_post_meta(get_the_ID(), 'wsg_redes_sociais_link', true); ?>" target="_blank">
									<span class="flaticon-<?php echo get_post_meta(get_the_ID(), 'wsg_redes_sociais_titulo', true); ?>"></span>
								</a>
							</li>
						<?php
						}
						wp_reset_query();
						?>
					</ul>
				</div>
			</div>

		</div>

		<div class="copy">
			<p>© Copyright 2023 - BM2 - Todos os direitos reservados.</p>
		</div>
	</div>
</footer>

<?php
$wsg_whatsapp_popup_link = get_post_meta($id_telefones, 'wsg_whatsapp_popup_link', true);
if (!empty($wsg_whatsapp_popup_link)) {
?>
	<div class="wq-whatsapp_btn">
		<a href="<?php echo $wsg_whatsapp_popup_link; ?>" target="_blank">
			<span class="flaticon-whatsapp-2"></span>
		</a>
	</div>
<?php } ?>

<?php
$id_google = get_page_by_path('configuracoes-do-google', OBJECT, 'gerais')->ID;

echo get_post_meta($id_google, 'wsg_codes_footer', true);
?>
<?php wp_footer(); ?>
<script>
	$(function() {
		$('.owl-carousel.video-carousel').owlCarousel({
			loop: true,
			nav: true,
			navText: ['<div class="swiper-button-prev"></div>', '<div class="swiper-button-next" style="transform:translateX(-10px)"></div>'],
			dots: false,
			autoplay: false,
			responsive: {
				0: {
					items: 1
				},
				769: {
					items: 2
				}
			}
		});
		$('.owl-carousel.case-carousel').owlCarousel({
			loop: true,
			nav: true,
			navText: ['<div class="swiper-button-prev"></div>', '<div class="swiper-button-next"></div>'],
			dots: false,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				992: {
					items: 3
				}
			}
		});
		$('.owl-carousel').owlCarousel({
			loop: true,
			nav: true,
			navText: ['<div class="swiper-button-prev"></div>', '<div class="swiper-button-next"></div>'],
			dots: false,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1
				},
				576: {
					items: 2
				},
				768: {
					items: 3
				},
				992: {
					items: 4
				}
			}
		});
	});
</script>
</body>

</html>