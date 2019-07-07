<?php

function generateJWT( $algo, $header, $payload, $secret) {
    $headerEncoded = rtrim(strtr(base64_encode($header), '+/','-_'), '=');
 
    $payloadEncoded = rtrim(strtr(base64_encode($payload), '+/','-_'), '=');
 
    
    $dataEncoded = "$headerEncoded.$payloadEncoded";
 
    $rawSignature = hash_hmac($algo, $dataEncoded, $secret, true);
 
    $signatureEncoded = rtrim(strtr(base64_encode($rawSignature), '+/','-_'), '=');
 
    
    $jwt = "$dataEncoded.$signatureEncoded";
 
    return $jwt;
}
 
// JWT Header
$header = ['typ'=>'JWT','alg'=>'HS256'];

// JWT Payload 
$payload ="{'hex':'12563','test':'85'}";

$secret = '123456';

// Create the JWT
$jwt = generateJWT('sha256', json_encode($header), $payload, $secret);
 
print $jwt;

?>