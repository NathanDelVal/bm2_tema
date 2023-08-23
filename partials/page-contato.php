<?php
	// Template name: Contato

	get_header();

	$id_page = get_the_ID();
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;
?>

	<?php include( "inc-breadcrumbs.php" ); ?>

	<section class="at-contact">
		<div class="container">
			<div class="row">

				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="at-contact_box">
						<div class="at-header-contact">
							<span><?php echo get_post_meta( $id_page, 'wsg_contato_01_sobretitulo', true ); ?></span>
							<h2><?php echo get_post_meta( $id_page, 'wsg_contato_01_titulo', true ); ?></h2>
						</div>

						<div class="at-contact_fone">
							<?php
								$entries = get_post_meta( $id_telefones, 'wsg_telefone_items', true );

								foreach ( (array) $entries as $key => $entry ) {

									if ( isset( $entry['wsg_telefone_nmr'] ) ) {
										$wsg_telefone_nmr = $entry['wsg_telefone_nmr'];
									}
									if ( isset( $entry['wsg_telefone_titulo'] ) ) {
										$wsg_telefone_titulo = $entry['wsg_telefone_titulo'];
									}
									if ( isset( $entry['wsg_telefone_link'] ) ) {
										$wsg_telefone_link = $entry['wsg_telefone_link'];
									}
									if ( isset( $entry['wsg_telefone_icone'] ) ) {
										$wsg_telefone_icone = $entry['wsg_telefone_icone'];
									}
							?>
								<h4>
									<a href="<?php echo $wsg_telefone_link; ?>" target="_blank">
										<?php if ( $wsg_telefone_icone == "phone-1" ){ ?>
											<span class="flaticon-phone-2"></span>
										<?php } else { ?>
											<span class="flaticon-whatsapp-2"></span>
										<?php } ?>
										<?php echo $wsg_telefone_nmr; ?>
									</a>
								</h4>
							<?php } ?>
							<?php
								$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
								foreach ( (array) $wsg_emails as $key => $email ) {
							?>
								<h4>
									<a href="mailto:<?php echo $email; ?>" target="_blank">
										<span class="flaticon-mail-2"></span>
										<?php echo $email; ?>
									</a>
								</h4>
							<?php
								}
							?>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 ajust-contat">
					<div class="at-contact_box">
						<h2 class="at-title-contact"><?php echo get_post_meta( $id_page, 'wsg_contato_01_contatos_titulo', true ); ?></h2>

						<form>
							<input type="text" placeholder="Nome">
							<input type="tel" placeholder="Telefone">
							<input type="email" placeholder="E-mail">
							<input type="text" placeholder="Qual o nome da sua empresa?">

							<textarea rows="" placeholder="Qual sua mensagem?"></textarea>
							<button class="at-btn-main">Enviar</button>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>

	<div class="at-mapa">
		<?php echo get_post_meta( $id_page, 'wsg_contato_01_iframe', true ); ?>
	</div>


<?php get_footer(); ?>