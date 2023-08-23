<?php

	// Está função registra o posttype equipe192
	function registrar_cpt_equipe(){

		// Equipe
		register_post_type('equipe192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Equipe'),
					'singular_name'	=> _x('membro', 'post type singular name'),
					'add_new'		=> _x('Novo membro', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo membro', 'portfolio item'),
					'edit_item'		=> _x('Editar membro', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'equipe'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-groups',
				'supports' 			=> array('title', 'page-attributes'),
				// 'capabilities' => array(
				// 	'edit_posts'             => 'cpt_equipe_edit_posts', // Permissão para: Controla se os objetos deste tipo de postagem podem ser editados.
				// 	'edit_others_posts'      => 'cpt_equipe_edit_others_posts', // Permissão para: Controla se os objetos desse tipo pertencentes a outros usuários podem ser editados. Se o tipo de postagem não suportar um autor, isso se comportará como edit_posts.
				// 	'publish_posts'          => 'cpt_equipe_publish_posts', // Permissão para: Controla a publicação de objetos desse tipo de postagem.
				// 	'delete_posts'           => 'cpt_equipe_delete_posts', // Permissão para: Controla se os objetos desse tipo de postagem podem ser excluídos.
				// 	'read_private_posts'     => 'cpt_equipe_read_private_posts', // Permissão para: Controla se os objetos privados podem ser lidos.

				// 	// 'read'                   => 'cpt_equipe_read', // Permissão para: Controla se os objetos deste tipo de postagem podem ser lidos.
				// 	'delete_private_posts'   => 'cpt_equipe_delete_private_posts', // Permissão para: Controla se os objetos privados podem ser excluídos.
				// 	'delete_published_posts' => 'cpt_equipe_delete_published_posts', // Permissão para: Controla se os objetos publicados podem ser excluídos.
				// 	'delete_others_posts'    => 'cpt_equipe_delete_others_posts', // Permissão para: Controla se os objetos pertencentes a outros usuários podem ser excluídos. Se o tipo de postagem não suportar um autor, isso se comportará como delete_posts.
				// 	'edit_private_posts'     => 'cpt_equipe_edit_private_posts', // Permissão para: Controla se os objetos privados podem ser editados.
				// 	'edit_published_posts'   => 'cpt_equipe_edit_published_posts', // Permissão para: Controla se os objetos publicados podem ser editados.
				// ),
			)
		);
	}

	add_action('init', 'registrar_cpt_equipe');


	$role = get_role( 'administrator' );

	$role->add_cap( 'cpt_equipe_edit_posts' );
	$role->add_cap( 'cpt_equipe_edit_others_posts' );
	$role->add_cap( 'cpt_equipe_publish_posts' );
	$role->add_cap( 'cpt_equipe_delete_posts' );
	$role->add_cap( 'cpt_equipe_read_private_posts' );
	$role->add_cap( 'cpt_equipe_delete_private_posts' );
	$role->add_cap( 'cpt_equipe_delete_published_posts' );
	$role->add_cap( 'cpt_equipe_delete_others_posts' );
	$role->add_cap( 'cpt_equipe_edit_private_posts' );
	$role->add_cap( 'cpt_equipe_edit_published_posts' );


?>