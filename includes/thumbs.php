<?php

	// tamanhos dinâmicos para thumbs
	function tamanhos_thumbs(){

		// Ativando suporte para imagem destacada
		add_theme_support('post-thumbnails');
		add_image_size( '1920x780', 1920, 780, true );
		add_image_size( '1920x650', 1920, 650, true );
		add_image_size( '1920x220', 1920, 220, true );
		add_image_size( '1300x560', 1300, 560, true );
		add_image_size( '1020x860', 1020, 860, true );
		add_image_size( '550x550', 550, 550, true );
		add_image_size( '316x300', 316, 300, true );
		add_image_size( '180x180', 180, 180, true );
		add_image_size( '100x100', 100, 100, true );
		add_image_size( '64x64', 64, 64, true );
	}
	add_action('after_setup_theme', 'tamanhos_thumbs');

?>