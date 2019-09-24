<?php

    $jwt_header = array(
        "alg" => "HS256",
        "typ" => "JWT"
    );

    $jwt_payload = array(
        "id" => 123,
        "name" => "Teste",
        "email" => "teste@gmail.com",
        "teste" => "texto grande",
        "outro_atr" => "outro_valor",
        "telefone" => 1516239022
    );

    $jwt_secret = "batman123456";

    $encryption = base64_encode(json_encode($jwt_header)).".".base64_encode(json_encode($jwt_payload)).".".base64_encode($jwt_secret);

    $jwt_token = str_replace(["+", "/", "="], ["-", "_", ""], $encryption);

    echo("<h3>Token</h3><br><a href='#'>".$jwt_token."</a>");
?>