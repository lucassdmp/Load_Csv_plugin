<?php

function load_form_css(){
    wp_enqueue_style('editform_css_form', plugins_url('css/edit_form.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'load_form_css');
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

        ?>
        <form method="post" class="forms">
            <div class="form-column">
                <p>
                    <label for="Nome">Nome:</label>
                    <br /><input type="text" name="Nome" value="<?php echo get_user_meta( $current_user->ID, 'Nome', true ) ?>" />
                </p>
                <p>
                    <label for="Morada">Morada:</label>
                    <br /><input type="text" name="Morada" value="<?php echo get_user_meta( $current_user->ID, 'Morada', true ) ?>" />
                </p>
                <p>
                    <label for="Localidade">Localidade:</label>
                    <br /><input type="text" name="Localidade" value="<?php echo get_user_meta( $current_user->ID, 'Localidade', true ) ?>" />
                </p>
                <p>
                    <label for="Codpostal">C??digo Postal:</label>
                    <br /><input type="text" name="Codpostal" value="<?php echo get_user_meta( $current_user->ID, 'Codpostal', true ) ?>" />
                </p>
                <p>
                    <label for="Nascimento">Data de Nascimento:</label>
                    <br /><input type="text" name="Nascimento" value="<?php echo get_user_meta($current_user->ID, 'Nascimento', true ) ?>" />
                </p>
                <p>
                    <label for="Admissao">Data de Admiss??o:</label>
                    <br /><input type="text" name="Admissao" value="<?php echo get_user_meta( $current_user->ID, 'Admissao', true ) ?>" />
                </p> 
                <p>
                    <label for="Activo">Activo:</label>
                    <br /><input type="text" name="Activo" value="<?php echo get_user_meta( $current_user->ID, 'Activo', true ) ?>" />
                </p> 
                <p>
                    <label for="Tel">Tel:</label>
                    <br /><input type="text" name="Tel" value="<?php echo get_user_meta( $current_user->ID, 'Tel', true ) ?>" />
                </p> 
                <p>
                    <label for="Tm">Tm:</label>
                    <br /><input type="text" name="Tm" value="<?php echo get_user_meta( $current_user->ID, 'Tm', true ) ?>" />
                </p> 
                <p>
                    <label for="Email">Email:</label>
                    <br /><input type="text" name="Email" value="<?php echo get_user_meta( $current_user->ID, 'Email', true ) ?>" />
                </p> 
                <p>
                    <label for="Internet">Internet:</label>
                    <br /><input type="text" name="Internet" value="<?php echo get_user_meta( $current_user->ID, 'Internet', true ) ?>" />
                </p> 
            </div>
            <div class="form-column">
                <p>
                    <label for="Contribuinte">Contribuinte/CPF:</label>
                    <br /><input type="text" name="Contribuinte" value="<?php echo get_user_meta( $current_user->ID, 'Contribuinte', true ) ?>" />
                </p> 
                <p>
                    <label for="Nrbi">Nrbi:</label>
                    <br /><input type="text" name="Nrbi" value="<?php echo get_user_meta( $current_user->ID, 'Nrbi', true ) ?>" />
                </p> 
                <p>
                    <label for="Naturalidade">Naturalidade:</label>
                    <br /><input type="text" name="Naturalidade" value="<?php echo get_user_meta( $current_user->ID, 'Naturalidade', true ) ?>" />
                </p> 
                <p>
                    <label for="Nacionalidade">Nacionalidade:</label>
                    <br /><input type="text" name="Nacionalidade" value="<?php echo get_user_meta( $current_user->ID, 'Nacionalidade', true ) ?>" />
                </p> 
                <p>
                    <label for="Nib">Nib:</label>
                    <br /><input type="text" name="Nib" value="<?php echo get_user_meta( $current_user->ID, 'Nib', true ) ?>" />
                </p> 
                <p>
                    <label for="Banco">Banco:</label>
                    <br /><input type="text" name="Banco" value="<?php echo get_user_meta( $current_user->ID, 'Banco', true ) ?>" />
                </p> 
                <p>
                    <label for="Transferencia">Transfer??ncia:</label>
                    <br /><input type="text" name="Transferencia" value="<?php echo get_user_meta( $current_user->ID, 'Transferencia', true ) ?>" />
                </p> 
                <p>
                    <label for="Titulo1">T??tulo1:</label>
                    <br /><input type="text" name="Titulo1" value="<?php echo get_user_meta( $current_user->ID, 'Titulo1', true ) ?>" />
                </p> 
                <p>
                    <label for="Titulo2">T??tulo2:</label>
                    <br /><input type="text" name="Titulo2" value="<?php echo get_user_meta( $current_user->ID, 'Titulo2', true ) ?>" />
                </p> 
                <p>
                    <label for="Joia">J??ia:</label>
                    <br /><input type="text" name="Joia" value="<?php echo get_user_meta( $current_user->ID, 'Joia', true ) ?>" />
                </p> 
                <p>
                    <label for="Departamento">Departamento:</label>
                    <br /><input type="text" name="Departamento" value="<?php echo get_user_meta( $current_user->ID, 'Departamento', true ) ?>" />
                </p> 
                <p>
                    <label for="Cobranca">Cobran??a:</label>
                    <br /><input type="text" name="Cobranca" value="<?php echo get_user_meta( $current_user->ID, 'Cobranca', true ) ?>" />
                </p> 
                <p>
                    <label for="Idade">Idade:</label>
                    <br /><input type="text" name="Idade" value="<?php echo get_user_meta( $current_user->ID, 'Idade', true ) ?>" />
                </p> 
                <p>
                    <label for="Datasaida">Data de Sa??da:</label>
                    <br /><input type="text" name="Datasaida" value="<?php echo get_user_meta( $current_user->ID, 'Datasaida', true ) ?>" />
                </p> 
                <p>
                    <input type="submit" name="submit" value="Guardar" />
                </p> 
            </div>
        </form> 
        <?php
    } else {
        echo 'Please log in to edit your usermeta fields.';
    }
}

function create_editcsv_shotcode(){
    ob_start();
    edit_usermeta_shortcode();
    return ob_get_clean();
}
?>
