<?php
$permitted_chars = '0123456789ABCDEF';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
// Output: iNCHNGzByPjhApvn7XBD 
$cadenaOcho =  generate_string($permitted_chars, 8);
// Output: 70Fmr9mOlGID7OhtTbyj 
$cadenaCuatroParte1 = generate_string($permitted_chars, 4);
$cadenaCuatroParte2 = generate_string($permitted_chars, 4);
$cadenaCuatroParte3 = generate_string($permitted_chars, 4);
// Output: Jp8iVNhZXhUdSlPi1sMNF7hOfmEWYl2UIMO9YqA4faJmS52iXdtlA3YyCfSlAbLYzjr0mzCWWQ7M8AgqDn2aumHoamsUtjZNhBfU 
$cadenaDoce =  generate_string($permitted_chars, 12);

$codigoGeneracion = $cadenaOcho . "-" . $cadenaCuatroParte1 ."-". $cadenaCuatroParte2."-".$cadenaCuatroParte3."-". $cadenaDoce;
print "Código Generación: " . $codigoGeneracion;
?>