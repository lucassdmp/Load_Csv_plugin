<?php
function redirect_user_by_role() {
    if(is_user_logged_in(  )){
        $current_user = wp_get_current_user();
        $roles = (array)$current_user->roles;
        if($roles[0] == 'subscriber') {
            wp_safe_redirect( home_url() . '/socio-amigo' );
            exit;
        }else if($roles[0] == 'formador') {
            wp_safe_redirect( home_url() . '/socio-formador' );
            exit;
        } else if($roles[0] == 'terapeuta') {
            wp_safe_redirect( home_url() . '/socio-terapeuta' );
            exit;
        }else if($roles[0] == 'administrator') {
            wp_safe_redirect( home_url() . '/socio-adm' );
            exit;
        } 
    }else{
        wp_redirect( wp_login_url());
        exit;
    }
    exit;
}


?>