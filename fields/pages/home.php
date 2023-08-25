<?php

	add_action( 'cmb2_admin_init', 'metaboxes_home' );

	function metaboxes_home() {

		// Método de especificação de página
		$homePage = get_page_by_path( 'home', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($homePage && $homePage->ID != $post_id){
			return;
		}

		// Metabox Banner
		$banner = new_cmb2_box( array(
			'id'            => 'banners',
			'title'         => __( 'Banner' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$banner_items = $banner->add_field( array(
			'id'            => 'banner_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Imagem do banner' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x780</strong>' ),
			'id'         => 'wsg_banner_items_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 780/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Imagem do banner mobile' ),
			'desc'       => __( 'Tamanho recomendado <strong>1020x860</strong>' ),
			'id'         => 'wsg_banner_items_mobile_img',
			'type' => 'file',
			'preview_size' => array( 1020/2, 860/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Sobretítulo do banner' ),
			'id'         => 'wsg_banner_items_sobretitulo',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Titulo do banner' ),
			'id'         => 'wsg_banner_items_titulo',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Link do botão' ),
			'id'         => 'wsg_banner_items_btn_link',
			'type'       => 'text_url',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'texto do botão' ),
			'id'         => 'wsg_banner_items_btn_texto',
			'type'       => 'text',
		) );


		// Metabox Cases
		$cases = new_cmb2_box( array(
			'id'            => 'cases',
			'title'         => __( 'Cases' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$cases->add_field( array(
			'name'       => __( 'Sobretítulo da seção' ),
			'id'         => 'wsg_cases_sobretitulo',
			'type'       => 'text',
		) );
		$cases->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_cases_titulo',
			'type'       => 'text',
		) );
		$cases->add_field( array(
			'name'    => __( 'Listagem de cases' ),
			'desc'    => __( 'Arraste os cases da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos cases na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_cases_na_home',
			'type'    => 'custom_attached_posts',
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => -1,
					'post_type'      => 'cases192',
				),
			),
		) );


		// Metabox Serviços
		$servicos = new_cmb2_box( array(
			'id'            => 'servicos',
			'title'         => __( 'Serviços' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$servicos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_servicos_titulo',
			'type'       => 'text',
		) );
		$servicos->add_field( array(
			'name'    => __( 'Listagem de serviços' ),
			'desc'    => __( 'Arraste os serviços da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos serviços na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_servicos_na_home',
			'type'    => 'custom_attached_posts',
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => -1,
					'post_type'      => 'servicos192',
				),
			),
		) );


	//Metabox sobre banner
	$banner_sobre = new_cmb2_box( array(
		'id'            => 'banner_sobre',
		'title'         => __( 'Banner Sobre Nós' ),
		'object_types'  => array( 'page', ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
		'closed'        => true,
	) );
	$banner_sobre->add_field( array(
		'name'       => __( 'Banner Grande' ),
		'desc'       => __( 'Tamanho recomendado <strong><i>1366x768</i></strong>' ),
		'id'         => 'sobre_banner_md',
		'type' => 'file',
		'preview_size' => array( 550/1, 550/1 ),
		'query_args' => array( 'type' => 'image' ),
	) );
	$banner_sobre->add_field( array(
		'name'       => __( 'Banner Pequeno' ),
		'desc'       => __( 'Tamanho recomendado <strong><i>480x800</i></strong>' ),
		'id'         => 'sobre_banner_sm',
		'type' => 'file',
		'preview_size' => array( 550/1, 550/1 ),
		'query_args' => array( 'type' => 'image' ),
	) );

		// Metabox Clientes
		$clientes = new_cmb2_box( array(
			'id'            => 'clientes',
			'title'         => __( 'Clientes' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$clientes->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_clientes_titulo',
			'type'       => 'text',
		) );
		$clientes->add_field( array(
			'name'       => __( 'Imagens da seção' ),
			// 'desc'       => __( 'Tamanho recomendado <strong>468x800</strong>' ),
			'id'         => 'wsg_clientes_imgs',
			'type' => 'file_list',
			'preview_size' => array( 200/1, 80/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );


		// Metabox Equipe
		$equipe = new_cmb2_box( array(
			'id'            => 'equipe',
			'title'         => __( 'Equipe' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$equipe->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_equipe_titulo',
			'type'       => 'text',
		) );
		$equipe->add_field( array(
			'name'    => __( 'Listagem de membros' ),
			'desc'    => __( 'Arraste os membros da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos membros na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_equipe_na_home',
			'type'    => 'custom_attached_posts',
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => -1,
					'post_type'      => 'equipe192',
				),
			),
		) );

		//Metabox estatísticas
		$estatisticas = new_cmb2_box( array(
			'id'            => 'estatisticas',
			'title'         => __( 'Estatísticas' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$estatisticas_itens = $estatisticas->add_field( array(
			'id'            => 'estatisticas_itens',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$estatisticas->add_group_field( $estatisticas_itens, array(
			'name'       => __( 'Estatística' ),
			'id'         => 'wsg_estatisticas_itens',
			'type'       => 'text',
		) );
		$estatisticas->add_group_field( $estatisticas_itens, array(
			'name'       => __( 'Legenda' ),
			'id'         => 'wsg_estatisticas_itens_legenda',
			'type'       => 'text',
		) );
		$estatisticas->add_field( array(
			'name'       => __( 'Texto Descritivo' ),
			'id'         => 'wsg_estatisticas_texto',
			'type'       => 'wysiwyg',
		) );
};
