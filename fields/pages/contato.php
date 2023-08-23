<?php

	add_action( 'cmb2_admin_init', 'metaboxes_contato' );

	function metaboxes_contato() {

		// Método de especificação de página
		$contato_Page = get_page_by_path( 'contato', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($contato_Page && $contato_Page->ID != $post_id){
			return;
		}

		// Metabox Contato
		$contato_01 = new_cmb2_box( array(
			'id'            => 'contato_01',
			'title'         => __( 'Contato' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			//'closed'        => true,
		) );

		$contato_01->add_field( array(
			'name'       => __( 'Sobretítulo da seção' ),
			'id'         => 'wsg_contato_01_sobretitulo',
			'type'       => 'text',
		) );
		$contato_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_contato_01_titulo',
			'type'       => 'text',
		) );
		$contato_01->add_field( array(
			'name'       => __( 'Título do formulário da seção' ),
			'id'         => 'wsg_contato_01_contatos_titulo',
			'type'       => 'text',
		) );
		$contato_01->add_field( array(
			'name'       => __( 'Iframe de localização do google maps' ),
			'id'         => 'wsg_contato_01_iframe',
			'type'       => 'textarea_code',
		) );


		// Metabox contato_recaptcha
		$contato_recaptcha = new_cmb2_box( array(
			'id'            => 'contato_recaptcha',
			'title'         => __( 'Recaptcha' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Configurações do ReCaptcha' ),
			'desc'			=> __( 'Essas configurações não são obrigatórias, porém recomendadas para evitar ataques.' ),
			'id'			=> 'wsg_contato_recaptcha_titulo',
			'type'			=> 'title',
		) );

		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Secret Key' ),
			'id'			=> 'wsg_contato_secret_key',
			'type'			=> 'textarea',
		) );
		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Código WidGet - (Site Key)' ),
			'id'			=> 'wsg_contato_widget',
			'type'			=> 'textarea',
		) );


	}

?>