<?php
/**
 * Plugin Name: Load CSV To Meta
 * Plugin URI: www.scae.academy
 * Description: Load CSV To Meta
 * Version: 1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Create Listar Membros page
include('Modules/list_all_user.php');
add_shortcode('user_table', 'user_table_shortcode');
function createListPage(){
    // Create a new page
    $page_title = 'Listar Membros';
    $page_slug = 'listar-membros';
    $page_content = '[user_table]';
    $page_id = wp_insert_post(array(
        'post_title' => $page_title,
        'post_type' => 'page',
        'post_name' => $page_slug,
        'post_content' => $page_content,
        'post_status' => 'publish',
    ));
}

function deleteListPage(){
    // Get the page ID
    $page_id = get_page_by_path('listar-membros')->ID;

    // Delete the page
    wp_delete_post($page_id, true);
}

register_activation_hook(__FILE__, 'createListPage');            
register_deactivation_hook(__FILE__, 'deleteListPage');


//Create editmeta_admin page
include('Modules/editmeta_admin.php');
add_shortcode('editmeta_admin', 'create_csvadmin_shotcode');

function createEditMetaPage(){
    // Create a new page
    $page_title = 'Editar Usuários';
    $page_slug = 'edit-meta';
    $page_content = '[editmeta_admin]';
    $page_id = wp_insert_post(array(
        'post_title' => $page_title,
        'post_type' => 'page',
        'post_name' => $page_slug,
        'post_content' => $page_content,
        'post_status' => 'publish',
    ));
}

function deleteEditMetaPage(){
    // Get the page ID
    $page_id = get_page_by_path('edit-meta')->ID;

    // Delete the page
    wp_delete_post($page_id, true);
}

register_activation_hook(__FILE__, 'createEditMetaPage');
register_deactivation_hook(__FILE__, 'deleteEditMetaPage');

//create editmeta page
include('Modules/edit_csvinfo.php');
add_shortcode('usereditmeta', 'create_editcsv_shotcode');

function createEditCsvPage(){
    // Create a new page
    $page_title = 'Editar Informações';
    $page_slug = 'edit-my-meta';
    $page_content = '[usereditmeta]';
    $page_id = wp_insert_post(array(
        'post_title' => $page_title,
        'post_type' => 'page',
        'post_name' => $page_slug,
        'post_content' => $page_content,
        'post_status' => 'publish',
    ));
}

function deleteEditCsvPage(){
    // Get the page ID
    $page_id = get_page_by_path('edit-my-meta')->ID;

    // Delete the page
    wp_delete_post($page_id, true);
}

register_activation_hook(__FILE__, 'createEditCsvPage');
register_deactivation_hook(__FILE__, 'deleteEditCsvPage');


?>