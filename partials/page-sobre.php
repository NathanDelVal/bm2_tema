<?php
	// Template name: Sobre

	get_header();

	$id_page = get_the_ID();
?>

	<?php include( "inc-breadcrumbs.php" ); ?>

	<section class="at-about-main">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<figure>
						<?php
							$wsg_sobre_01_img_id = get_post_meta( $id_page, 'wsg_sobre_01_img_id', true );
							getImageThumb($wsg_sobre_01_img_id,'1000x1000');
						?>
					</figure>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<h2 class="at-title-main_01"><?php echo get_post_meta( $id_page, 'wsg_sobre_01_titulo', true ); ?></h2>
					<!-- <h3><?php echo get_post_meta( $id_page, 'wsg_sobre_01_subtitulo', true ); ?></h3> -->
					<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_01_conteudo', true )); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-02">
		<div class="container">
			<div class="row">
				<?php
					$entries = get_post_meta( $id_page, 'sobre_01_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						$wsg_sobre_01_items_titulo = null;
						$wsg_sobre_01_items_texto = null;

						if ( isset( $entry['wsg_sobre_01_items_titulo'] ) ) {
							$wsg_sobre_01_items_titulo = $entry['wsg_sobre_01_items_titulo'];
						}
						if ( isset( $entry['wsg_sobre_01_items_texto'] ) ) {
							$wsg_sobre_01_items_texto = $entry['wsg_sobre_01_items_texto'];
						}
				?>
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="wq-sobre_01">
							<?php if ($wsg_sobre_01_items_titulo != null && strlen($wsg_sobre_01_items_titulo) > 0) { ?>
								<span><?php echo $wsg_sobre_01_items_titulo; ?></span>
							<?php } ?>
							<?php if ($wsg_sobre_01_items_texto != null && strlen($wsg_sobre_01_items_texto) > 0) { ?>
								<h4><?php echo $wsg_sobre_01_items_texto; ?></h4>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="at-about-main_02">
		<div class="container">
			<div class="row">
				<?php
					$entries = get_post_meta( $id_page, 'sobre_02_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						$wsg_sobre_02_items_titulo = null;
						$wsg_sobre_02_items_texto = null;

						if ( isset( $entry['wsg_sobre_02_items_img_id'] ) ) {
							$wsg_sobre_02_items_img_id = $entry['wsg_sobre_02_items_img_id'];
						}
						if ( isset( $entry['wsg_sobre_02_items_titulo'] ) ) {
							$wsg_sobre_02_items_titulo = $entry['wsg_sobre_02_items_titulo'];
						}
						if ( isset( $entry['wsg_sobre_02_items_texto'] ) ) {
							$wsg_sobre_02_items_texto = $entry['wsg_sobre_02_items_texto'];
						}
				?>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="wq-mvv-item">
							<figure>
								<?php getImageThumb($wsg_sobre_02_items_img_id,'64x64') ?>
							</figure>
							<h4><?php echo $wsg_sobre_02_items_titulo; ?></h4>
							<?php echo wpautop($wsg_sobre_02_items_texto); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<?php echo get_post_meta( $id_page, 'wsg_contato_01_iframe', true ); ?>


<?php get_footer(); ?>