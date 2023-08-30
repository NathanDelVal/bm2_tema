<?php

	add_action( 'cmb2_admin_init', 'metaboxes_cases' );

	function metaboxes_cases() {

		// Detalhes do case na home
		$case_item = new_cmb2_box( array(
			'id'            => 'case_item',
			'title'         => __( 'Detalhes do case na home' ),
			'object_types'  => array( 'cases192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$case_item->add_field( array(
			'name'       => __( 'Imagem do case' ),
			'desc'       => __( 'Tamanho recomendado <strong>316x300</strong>' ),
			'id'         => 'wsg_case_item_img',
			'type' => 'file',
			'preview_size' => array( 316/1, 300/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Página do case
		$case_interna = new_cmb2_box( array(
			'id'            => 'case_interna',
			'title'         => __( 'Página do case' ),
			'object_types'  => array( 'cases192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$case_interna->add_field( array(
			'name'       => __( 'Imagem do banner do case' ),
			'desc'       => __( 'Tamanho recomendado <strong>1300x560</strong>' ),
			'id'         => 'wsg_case_interna_banner_img',
			'type' => 'file',
			'preview_size' => array( 1300/5, 560/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$case_interna->add_field( array(
			'name'       => __( 'Conteúdo do case' ),
			'id'         => 'wsg_case_interna_conteudo',
			'type'       => 'wysiwyg',
		) );
		$case_carrossel = new_cmb2_box( array(
			'id'            => 'case_carrossel',
			'title'         => __( 'Carrossel do Case' ),
			'object_types'  => array( 'cases192', ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'    => true,
			'closed'        => false,
		) );
		$case_itens = $case_carrossel->add_field( array(
			'id'            => 'wsg_case_carrossel',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$case_carrossel->add_group_field( $case_itens, array(
			// 'name'       => __( 'Imagem da arte' ),
			'desc'       => __( 'Tamanho recomendado <strong>1366x768</strong>' ),
			'id'         => 'wsg_case_carrossel_itens',
			'type' => 'file',
			'preview_size' => array( 1920/5, 780/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Método de especificação de página
		$projetosPage = get_page_by_path( 'cases', OBJECT, 'page' );

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