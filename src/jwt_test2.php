<?php
    require_once '../vendor/autoload.php';

    use Ahc\Jwt\JWT;

    $jwt_secret = "Batemam&Robson";

    $jwt = new JWT($jwt_secret);

    $jwt_token = $jwt->encode([
        "user_id" => 25,
        "user_name" => "Joao Maria",
        "user_email" => "teste@gmail.com",
        "user_text" => "jahsdkjhashdohaoihodhaohshdoiahoishdohaoihdohiaoshodaoishdioi",
        "user_telefone" => 123456789
    ]);

    echo("<h3>Token</h3><br><h4>".$jwt_token."</h4>");

    echo("<br><br><h3>Decode</h3><br><h4 >".json_encode($jwt->decode($jwt_token))."</h4>");

?>