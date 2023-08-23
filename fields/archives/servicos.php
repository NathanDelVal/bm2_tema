<?php

	add_action( 'cmb2_admin_init', 'metaboxes_servicos' );

	function metaboxes_servicos() {

		// Detalhes do serviço na home
		$servico_item = new_cmb2_box( array(
			'id'            => 'servico_item',
			'title'         => __( 'Detalhes do serviço na home' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$servico_item->add_field( array(
			'name'       => __( 'Imagem do serviço' ),
			'desc'       => __( 'Tamanho recomendado <strong>100x100</strong>' ),
			'id'         => 'wsg_servico_item_img',
			'type' => 'file',
			'preview_size' => array( 100/1, 100/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$servico_item->add_field( array(
			'name'       => __( 'Resumo do serviço' ),
			'id'         => 'wsg_servico_item_resumo',
			'type'       => 'wysiwyg',
		) );

		// // Página do serviço
		// $servico_interna = new_cmb2_box( array(
		// 	'id'            => 'servico_interna',
		// 	'title'         => __( 'Página do serviço' ),
		// 	'object_types'  => array( 'servicos192', ),
		// 	'context'       => 'normal',
		// 	'priority'      => 'high',
		// 	'show_names'    => true,
		// 	'closed'        => false,
		// ) );
		// $servico_interna->add_field( array(
		// 	'name'       => __( 'Imagem do serviço' ),
		// 	'desc'       => __( 'Tamanho recomendado <strong>556x430</strong>' ),
		// 	'id'         => 'wsg_servico_interna_imgs',
		// 	'type' => 'file_list',
		// 	'preview_size' => array( 556/1, 430/1 ),
		// 	'query_args' => array( 'type' => 'image' ),
		// ) );
		// $servico_interna->add_field( array(
		// 	'name'       => __( 'Conteúdo do serviço' ),
		// 	'id'         => 'wsg_servico_interna_conteudo',
		// 	'type'       => 'wysiwyg',
		// ) );

		// Método de especificação de página
		$projetosPage = get_page_by_path( 'servicos', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($projetosPage && $projetosPage->ID != $post_id){
			return;
		}

	}

?>