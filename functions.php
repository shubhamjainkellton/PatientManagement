<?php

function protect($string) {
global $connection;
$string = mysqli_real_escape_string($connection, trim(strip_tags(addslashes($string))));
return $string;
}

function confirmQuery($result) {
    global $connection;
    if(!$result ) {
          die("QUERY FAILED ." . mysqli_error($connection));  
      }
}


function encrypt($message, $encryption_key){
    $key = hex2bin($encryption_key);
    $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
    $nonce = openssl_random_pseudo_bytes($nonceSize);
    $ciphertext = openssl_encrypt(
      $message, 
      'aes-256-ctr', 
      $key,
      OPENSSL_RAW_DATA,
      $nonce
    );
    return base64_encode($nonce.$ciphertext);
  }
  function decrypt($message,$encryption_key){
    $key = hex2bin($encryption_key);
    $message = base64_decode($message);
    $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
    $nonce = mb_substr($message, 0, $nonceSize, '8bit');
    $ciphertext = mb_substr($message, $nonceSize, null, '8bit');
    $plaintext= openssl_decrypt(
      $ciphertext, 
      'aes-256-ctr', 
      $key,
      OPENSSL_RAW_DATA,
      $nonce
    );
    return $plaintext;
  }


function hashword($string){
    
    $hash_salt = '$2y$10$IUSESOMECRAZYSTRING22$' ; 
    $string    =crypt($string, $hash_salt);
    return $string;
}

function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}
function email_exists($email){

    global $connection;


    $query = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}


  
?> 
