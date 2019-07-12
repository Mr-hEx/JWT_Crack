<?php
$handle = @fopen("rockyou.txt", "r");
    while (! feof($handle)) {
       $SignatureCrack  ='9OiJd6GE55Ec-EFrEW9yEqN8pE_mT3RLkRbTcjYJhTw'; # put here the Signature what do you want to crack it
           $header = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9'; # put here the header
       $payload = 'eyJzb21lIjoicGF5bG9hZCJ9'; # put here the payload
       $HeaderAndPayload = "$header.$payload";
       $algo = 'sha256'; # kind of algo
       $keypas = fgets($handle);
       $Signature = hash_hmac($algo, $HeaderAndPayload, trim($keypas), true);
       $signatureEncoded = rtrim(strtr(base64_encode($Signature), '+/','-_'), '=');
       if ($signatureEncoded == $SignatureCrack){

               echo "\033[01;31mFound the Key : $keypas \033[0m";
                exit();
        }
    }
echo "Not found the key ):";
fclose($handle);
?>
