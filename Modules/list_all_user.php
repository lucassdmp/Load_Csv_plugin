<?php
function user_table_shortcode($atts) {
    // Extract the attributes
    extract(shortcode_atts(array(), $atts));

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['user']) && is_numeric($_GET['user'])) {
        global $wpdb;
        $user_id = absint($_GET['user']);
        $wpdb->query("DELETE FROM {$wpdb->users} WHERE ID = $user_id");
    }
  
    // Query for users
    $args = array(
      'orderby' => 'ID',
      'order' => 'ASC',
    );
    if (!empty($_GET['user-search'])) {
      $args['search'] = '*' . esc_attr($_GET['user-search']) . '*';
    }
    $users = get_users($args);
  
    // Start the output buffer
    ob_start();
  
    // Display the search form
    ?>
    <form method="get">
      <label for="user-search">Buscar:</label>
      <input type="text" name="user-search" id="user-search" value="<?php echo esc_attr(isset($_GET['user-search']) ? $_GET['user-search'] : ''); ?>">
      <input type="submit" value="Buscar">
    </form>
    <?php
  
    // Display the table
    ?>
    <table>
        <thead>
            <tr>
                <th class="table_header">ID</th>
                <th class="table_header">Email</th>
                <th class="table_header">Nome de Usuário</th>
                <th class="table_header">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td class="table_field"><?php echo esc_html($user->ID); ?></td>
                    <td class="table_field"><?php echo esc_html($user->user_email); ?></td>
                    <td class="table_field"><?php echo esc_html($user->user_login); ?></td>
                    <td class="table_field">
                        <a href="<?php
                            $shortcode_posts = get_posts( array(
                                'posts_per_page' => -1, // get all posts
                                'post_type'      => 'page', // only search pages
                                's'              => '[editmeta_admin]', // search for the shortcode
                            ));
                            // if any posts were found
                            if ( ! empty( $shortcode_posts ) ) {
                                // get the first post in the array
                                $shortcode_post = $shortcode_posts[0];
                            }
                            echo home_url() . '/' . $shortcode_post->post_name . '/?user_id=' . $user->ID ?>">Editar</a> |
                        <a href="<?php echo esc_url(wp_nonce_url(add_query_arg(array('action' => 'delete', 'user' => $user->ID)), 'bulk-users')); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
  
    // Return the output buffer
    return ob_get_clean();
}

add_shortcode('editmeta_admin', 'editmeta_admin_shortcode');
?>
