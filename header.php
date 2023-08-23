<?php
	$id_logo = get_page_by_path( 'configuracoes-da-logo', OBJECT, 'gerais' )->ID;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta http-equiv="Content-Language" content="pt-br">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11184321937"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-11184321937');
    </script>
	<?php
		$wsg_favicon_img_id = get_post_meta( $id_logo, 'wsg_favicon_img_id', true );
		if ($wsg_favicon_img_id !== NULL && strlen($wsg_favicon_img_id) > 0) {
			$wsg_favicon = wp_get_attachment_image_src($wsg_favicon_img_id);
			if ($wsg_favicon !== NULL && count($wsg_favicon) > 0) {
				?>
					<link rel="icon" href="<?php echo $wsg_favicon[0]; ?>" type="image/x-icon"/>
				<?php
			}
		}
	?>

	<!-- CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">

	<?php if ( is_front_page() ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pages/home.css">
	<?php } elseif ( is_page( 'contato' )) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pages/contato.css">
	<?php } elseif ( is_page( 'sobre' )) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pages/sobre.css">
	<?php } elseif ( is_post_type_archive( 'cases192' ) || is_singular( 'cases192' ) ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/archives/cases/index.css">
	<?php } elseif ( is_home() || is_singular('post') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/archives/post/index.css">
	<?php } ?>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/icons/flaticon.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>


	<!-- Fonts Google -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Toto:wght@400;500;600&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

	<!-- SCRIPTS -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


	<?php wp_head(); ?>

	<?php
		$id_google = get_page_by_path( 'configuracoes-do-google', OBJECT, 'gerais' )->ID;

		echo get_post_meta( $id_google, 'wsg_codes_header', true );
	?>

</head>
<body>
	<?php echo get_post_meta( $id_google, 'wsg_codes_body', true ); ?>

	<header class="at-header-main">
		<div class="container">
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
						<?php
							$wsg_logo_header_img_id = get_post_meta( $id_logo, 'wsg_logo_header_img_id', true );
							getImageThumb($wsg_logo_header_img_id, 'full');
						?>
					</a>
					<button button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php
						wp_nav_menu( array(
							'theme_location'    => 'header-menu',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'container_id'      => 'navbarNavDropdown',
							'menu_class'        => 'navbar-nav',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
						) );
					?>
				</div>
			</nav>
		</div>
	</header>
