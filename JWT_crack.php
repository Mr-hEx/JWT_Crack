<?php


$handle = @fopen("test.txt", "r");

    while (! feof($handle)) {
       $SignatureCrack  = 'UdgsiHNBvYvQaYC438a-G12ncP3NYcdqWXlrGXrpMNE'; # put here the Signature what do you want to crack it 
	   $header = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9'; # put here the header 
       $payload = 'eydoZXgnOicxMjU2MycsJ3Rlc3QnOic4NSd9'; # put here the payload
       $HeaderAndPayload = "$header.$payload";
       $algo = 'sha256'; # kind of algo
	   $keypas = fgets($handle); 
       $Signature = hash_hmac($algo, $HeaderAndPayload, trim($keypas), true);
       $signatureEncoded = rtrim(strtr(base64_encode($Signature), '+/','-_'), '=');
	   if ($signatureEncoded == $SignatureCrack) {
           echo "Found the Key : $keypas";
		   break;
        }
		
          
  }
    
fclose($handle);



?> 