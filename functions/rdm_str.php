<?php
$perm_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $ctd_char) # recibe los caracteres permitidos y y cual  va a ser el len de la contraseña 
{
    $input_length = strlen($input);
    $rdm_string = ''; # se crea
    for($i = 0; $i < $ctd_char; $i++) {
        $rdm_character = $input[mt_rand(0, $input_length - 1)];
        $rdm_string .= $rdm_character; #concatenación
    }
    return $rdm_string;
}

?>