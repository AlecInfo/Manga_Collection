<?php

function key_CrypDecryp(){
    $key= "UneCleQuiPermetDeCrypterLeMotDePasseTelsComme'JESUISUNESAUSSISE'OuComme'LAVIEESTBELLE'";
    return $key;
}

function crypter($pwd, $key) {
    return openssl_encrypt($pwd, "AES-128-ECB" ,$key);
}

function decrypter($pwd, $key) {
    return openssl_decrypt($pwd, "AES-128-ECB" , $key);
}
?>