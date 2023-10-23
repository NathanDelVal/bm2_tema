<?php 
function register_cpt_arquivos() {
    $labels = array(
		'name' 			=> __('Arquivos'),
		'singular_name'	=> _x('arquivo', 'post type singular name'),
		'add_new'		=> _x('Novo arquivo', 'portfolio item'),
		'add_new_item'	=> _x('Adicionar novo arquivo', 'portfolio item'),
		'edit_item'		=> _x('Editar arquivo', 'portfolio item'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
		'rewrite' 			=> array('slug' => 'arquivos'),
        'supports' => array('title'),
        'has_archive' => true,
        'menu_icon' => 'dashicons-media-default',
    );

    register_post_type('arquivos', $args);
}
add_action('init', 'register_cpt_arquivos');

// $role = get_role( 'administrator' );

// $role->add_cap( 'cpt_arquivos_edit_posts' );
// $role->add_cap( 'cpt_arquivos_edit_others_posts' );
// $role->add_cap( 'cpt_arquivos_publish_posts' );
// $role->add_cap( 'cpt_arquivos_delete_posts' );
// $role->add_cap( 'cpt_arquivos_read_private_posts' );
// $role->add_cap( 'cpt_arquivos_delete_private_posts' );
// $role->add_cap( 'cpt_arquivos_delete_published_posts' );
// $role->add_cap( 'cpt_arquivos_delete_others_posts' );
// $role->add_cap( 'cpt_arquivos_edit_private_posts' );
// $role->add_cap( 'cpt_arquivos_edit_published_posts' );

?>
