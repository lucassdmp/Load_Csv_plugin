<?php
function edit_usermeta_shortcode($user = null) {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        if ( isset( $_POST['submit'] ) ) {
            update_user_meta( $current_user->ID, 'Nome', sanitize_text_field( $_POST['Nome'] ) );
            update_user_meta( $current_user->ID, 'Morada', sanitize_text_field( $_POST['Morada'] ) );
            update_user_meta( $current_user->ID, 'Localidade', sanitize_text_field( $_POST['Localidade'] ) );
            update_user_meta( $current_user->ID, 'Codpostal', sanitize_text_field( $_POST['Codpostal'] ) );
            update_user_meta( $current_user->ID, 'Nascimento', sanitize_text_field( $_POST['Nascimento'] ) );
            update_user_meta( $current_user->ID, 'Nomecargo', sanitize_text_field( $_POST['Nomecargo'] ) );
            update_user_meta( $current_user->ID, 'Tiposocio', sanitize_text_field( $_POST['Tiposocio'] ) );
            update_user_meta( $current_user->ID, 'Admissao', sanitize_text_field( $_POST['Admissao'] ) );
            update_user_meta( $current_user->ID, 'Activo', sanitize_text_field( $_POST['Activo'] ) );
            update_user_meta( $current_user->ID, 'Pagamento', sanitize_text_field( $_POST['Pagamento'] ) );
            update_user_meta( $current_user->ID, 'Valor', sanitize_text_field( $_POST['Valor'] ) );
            update_user_meta( $current_user->ID, 'Tel', sanitize_text_field( $_POST['Tel'] ) );
            update_user_meta( $current_user->ID, 'Tm', sanitize_text_field( $_POST['Tm'] ) );
            update_user_meta( $current_user->ID, 'Email', sanitize_email( $_POST['Email'] ) );
            update_user_meta( $current_user->ID, 'Internet', sanitize_text_field( $_POST['Internet'] ) );
            update_user_meta( $current_user->ID, 'Contribuinte', sanitize_text_field( $_POST['Contribuinte'] ) );
            update_user_meta( $current_user->ID, 'Nrbi', sanitize_text_field( $_POST['Nrbi'] ) );
            update_user_meta( $current_user->ID, 'Naturalidade', sanitize_text_field( $_POST['Naturalidade'] ) );
            update_user_meta( $current_user->ID, 'Nacionalidade', sanitize_text_field( $_POST['Nacionalidade'] ) );
            update_user_meta( $current_user->ID, 'Nib', sanitize_text_field( $_POST['Nib'] ) );
            update_user_meta( $current_user->ID, 'Banco', sanitize_text_field( $_POST['Banco'] ) );
            update_user_meta( $current_user->ID, 'Transferencia', sanitize_text_field( $_POST['Transferencia'] ) );
            update_user_meta( $current_user->ID, 'Titulo1', sanitize_text_field( $_POST['Titulo1'] ) );
            update_user_meta( $current_user->ID, 'Titulo2', sanitize_text_field( $_POST['Titulo2'] ) );
            update_user_meta( $current_user->ID, 'Joia', sanitize_text_field( $_POST['Joia'] ) );
            update_user_meta( $current_user->ID, 'Departamento', sanitize_text_field( $_POST['Departamento'] ) );
            update_user_meta( $current_user->ID, 'Cobranca', sanitize_text_field( $_POST['Cobranca'] ) );
            update_user_meta( $current_user->ID, 'Idade', sanitize_text_field( $_POST['Idade'] ) );
            update_user_meta( $current_user->ID, 'Datasaida', sanitize_text_field( $_POST['Datasaida'] ) );

            echo '<div class="success">Usermeta fields updated successfully.</div>';
        }

        echo '<form method="post">';
        echo '<p><label for="Nome">Nome:</label><br /><input type="text" name="Nome" value="' . get_user_meta( $current_user->ID, 'Nome', true ) . '" /></p>';
        echo '<p><label for="Morada">Morada:</label><br /><input type="text" name="Morada" value="' . get_user_meta( $current_user->ID, 'Morada', true ) . '" /></p>';
        echo '<p><label for="Localidade">Localidade:</label><br /><input type="text" name="Localidade" value="' . get_user_meta( $current_user->ID, 'Localidade', true ) . '" /></p>';
        echo '<p><label for="Codpostal">Codpostal:</label><br /><input type="text" name="Codpostal" value="' . get_user_meta( $current_user->ID, 'Codpostal', true ) . '" /></p>';
        echo '<p><label for="Nascimento">Nascimento:</label><br /><input type="text" name="Nascimento" value="' . get_user_meta($current_user->ID, 'Nascimento', true ) . '" /></p>';
        echo '<p><label for="Nomecargo">Nomecargo:</label><br /><input type="text" name="Nomecargo" value="' . get_user_meta( $current_user->ID, 'Nomecargo', true ) . '" /></p>';
        echo '<p><label for="Tiposocio">Tiposocio:</label><br /><input type="text" name="Tiposocio" value="' . get_user_meta( $current_user->ID, 'Tiposocio', true ) . '" /></p>';
        echo '<p><label for="Admissao">Admissao:</label><br /><input type="text" name="Admissao" value="' . get_user_meta( $current_user->ID, 'Admissao', true ) . '" /></p>';
        echo '<p><label for="Activo">Activo:</label><br /><input type="text" name="Activo" value="' . get_user_meta( $current_user->ID, 'Activo', true ) . '" /></p>';
        echo '<p><label for="Pagamento">Pagamento:</label><br /><input type="text" name="Pagamento" value="' . get_user_meta( $current_user->ID, 'Pagamento', true ) . '" /></p>';
        echo '<p><label for="Valor">Valor:</label><br /><input type="text" name="Valor" value="' . get_user_meta( $current_user->ID, 'Valor', true ) . '" /></p>';
        echo '<p><label for="Tel">Tel:</label><br /><input type="text" name="Tel" value="' . get_user_meta( $current_user->ID, 'Tel', true ) . '" /></p>';
        echo '<p><label for="Tm">Tm:</label><br /><input type="text" name="Tm" value="' . get_user_meta( $current_user->ID, 'Tm', true ) . '" /></p>';
        echo '<p><label for="Email">Email:</label><br /><input type="text" name="Email" value="' . get_user_meta( $current_user->ID, 'Email', true ) . '" /></p>';
        echo '<p><label for="Internet">Internet:</label><br /><input type="text" name="Internet" value="' . get_user_meta( $current_user->ID, 'Internet', true ) . '" /></p>';
        echo '<p><label for="Contribuinte">Contribuinte:</label><br /><input type="text" name="Contribuinte" value="' . get_user_meta( $current_user->ID, 'Contribuinte', true ) . '" /></p>';
        echo '<p><label for="Nrbi">Nrbi:</label><br /><input type="text" name="Nrbi" value="' . get_user_meta( $current_user->ID, 'Nrbi', true ) . '" /></p>';
        echo '<p><label for="Naturalidade">Naturalidade:</label><br /><input type="text" name="Naturalidade" value="' . get_user_meta( $current_user->ID, 'Naturalidade', true ) . '" /></p>';
        echo '<p><label for="Nacionalidade">Nacionalidade:</label><br /><input type="text" name="Nacionalidade" value="' . get_user_meta( $current_user->ID, 'Nacionalidade', true ) . '" /></p>';
        echo '<p><label for="Nib">Nib:</label><br /><input type="text" name="Nib" value="' . get_user_meta( $current_user->ID, 'Nib', true ) . '" /></p>';
        echo '<p><label for="Banco">Banco:</label><br /><input type="text" name="Banco" value="' . get_user_meta( $current_user->ID, 'Banco', true ) . '" /></p>';
        echo '<p><label for="Transferencia">Transferencia:</label><br /><input type="text" name="Transferencia" value="' . get_user_meta( $current_user->ID, 'Transferencia', true ) . '" /></p>';
        echo '<p><label for="Titulo1">Titulo1:</label><br /><input type="text" name="Titulo1" value="' . get_user_meta( $current_user->ID, 'Titulo1', true ) . '" /></p>';
        echo '<p><label for="Titulo2">Titulo2:</label><br /><input type="text" name="Titulo2" value="' . get_user_meta( $current_user->ID, 'Titulo2', true ) . '" /></p>';
        echo '<p><label for="Joia">Joia:</label><br /><input type="text" name="Joia" value="' . get_user_meta( $current_user->ID, 'Joia', true ) . '" /></p>';
        echo '<p><label for="Departamento">Departamento:</label><br /><input type="text" name="Departamento" value="' . get_user_meta( $current_user->ID, 'Departamento', true ) . '" /></p>';
        echo '<p><label for="Cobranca">Cobranca:</label><br /><input type="text" name="Cobranca" value="' . get_user_meta( $current_user->ID, 'Cobranca', true ) . '" /></p>';
        echo '<p><label for="Idade">Idade:</label><br /><input type="text" name="Idade" value="' . get_user_meta( $current_user->ID, 'Idade', true ) . '" /></p>';
        echo '<p><label for="Datasaida">Datasaida:</label><br /><input type="text" name="Datasaida" value="' . get_user_meta( $current_user->ID, 'Datasaida', true ) . '" /></p>';
        echo '<p><input type="submit" name="submit" value="Update" /></p>';
        echo '</form>';
    } else {
        echo 'Please log in to edit your usermeta fields.';
    }
}

function create_editcsv_shotcode(){
    ob_start();
    edit_usermeta_shortcode();
    return ob_get_clean();
}

add_shortcode('editcsv', 'create_editcsv_shotcode');

?>