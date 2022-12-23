<?php
//load css to my plugin
function load_css(){
    wp_enqueue_style('table_css_form', plugins_url('css/table.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'load_css');

function user_table_shortcode($atts) {
    // Extract the attributes
    extract(shortcode_atts(array(), $atts));

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['user']) && is_numeric($_GET['user'])) {
        global $wpdb;
        $user_id = absint($_GET['user']);
        $wpdb->query("DELETE FROM {$wpdb->users} WHERE ID = $user_id");
    }
    
    $shortcode_posts = get_posts( array(
        'posts_per_page' => -1, // get all posts
        'post_type'      => 'page', // only search pages
        's'              => '[editmeta_admin]', // search for the shortcode
    ));

    $shortcode_list = get_posts( array(
        'posts_per_page' => -1, // get all posts
        'post_type'      => 'page', // only search pages
        's'              => '[user_table]', // search for the shortcode
    ));

    // if any posts were found
    if ( ! empty( $shortcode_posts ) ) {
        // get the first post in the array
        $shortcode_post = $shortcode_posts[0];
    }

    if ( ! empty( $shortcode_link ) ) {
        // get the first post in the array
        $shortcode_list = $shortcode_list[0];
    }

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // Query for users
    $args = array(
        'orderby' => 'meta_value',
        'meta_key' => 'Socio',
        'order' => 'ASC',
        'number' => 10,
        'offset' => ($paged - 1) * 10,
    );
    if (!empty($_GET['user-search'])) {
      $args['search'] = '*' . esc_attr($_GET['user-search']) . '*';
    }
    $users = get_users($args);

    $total_users = count_users()['total_users'];
    $num_pages = ceil($total_users / 10);

    // Start the output buffer
    ob_start();
  
    // Display the search form
    ?>
    <div class="whole_table">
        <div class="list_header">
            <form method="get">
                <input class="buscar" type="text" name="user-search" id="user-search" value="<?php echo esc_attr(isset($_GET['user-search']) ? $_GET['user-search'] : ''); ?>">
                <input class="buscarbt" type="submit" value="Buscar">
            </form>
            <div class="pagination">
                <?php if ($paged > 1) : ?>
                    <a href="<?php echo add_query_arg(array('paged' => $paged - 1), get_permalink(get_the_ID())); ?>">Previous</a>
                <?php endif; ?>
                <?php if ($paged < $num_pages) : ?>
                    <a href="<?php echo add_query_arg(array('paged' => $paged + 1), get_permalink(get_the_ID())); ?>">Next</a>
                <?php endif; ?>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="table_header">Sócio</th>
                    <th class="table_header">Nome</th>
                    <th class="table_header">Email</th>
                    <th class="table_header">Função</th>
                    <th class="table_headers">Contribuinte</th>
                    <th class="table_header">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($users as $user) :
                    $i++;
                    if($i > 10){
                        break;
                    }
                    $socio = intval(get_user_meta($user->ID, 'Socio', true));
                    // If the "Socio" field is not set, get the highest value and increase it by 1
                    if (empty($socio)) {
                        global $wpdb;
                        $highest_socio = $wpdb->get_var("SELECT MAX(meta_value) FROM {$wpdb->usermeta} WHERE meta_key = 'Socio'");
                        $socio = $highest_socio + 1;
                        update_user_meta($user->ID, 'Socio', $socio);
                    }
                    ?>
                    <tr>
                        <td class="table_field"><?php echo esc_html($socio); ?></td>
                        <td class="table_field"><?php echo get_user_meta($user->ID, 'Nome', true); ?></td>
                        <td class="table_field"><?php echo esc_html($user->user_email); ?></td>
                        <td class="table_field"><?php echo get_user_meta($user->ID, 'Tiposocio', true); ?></td>
                        <td class="table_field"><?php echo get_user_meta($user->ID, 'Contribuinte', true); ?></td>
                        <td class="table_field">
                            <a class="edit" href="<?php echo home_url() . '/' . $shortcode_post->post_name . '/?user_id=' . $user->ID ?>">Editar</a>
                            <a class="delete" href="<?php echo esc_url(wp_nonce_url(add_query_arg(array('action' => 'delete', 'user' => $user->ID)), 'delete_user_' . $user->ID)); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  
    <?php
    // Return the output buffer
    return ob_get_clean();
}
add_shortcode('user_table', 'user_table_shortcode');

?>
