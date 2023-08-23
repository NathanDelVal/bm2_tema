<?php

	// Está função registra o posttype servicos192
	function registrar_cpt_servicos(){

		// Serviços
		register_post_type('servicos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Serviços'),
					'singular_name'	=> _x('serviço', 'post type singular name'),
					'add_new'		=> _x('Novo serviço', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo serviço', 'portfolio item'),
					'edit_item'		=> _x('Editar serviço', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'servicos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
				// 'capabilities' => array(
				// 	'edit_posts'             => 'cpt_servicos_edit_posts', // Permissão para: Controla se os objetos deste tipo de postagem podem ser editados.
				// 	'edit_others_posts'      => 'cpt_servicos_edit_others_posts', // Permissão para: Controla se os objetos desse tipo pertencentes a outros usuários podem ser editados. Se o tipo de postagem não suportar um autor, isso se comportará como edit_posts.
				// 	'publish_posts'          => 'cpt_servicos_publish_posts', // Permissão para: Controla a publicação de objetos desse tipo de postagem.
				// 	'delete_posts'           => 'cpt_servicos_delete_posts', // Permissão para: Controla se os objetos desse tipo de postagem podem ser excluídos.
				// 	'read_private_posts'     => 'cpt_servicos_read_private_posts', // Permissão para: Controla se os objetos privados podem ser lidos.

				// 	// 'read'                   => 'cpt_servicos_read', // Permissão para: Controla se os objetos deste tipo de postagem podem ser lidos.
				// 	'delete_private_posts'   => 'cpt_servicos_delete_private_posts', // Permissão para: Controla se os objetos privados podem ser excluídos.
				// 	'delete_published_posts' => 'cpt_servicos_delete_published_posts', // Permissão para: Controla se os objetos publicados podem ser excluídos.
				// 	'delete_others_posts'    => 'cpt_servicos_delete_others_posts', // Permissão para: Controla se os objetos pertencentes a outros usuários podem ser excluídos. Se o tipo de postagem não suportar um autor, isso se comportará como delete_posts.
				// 	'edit_private_posts'     => 'cpt_servicos_edit_private_posts', // Permissão para: Controla se os objetos privados podem ser editados.
				// 	'edit_published_posts'   => 'cpt_servicos_edit_published_posts', // Permissão para: Controla se os objetos publicados podem ser editados.
				// ),
			)
		);
	}

	add_action('init', 'registrar_cpt_servicos');


	$role = get_role( 'administrator' );

	$role->add_cap( 'cpt_servicos_edit_posts' );
	$role->add_cap( 'cpt_servicos_edit_others_posts' );
	$role->add_cap( 'cpt_servicos_publish_posts' );
	$role->add_cap( 'cpt_servicos_delete_posts' );
	$role->add_cap( 'cpt_servicos_read_private_posts' );
	$role->add_cap( 'cpt_servicos_delete_private_posts' );
	$role->add_cap( 'cpt_servicos_delete_published_posts' );
	$role->add_cap( 'cpt_servicos_delete_others_posts' );
	$role->add_cap( 'cpt_servicos_edit_private_posts' );
	$role->add_cap( 'cpt_servicos_edit_published_posts' );


?>