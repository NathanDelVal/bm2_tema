<?php 
// Add a custom metabox for product details
function cmb2_arquivos() {
    $arquivos = new_cmb2_box(array(
        'id'           => 'arquivo',
		'object_types'  => array( 'arquivos', ),
        'title'        => 'Informações sobre o arquivo',
        'object_types' => array('arquivos'), // Attach the metabox to the 'product' custom post type
        'context'      => 'normal',
        'priority'     => 'high',
    ));

	$arquivos->add_field( array(
		'id'         => 'wsg_arquivo_item_file',
		'name'        => 'Selecione o arquivo',
		'type' => 'file',
		'preview_size' => array( 316/1, 300/1 ),
		// 'query_args' => array( 'type' => 'image' ),
	) );
	$arquivos->add_field( array(
		'name'			=> __( 'Descreva brevemente o arquivo (opcional)' ),
		// 'desc'			=> __( 'Lista com ícones disponíveis abaixo' ),
		'id'			=> 'wsg_arquivo_item_desc',
		'type'			=> 'textarea',
	) );
}
add_action('cmb2_admin_init', 'cmb2_arquivos');
?>