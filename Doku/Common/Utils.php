<?php
namespace Doku\Common;

class Utils
{
    public static function signatureToken($dataSign)
    {
        $priv = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQBXPg//rXpBRgUGDJW8tGmu8SwatJtSckmaP5UYCFhTiVAM8qv1
hUK1jGXcbIKNf2iG5Cmtn3Dbg0/er5bJa9Bx+wZfG+k7RWcJYsNSW/33NtamSvW5
ZpO3DvAGQlYD3o7GOvjoK6OkfoO+keUsoH1zf5b9ESw0P+0Lq2cXNwfp9s2GC2k4
pFCIC6MbjAPzTQ7FLgTgPMulSJh2xPyRMFDEnmlIRzc8C7IsNxbawRifemqYwAa5
SvbbHGi6oI7LgF6iGSmkVYLvkSgMXjMLfO+8w10zVhxUooLJXoCpiMaRjzt6Qnuu
CHRSNQdBQA8hOueHjlAJscljm94xlWwuGxXVAgMBAAECggEAUc2c3MXCS7AnB7wH
L1EPg30aONQ+i7kkMKEL4OP6RiIL0Ig/G1Ff8rF51YxdgeYEke8g8W7+OKZQ3uJQ
Bf+1DRsup0GZmP0DlzZnJTOi2AowjO7ep4B6Y3x7LbNHygsGXvNu7uv0XkpOqANP
G2BFIWZyokpW44tJbtbCLG9qWUL8tARI/AQCvx7isharM/JPZyo4cXYlZn+vgrry
9tQcpeE1R+jqFyHAZfFp7Xvcc5dJK+AM6g94orIaHh9q1iOQJKOtJ/5tI0xRVfd9
P3lE54PNWliOUfqsqAkF5zzCAt2ouEjfkBThCzj3sFhtMJbLrCGmVaBatQiwEPL0
vANIZQKBgQCYfuuIioKxV9YjZ0cgdzgqB76q9LN67q2SuJ5gKyAJckd11Ps2sdNn
qJWO9mXuiiBlOdMhxklBsPJA3rUXBV/D6K0ME44PMkPMhtlVSBmkvTdzgpNXhQ6W
sa3B/HR+q41wYX7R6JM9okEuFu3lMEzCb68bc+ya9FIIPlezaYEMKwKBgQCSdPi4
36KO3Z3xg1jgH9iS3XsViJwndr3bmk4p2FnkgYtXRyEEpKYugxta+spchcHy/od5
0ncN+i7EpY+FobLqHhnTsEAOEkGC2uEj+L4poU5pc0fRM8W8VNsVVaEvCr9k+18L
WIAi2lptF3lN+e2/f85dZKwHw9i9KQgIXcll/wKBgQCGfims2rw5PIaX4tZQQ9U8
/GekzvwcR7S92iWUG3S94BQ2UAjfTCZvHbgJxjZQE3JO1JjpCMBDN5Pwsnp0O0Ei
v2sfY3++104EbEnxdQ1oxZjKPzdD0Q30ye+9TrJPpW2w18vJxZ1Wlmt2ArL9l4Ob
WHTPeYYLg791lcYzbbFq0QKBgQCPOAPiBg+ZVe8WNjO7OGk5dYzfye+qR9vx3DuD
gCan5ma0usH3IGvCIEOn/IfXYpX/YhhpcP8rk/QYKS7opu+nMjhfYoPBPukBZbm0
y5Jqc2uSg0E/uzkqqnBztIEi14fC4G5ZUfo8GvtCoynkrvtnwTu06LWyAjr5AB7y
z4QbUQKBgCnBQogY8FfIsLeiC9eM4mwjBX4Iza1bzYZRFDXPMHzZoprTBx7MxIlT
EmJAxF2gie8zstCZS6cj4rYdVpKOzsCor1y4p5gwtdMkmkll8yS68Q9TddNMJbxU
WG2HSClc5W1QxQmw0XvJLyLYwQTJAISJjtb6E64W8F1lyfx0QhO3
-----END RSA PRIVATE KEY-----
EOD;
        $algo = "SHA256";
        $binary_signature = "";
        openssl_sign($dataSign, $binary_signature, $priv, $algo);
        $signature = base64_encode($binary_signature);
        return $signature;
    }

    // public static function signtureApi($data){
        
    //     return $signature;
    // }
}
