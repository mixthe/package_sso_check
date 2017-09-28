<?php
namespace Mixthe\sso_check;

class SSOCheck
{
    public  $key = 'x7sdcGU3fj8m/tDCyvsbEhwI91M1FcwvQqWuFpPoDHlFk=';
    //加密函数
    public function ticket_encrypt($data,string $key='')
    {
        ($key)?$key:$this->key;
        $iv = base64_encode(substr(md5($key),0,8));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', base64_decode($key), OPENSSL_RAW_DATA, base64_encode($iv));
        return base64_encode($encrypted);
    }

    //解密函数
    public function ticket_decrypt($data,string $key='')
    {
        ($key)?$key:$this->key;
        $iv = base64_encode(substr(md5($key),0,8));
        $encrypted = base64_decode($data);
        $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', base64_decode($key), OPENSSL_RAW_DATA, base64_encode($iv));
        return $decrypted;
    }

}