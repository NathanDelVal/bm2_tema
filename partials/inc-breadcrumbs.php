	<div class="at-breacrumb">
		<div class="container">
			<div class="at-breacrumb_box">
				<?php if ( is_page() ) { ?>
					<h3><?php the_title(); ?></h3>
				<?php } elseif ( is_post_type_archive('servicos192') || is_singular('servicos192') ) { ?>
					<h3><?php echo get_page_by_path( 'servicos', OBJECT, 'page' )->post_title; ?></h3>
				<?php } elseif ( is_post_type_archive('cases192') || is_singular('cases192') ) { ?>
					<h3><?php echo get_page_by_path( 'cases', OBJECT, 'page' )->post_title; ?></h3>
				<?php } elseif ( is_category() ) { ?>
					<h3>Categoria: <?php echo $category->name; ?></h3>
				<?php } elseif ( is_search() ) { ?>
					<h3>Resultados de: <?php echo $_GET['s'];?></h3>
				<?php } elseif ( is_tag() ) { ?>
					<h3>Tag: <?php echo $tag->name; ?></h3>
				<?php } elseif ( is_singular('post') ) { ?>
					<h3><?php the_title(); ?></h3>
				<?php } ?>

				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					}
				?>
			</div>
		</div>
	</div>