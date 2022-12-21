<?php

function create_load_csv_menu(){
    add_menu_page('Load CSV', 'Load CSV', 'manage_options', 'load-csv-plugin', 'load_csv_options');
}

add_action('admin_menu', 'create_load_csv_menu');

function load_csv_options() {
    if (isset($_POST['submit'])) {

        $file = $_FILES['file']['tmp_name'];

        if (($handle = fopen($file, "r")) !== FALSE) {

            $header = fgetcsv($handle);

            while (($row = fgetcsv($handle)) !== FALSE) {
                $data = array_combine($header, $row);

                $socio = $data['Socio'];
                $nome = $data['Nome'];
                $morada = $data['Morada'];
                $localidade = $data['Localidade'];
                $codpostal = $data['Codpostal'];
                $nascimento = $data['Nascimento'];
                $nomecargo = $data['Nomecargo'];
                $tiposocio = $data['Tiposocio'];
                $admissao = $data['Admissao'];
                $activo = $data['Activo'];
                $pagamento = $data['Pagamento'];
                $valor = $data['Valor'];
                $tel = $data['Tel'];
                $tm = $data['Tm'];
                $email = $data['Email'];
                $internet = $data['Internet'];
                $contribuinte = $data['Contribuinte'];
                $nrbi = $data['Nrbi'];
                $naturalidade = $data['Naturalidade'];
                $nacionalidade = $data['Nacionalidade'];
                $nib = $data['Nib'];
                $banco = $data['Banco'];
                $transferencia = $data['Transferencia'];
                $titulo1 = $data['Titulo1'];
                $titulo2 = $data['Titulo2'];
                $joia = $data['Joia'];
                $departamento = $data['Departamento'];
                $cobranca = $data['Cobranca'];
                $idade = $data['Idade'];
                $datasaida = $data['Datasaida'];

                $user_id = wp_create_user($email, "password", $email);

                if(is_int($user_id)){
                    update_user_meta($user_id, "Socio", $socio);
                    update_user_meta($user_id, "Nome", $nome);
                    update_user_meta($user_id, "Morada", $morada);
                    update_user_meta($user_id, "Localidade", $localidade);
                    update_user_meta($user_id, "Codpostal", $codpostal);
                    update_user_meta($user_id, "Nascimento", $nascimento);
                    update_user_meta($user_id, "Nomecargo", $nomecargo);
                    update_user_meta($user_id, "Tiposocio", $tiposocio);
                    update_user_meta($user_id, "Admissao", $admissao);
                    update_user_meta($user_id, "Email", $email);
                    update_user_meta($user_id, "Activo", $activo);
                    update_user_meta($user_id, "Pagamento", $pagamento);
                    update_user_meta($user_id, "Valor", $valor);
                    update_user_meta($user_id, "Tel", $tel);
                    update_user_meta($user_id, "Tm", $tm);
                    update_user_meta($user_id, "Internet", $internet);
                    update_user_meta($user_id, "Contribuinte", $contribuinte);
                    update_user_meta($user_id, "Nrbi", $nrbi);
                    update_user_meta($user_id, "Naturalidade", $naturalidade);
                    update_user_meta($user_id, "Nacionalidade", $nacionalidade);
                    update_user_meta($user_id, "Nib", $nib);
                    update_user_meta($user_id, "Banco", $banco);
                    update_user_meta($user_id, "Transferencia", $transferencia);
                    update_user_meta($user_id, "Titulo1", $titulo1);
                    update_user_meta($user_id, "Titulo2", $titulo2);
                    update_user_meta($user_id, "Joia", $joia);
                    update_user_meta($user_id, "Departamento", $departamento);
                    update_user_meta($user_id, "Cobranca", $cobranca);
                    update_user_meta($user_id, "Idade", $idade);
                    update_user_meta($user_id, "Datasaida", $datasaida);
                }
            }
            fclose($handle);
        }
    }
    ?>
    <div>
        <h1>Carregar CSV</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="file">Seleciona um arquivo csv para carregar:</label><br>
            <input type="file" name="file" id="file"><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
    <?php
}

?>