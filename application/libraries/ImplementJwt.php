<?php
require APPPATH . '/libraries/JWT.php';

class ImplementJwt
{
    PRIVATE $key = "sample_key_crot"; 
    public function GenerateToken($data)
    {         
        $jwt = JWT::encode($data, $this->key);
        return $jwt;
    }
   
    ///function decode the token///
    public function DecodeToken($token)
    {         
        $decoded = JWT::decode($token, $this->key, array('HS256'));
        $decodedData = (array) $decoded;
        return $decodedData;
    }
}
?> 